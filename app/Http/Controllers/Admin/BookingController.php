<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssessmentRequest;
use App\Models\OrderDetial;
use App\Models\StudentTerm;
use App\Models\TermBaseBooking;
use App\Models\Timing;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;
class BookingController extends Controller
{
    const TITLE = 'Booking';
    const VIEW = 'admin/booking';
    const URL = 'admin/bookings';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_booking'), Response::HTTP_FORBIDDEN, 'Forbidden');
        if ($request->ajax()) {
            $records = OrderDetial::where('type', null)->latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $booking_name="{$r->studentTermsActive?->bookingName()}";
                    $user=User::find(Auth::id());
                    if($user->can('edit_booking')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$booking_name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$booking_name</span></a>";

                    }
                    $edit=$user->can('edit_booking')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                   
                    $actions = '';
                    $actions .= "
                                <ul class='nk-tb-actions gx-1'>
                                <li>
                                    <div class='drodown'>
                                        <a href='#'
                                            class='dropdown-toggle btn btn-sm btn-icon btn-trigger'
                                            data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                        <div class='dropdown-menu dropdown-menu-right'>
                                            <ul class='link-list-opt no-bdr'>
                                            $edit
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'name' => $name,
                        'venue' => $r->studentTermsActive?->venueName(),
                        'customer' => $r->customerName(),
                        'student' => $r->studentTermsActive?->student->name,
                        'created_at' => $r->created_at->format('M d,Y'),
                        'price' => $r->getPrice(),
                         'status' => $r->getStatus(),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name','customer','venue','price','status'])
                ->make(true);
        }
        $records = OrderDetial::where('type', null)->get()->count();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function edit($id)
    {
        abort_if(Gate::denies('edit_booking'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $order_detail = OrderDetial::findOrFail($id);
        $student=$order_detail->studentTermsActive;
        if($student?->type=='term'){
            $term=$student?->term;
            $term_id = $term?->id;
        }else{
            $term = $student?->package;
            $term_id=$term?->term_base_booking_id;
        }
        // dd($term_id);
        $term_base_booking=TermBaseBooking::find($term_id);
        $term_base_booking_venues=TermBaseBooking::where('parent_id',$term_base_booking?->parent_id)->pluck('venue_id');
        $student_terms=$order_detail?->studentTerms?->where('student_id',$student?->student_id);
        $venues = Venue::whereIn('id', $term_base_booking_venues)->get();
        return view(self::VIEW . '.edit', get_defined_vars());
    }
    public function checkSlots(Request $request,$id){
        $timing = Timing::findOrFail($id);
        $term_base_booking=TermBaseBooking::where('timing_id',$timing->id)->first();
        $total_slots=0;
        $no_of_student=0;
        $available_slot=0;
        if($term_base_booking){
            $total_slots=$term_base_booking?->tolalSlotBooked();
            $no_of_student=$term_base_booking?->no_of_student;
            $available_slot = $total_slots < $no_of_student ? $no_of_student - $total_slots : 0;
        }
        return response()->json([
            'status'=>true,
            'available_slot'=>$available_slot,
            // 'available_slot'=>$available_slot,
        ]);
    }
     public function getTiming(Request $request,$id){
        // dd($request->all());
        $term_base_booking=TermBaseBooking::find($request->term_base_booking_id);
        $term_base_booking_timings=TermBaseBooking::where('parent_id',$term_base_booking?->parent_id)
        ->where('venue_id',$id)->pluck('timing_id');
        // $venue = Venue::findOrFail($id);
        // $term_base_booking_timings=TermBaseBooking::where('venue_id',$venue->id)->pluck('timing_id');
        $records=Timing::whereIn('id',$term_base_booking_timings)->get();
        // dd($records);
        return view(self::VIEW . '.partial.select', get_defined_vars());
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'venue_id'=>'required',
            'timing_id'=>'required',
        ]);
        $order_detail = OrderDetial::findOrFail($id);
        $venue = Venue::findOrFail($request->venue_id);
        $timing = Timing::findOrFail($request->timing_id);
        $student_term=$order_detail->studentTermsActive;
        $term_base_booking = TermBaseBooking::where('venue_id', $venue->id)->where('timing_id', $timing->id)->first();
        if (!is_null($term_base_booking) && $request->slots != 0) {
            if($student_term->type=='term'){
                    $term=$student_term->term;
                    $term_id=$term_base_booking->id;
             }else{
                    $term = $student_term->package;
                    $term_base_packages=$term_base_booking->termBaseBookingPackages->where('name',$term->name)->first();
                    $term_id=$term_base_packages->id;
            }
            $student_term->update([
                'status'=>'off',
            ]);
            StudentTerm::create([
                'order_detial_id'=>$student_term->order_detial_id,
                'student_id' => $student_term->student_id,
                'term_id'=>$term_id,
                'type'=>$student_term->type,
                'qty'=>1,
                'status'=>'on', 
            ]);
            return response()->json([
                'status'=>true,
                'message'=>'Venue Change Successfully',
            ]);
        }
        return response()->json([
            'status'=>false,
            'message'=>'No Term Found on this Venue Or No Slot Available ',
        ]);
        
    }
}
