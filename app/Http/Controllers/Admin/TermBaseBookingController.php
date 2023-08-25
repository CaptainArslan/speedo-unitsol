<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassType;
use App\Models\Day;
use App\Models\Image;
use App\Models\SwimmingClass;
use App\Models\Term;
use App\Models\TermBaseBooking;
use App\Models\TermBaseBookingDays;
use App\Models\TermBaseBookingPackage;
use App\Models\Timing;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class TermBaseBookingController extends Controller
{
    const TITLE = 'Term Base Booking';
    const VIEW = 'admin/term_base_booking';
    const URL = 'admin/term-base-bookings';


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
        abort_if(Gate::denies('view_term_base_booking'), Response::HTTP_FORBIDDEN, 'Forbidden');
        if ($request->ajax()) {
            $records = TermBaseBooking::where('parent_id', 0)->latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $copy_url = $this->toString('admin/copy-term-base-bookings' . '/' . $r->id);;
                    $user = User::find(Auth::id());
                    if ($user->can('edit_term_base_booking')) {
                        $name = "<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    } else {
                        $name = "<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }
                    $edit = $user->can('edit_term_base_booking') ?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>" : "";
                    $delete = $user->can('delete_term_base_booking') ? " <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
                    class='icon ni ni-trash'></em><span>Delete</span></a>
                    </li>" : "";
                    $copy = " <li><a href='javascript:'   onclick='copyTerm(event,$copy_url)' ><em
                    class='icon ni ni-plus'></em><span>Copy</span></a>
                    </li>";
                    $copy = "<li><a href='$url/$r->id/copy' class='toggle' data-target='editClass'><em
                    class='icon ni ni-edit'></em><span>Copy</span></a>
                    </li>";
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
                                                $delete
                                                $copy
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'name' => $name,
                        'created_at' => $r->created_at->format('M d Y'),
                        'duration' => $r->start_date . ' to ' . $r->end_date,
                        'class' => $r->class?->name . ' -AED ' . $r->class?->price,
                        'no_of_student' => $r->no_of_student,
                        'days' => $r->dayNames2(),
                        'detail' => $r->getTrainerList(),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name', 'duration', 'class', 'detail'])
                ->make(true);
        }
        $records = TermBaseBooking::where('parent_id', 0)->get()->count();
        return view(self::VIEW . '.index', get_defined_vars());
    }



    public function create()
    {
        abort_if(Gate::denies('add_term_base_booking'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $define_terms = Term::all();
        $venues = Venue::all();
        $timings = Timing::all();
        $classes = SwimmingClass::all();
        $class_types = ClassType::all();
        $days = Day::all();
        $trainers = User::where('is_trainer', true)->get();
        return view(self::VIEW . '.create', get_defined_vars());
    }
    public function saveMeta($request, $id)
    {
        foreach ($request['addmore1'] as $detail) {
            $term_base_booking_package = TermBaseBookingPackage::create([
                'term_base_booking_id' => $id,
                'name' => $detail['name'],
                'start_date' => $detail['start_date'],
                'end_date' => $detail['end_date'],
                'no_of_class' => $detail['no_of_class'],
                'price' => $detail['price'],
                'total' => $detail['total'],
            ]);
        }
    }
    public function saveMeta2($request, $id)
    {
        foreach ($request as $detail) {
            $term_base_booking_package = TermBaseBookingPackage::create([
                'term_base_booking_id' => $id,
                'name' => $detail['name'],
                'start_date' => $detail['start_date'],
                'end_date' => $detail['end_date'],
                'no_of_class' => $detail['no_of_class'],
                'price' => $detail['price'],
                'total' => $detail['total'],
            ]);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'term_id' => 'required',
            'class_id' => 'required',
            'trianer_detail' => 'required',
            // 'trainer_id' => 'required',
            'class_type_id' => 'required',
            'no_of_student' => 'required',
            'day_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'discount' => 'nullable|integer',
        ]);
        // dd($request->all());
        $define_term = Term::find($request->term_id);
        // dd($term->name);
        $parent_term_base_booking = TermBaseBooking::create([
            'user_id' => Auth::id(),
            'swimming_class_id' => $request->class_id,
            'class_type_id' => $request->class_type_id,
            'term_id' => $define_term->id,
            'name' => $define_term->name,
            'discount' => $request->discount ? $request->discount : 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'no_of_class' => $request->no_of_class,
            'no_of_student' => $request->no_of_student,
            'total' => $request->total,
            'blackout_check' => $request->blackout_check ? 1 : 0,
            'blackout_start_date' => $request->blackout_check ? $request->blackout_start_date : null,
            'blackout_end_date' => $request->blackout_check ? $request->blackout_end_date : null,
        ]);
        foreach ($request['trianer_detail'] as $detail) {
            $term_base_booking = TermBaseBooking::create([
                'user_id' => Auth::id(),
                'trainer_id' => $detail['trainer_id'],
                'venue_id' => $detail['venue_id'],
                'timing_id' => $detail['timing_id'],
                'swimming_class_id' => $request->class_id,
                'class_type_id' => $request->class_type_id,
                'name' => $define_term->name,
                'discount' => $request->discount ? $request->discount : 0,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'no_of_class' => $request->no_of_class,
                'no_of_student' => $request->no_of_student,
                'total' => $request->total,
                'term_id' => $define_term->id,
                'parent_id' => $parent_term_base_booking->id,
            ]);
            if ($request['addmore1']) {
                $this->saveMeta($request, $term_base_booking->id);
            }
        }

        $days = Day::whereIn('name', $request->day_id)->get();
        foreach ($days as $day) {
            // dd($days);
            TermBaseBookingDays::create([
                'day_id' => $day->id,
                'term_base_booking_id' => $parent_term_base_booking->id,
            ]);
        }


        return response()->json(
            [
                'success' => true,
                'message' => 'Record Add Successfully'
            ],
            200
        );
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        abort_if(Gate::denies('edit_term_base_booking'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $term_base_booking = TermBaseBooking::find($id);
        $child_term_bookings = TermBaseBooking::where('parent_id', $id)->get();
        $packages = [];
        foreach ($child_term_bookings as $child_term_booking) {
            $package = TermBaseBookingPackage::where('term_base_booking_id', $child_term_booking->id)->get();

            array_push($packages, $package);
        }
        $data = collect($packages)->collapse()->unique('name');
        $records = $data->all();
        // dd($data->all());
        $venues = Venue::all();
        $class_types = ClassType::all();
        $classes = SwimmingClass::all();
        $timings = Timing::all();
        $days = Day::all();
        $define_terms = Term::all();
        $trainers = User::where('is_trainer', true)->get();
        return view(self::VIEW . '.edit', get_defined_vars());
    }
    public function copy($id)
    {
        abort_if(Gate::denies('edit_term_base_booking'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $term_base_booking = TermBaseBooking::find($id);
        $child_term_bookings = TermBaseBooking::where('parent_id', $id)->get();
        $packages = [];
        foreach ($child_term_bookings as $child_term_booking) {
            $package = TermBaseBookingPackage::where('term_base_booking_id', $child_term_booking->id)->get();

            array_push($packages, $package);
        }
        $data = collect($packages)->collapse()->unique('name');
        $records = $data->all();
        // dd($data->all());
        $venues = Venue::all();
        $class_types = ClassType::all();
        $classes = SwimmingClass::all();
        $define_terms = Term::all();
        $timings = Timing::all();
        $days = Day::all();
        $trainers = User::where('is_trainer', true)->get();
        return view(self::VIEW . '.copy', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            // 'name' => 'required',
            'term_id' => 'required',
            'class_id' => 'required',
            // 'venue_id' => 'required',
            // 'trainer_id' => 'required',
            'day_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'discount' => 'nullable|integer',
        ]);
        $parent_term_base_booking = TermBaseBooking::find($id);
        $old_child_terms = TermBaseBooking::where('parent_id', $id)->get();
        $define_term = Term::find($request->term_id);
        $parent_term_base_booking->update([
            'swimming_class_id' => $request->class_id,
            'class_type_id' => $request->class_type_id,
            'name' => $request->name,
            'discount' => $request->discount ? $request->discount : 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'no_of_class' => $request->no_of_class,
            'no_of_student' => $request->no_of_student,
            'total' => $request->total,
            'blackout_check' => $request->blackout_check ? 1 : 0,
            'term_id' => $define_term->id,
            'name' => $define_term->name,
            'blackout_start_date' => $request->blackout_check ? $request->blackout_start_date : null,
            'blackout_end_date' => $request->blackout_check ? $request->blackout_end_date : null,
        ]);
        // TermBaseBooking::where('parent_id',$parent_term_base_booking->id)->delete();
        $current_child_terms = collect($request['trianer_detail']);
        $old_child_terms_id = $old_child_terms->pluck('id');
        $current_terms_id = $current_child_terms->pluck('term_base_booking_id');
        $delete_terms_id = array_diff($old_child_terms_id->all(), $current_terms_id->all());
        $this->deleteTerms($delete_terms_id);

        $old_child_terms_packages = TermBaseBookingPackage::whereIn('term_base_booking_id', $current_terms_id)
            ->get();
        $current_child_package = collect($request['addmore1']);
        $old_child_package_id = $old_child_terms_packages->pluck('id');
        $current_package_id_distict = $current_child_package->pluck('term_base_package_id');
        $package_names = TermBaseBookingPackage::whereIn('id', $current_package_id_distict)->pluck('name');
        $current_package_id_all = TermBaseBookingPackage::whereIn('name', $package_names)->pluck('id');
        $delete_packages_id = array_diff($old_child_package_id->all(), $current_package_id_all->all());
        // dd($delete_packages_id);
        $this->deletePackage($delete_packages_id);
        $current_package_after_deletes = TermBaseBookingPackage::whereIn('id', $current_package_id_all)->get();

        // dd($current_package_after_deletes);
        foreach ($request['trianer_detail'] as $detail) {
            if (isset($detail['term_base_booking_id'])) {
                $record = TermBaseBooking::where('id', $detail['term_base_booking_id'])->first();
                if (!is_null($record)) {
                    $record->update([
                        'user_id' => Auth::id(),
                        'trainer_id' => $detail['trainer_id'],
                        'venue_id' => $detail['venue_id'],
                        'timing_id' => $detail['timing_id'],
                        'swimming_class_id' => $request->class_id,
                        'class_type_id' => $request->class_type_id,
                        'name' => $request->name,
                        'discount' => $request->discount ? $request->discount : 0,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'no_of_class' => $request->no_of_class,
                        'no_of_student' => $request->no_of_student,
                        'total' => $request->total,
                        'term_id' => $define_term->id,
                        'name' => $define_term->name,
                        'is_approved' => $parent_term_base_booking->is_approved == 1 ? true : false,
                    ]);
                }
            } else {

                $term_base_booking = TermBaseBooking::create([
                    'user_id' => Auth::id(),
                    'trainer_id' => $detail['trainer_id'],
                    'venue_id' => $detail['venue_id'],
                    'timing_id' => $detail['timing_id'],
                    'swimming_class_id' => $request->class_id,
                    'class_type_id' => $request->class_type_id,
                    'name' => $request->name,
                    'discount' => $request->discount ? $request->discount : 0,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'no_of_class' => $request->no_of_class,
                    'no_of_student' => $request->no_of_student,
                    'total' => $request->total,
                    'term_id' => $define_term->id,
                    'name' => $define_term->name,
                    'parent_id' => $parent_term_base_booking->id,
                    'is_approved' => $parent_term_base_booking->is_approved == 1 ? true : false,
                ]);
                if ($request['addmore1']) {
                    $this->saveMeta($request, $term_base_booking->id);
                }
            }
            // $term_base_booking = TermBaseBooking::create([
            //     'user_id' => Auth::id(),
            //     'trainer_id' => $detail['trainer_id'],
            //     'venue_id' => $detail['venue_id'],
            //     'timing_id' => $detail['timing_id'],
            //     'swimming_class_id' => $request->class_id,
            //     'class_type_id' => $request->class_type_id,
            //     'name' => $request->name,
            //     'discount' => $request->discount ? $request->discount : 0,
            //     'start_date' => $request->start_date,
            //     'end_date' => $request->end_date,
            //     'no_of_class' => $request->no_of_class,
            //     'no_of_student' => $request->no_of_student,
            //     'total' => $request->total,
            //     'parent_id' => $parent_term_base_booking->id,
            // ]);
            // if ($request['addmore1']) {
            //     TermBaseBookingPackage::where('term_base_booking_id', $id)->delete();
            //     $this->saveMeta($request, $term_base_booking->id);
            // }
        }
        // $exists_current_packages=[];
        //  current_package_after_deletes are records that are comming after delete from db.
        $data = [];
        foreach ($current_package_after_deletes as $current_package_after_delete) {
            //  exists_packages are the packages with distinct name
            $exists_packages = TermBaseBookingPackage::where('name', $current_package_after_delete->name)->get();
            foreach ($exists_packages as $key => $pg) {
                // if($key == 1){
                //     dd($pg);
                // }
                //  these records commings in requests
                $rec = $current_child_package->whereIn('term_base_package_id', $exists_packages->pluck('id'))->first();
                // dd($current_child_package,$rec );
                $pg->update([
                    'name' => isset($rec['name']) ? $rec['name'] : $pg->name,
                    'start_date' => isset($rec['start_date']) ? $rec['start_date'] : $pg->start_date,
                    'end_date' => isset($rec['end_date']) ? $rec['end_date'] : $pg->end_date,
                    'no_of_class' => isset($rec['no_of_class']) ? $rec['no_of_class'] : $pg->no_of_class,
                    'price' => isset($rec['price']) ? $rec['price'] : $pg->price,
                    'total' => isset($rec['total']) ? $rec['total'] : $pg->total,
                ]);
            }
            $data = $this->findKey($current_child_package, 'term_base_package_id');
            // dd($current_package_after_deletes->unique('term_base_booking_id'));

            // if ($data != []) {
            //         $this->saveMeta2($data, $current_package_after_delete->term_base_booking_id);
            // }
            // dd($data);
        }
        $new_packages = $current_package_after_deletes->unique('term_base_booking_id');
        if ($data != []) {
            foreach ($new_packages as $pack) {
                $this->saveMeta2($data, $pack->term_base_booking_id);
            }
        }

        $days = Day::whereIn('name', $request->day_id)->get();
        TermBaseBookingDays::where('term_base_booking_id', $id)->delete();
        foreach ($days as $day) {
            TermBaseBookingDays::create([
                'day_id' => $day->id,
                'term_base_booking_id' => $parent_term_base_booking->id,
            ]);
        }


        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update Successfully'
            ],
            200
        );
    }

    public function deleteTerms($ids)
    {
        $classes = TermBaseBooking::whereIn('id', $ids)->get();
        if (!$classes->isEmpty()) {
            TermBaseBooking::whereIn('id', $ids)->delete();
            return 1;
        }
    }
    public function deletePackage($ids)
    {
        // dd($ids);
        $records = TermBaseBookingPackage::whereIn('id', $ids)->get();
        if (!$records->isEmpty()) {
            // dd($records);
            TermBaseBookingPackage::whereIn('id', $ids)->delete();
            return 1;
        }
    }
    public function destroy($id)
    {
        $class = TermBaseBooking::find($id);
        if ($class) {
            TermBaseBooking::where('parent_id', $id)->delete();
            $class->delete();
            return 1;
        }
    }
    public function selectTerm(Request $request)
    {
        $record = Term::find($request->term_id);
        return view(self::VIEW . '.partial.term_detail', get_defined_vars());
    }
    function findKey($array, $keySearch)
    {
        $not_exist_package = [];
        foreach ($array as $key => $item) {
            // dd($key,$item);
            if (!isset($item[$keySearch])) {
                // dd($item);
                $not_exist_package[] = $item;
                // return $item;
            }
        }
        return $not_exist_package;
    }
    public function copyTerm(Request $request, $id)
    {
        $request->validate([
            // 'name' => 'required|min:3|max:250',
            'class_id' => 'required',
            'term_id' => 'required',
            'trianer_detail' => 'required',
            // 'trainer_id' => 'required',
            'class_type_id' => 'required',
            'no_of_student' => 'required',
            'day_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'discount' => 'nullable|integer',
        ]);
        $copy_term_base_booking = TermBaseBooking::find($id);
        $define_term = Term::find($request->term_id);
        // dd($request->all());

        $parent_term_base_booking = TermBaseBooking::create([
            'user_id' => Auth::id(),
            'swimming_class_id' => $request->class_id,
            'class_type_id' => $request->class_type_id,
            'term_id' => $define_term->id,
            'name' => $define_term->name,
            'discount' => $request->discount ? $request->discount : 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'no_of_class' => $request->no_of_class,
            'no_of_student' => $request->no_of_student,
            'total' => $request->total,
            'blackout_check' => $request->blackout_check ? 1 : 0,
            'blackout_start_date' => $request->blackout_check ? $request->blackout_start_date : null,
            'blackout_end_date' => $request->blackout_check ? $request->blackout_end_date : null,
        ]);
        foreach ($request['trianer_detail'] as $detail) {
            $term_base_booking = TermBaseBooking::create([
                'user_id' => Auth::id(),
                'trainer_id' => $detail['trainer_id'],
                'venue_id' => $detail['venue_id'],
                'timing_id' => $detail['timing_id'],
                'swimming_class_id' => $request->class_id,
                'class_type_id' => $request->class_type_id,
                'name' => $request->name,
                'discount' => $request->discount ? $request->discount : 0,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'no_of_class' => $request->no_of_class,
                'no_of_student' => $request->no_of_student,
                'total' => $request->total,
                'term_id' => $define_term->id,
                'name' => $define_term->name,
                'parent_id' => $parent_term_base_booking->id,
            ]);
            if ($request['addmore1']) {
                $this->saveMeta($request, $term_base_booking->id);
            }
        }

        $days = Day::whereIn('name', $request->day_id)->get();
        foreach ($days as $day) {
            // dd($days);
            TermBaseBookingDays::create([
                'day_id' => $day->id,
                'term_base_booking_id' => $parent_term_base_booking->id,
            ]);
        }


        return response()->json(
            [
                'success' => true,
                'message' => 'Record Add Successfully'
            ],
            200
        );
    }
}
