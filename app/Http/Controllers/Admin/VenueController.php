<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\SwimmingClass;
use App\Models\Term;
use App\Models\TermBaseBooking;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class VenueController extends Controller
{
    const TITLE = 'Venue';
    const VIEW = 'admin/venue';
    const URL = 'admin/venues';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'venue',
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_venue'), Response::HTTP_FORBIDDEN, 'Forbidden');
        if ($request->ajax()) {
            $records = Venue::latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $user = auth()->user();
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $actions = '';
                    $status = "{$r->getStatus()}";
                    if ($user->can('edit_venue')) {
                        $name = "<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    } else {
                        $name = "<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }
                    $location = "{$r->getLocation()}";
                    $edit = $user->can('edit_venue') ?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>" : "";
                    $delete = $user->can('delete_venue') ? " <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
                    class='icon ni ni-trash'></em><span>Delete</span></a>
                    </li>" : "";
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
                                    </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'name' => $name,
                        'google_map_location' => $r->getLocation(),
                        'address' => $r->address,
                        'created_at' => $r->created_at->format('M d,Y'),
                        'updated_at' => $r->updated_at->format('M d,Y'),
                        'status' => $status,
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name', 'status', 'google_map_location'])
                ->make(true);
        }
        $records = Venue::count();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:250',
            'google_map_location' => 'required|min:3|max:250',
            'address' => 'required|min:7',
            'image' => 'required',
        ]);
        $image = $request->image;
        $image_name = '';
        if ($image) {
            $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/venue', $name);
            $image_name = $name;
        }
        $class = new Venue();
        $class->fill($request->all());
        $class->user_id = Auth::id();
        $class->image = $image_name;
        $class->save();
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

    public function VenueCalendar(Request $request)
    {
        $days = Day::all();
        $classes = SwimmingClass::all();
        $venues = Venue::all();
        $terms = Term::all();
        $schedules = TermBaseBooking::byVenue($request->venue)
            ->byTerm($request->term)
            ->where('parent_id', '!=', 0)->get();
        $trainers = User::where('is_trainer', true)->get();
        return view(self::VIEW . '.venue_calendar', get_defined_vars());
    }
    public function edit($id)
    {
        abort_if(Gate::denies('edit_venue'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $venue = Venue::find($id);
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $venue = Venue::find($id);
        $image = $request->image;
        $image_name = '';
        if ($image) {
            $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/venue', $name);
            $image_name = $name;
        }
        $venue->fill($request->all());
        $venue->image = $image_name ? $image_name : $venue->image;
        $venue->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update Successfully'
            ],
            200
        );
    }


    public function destroy($id)
    {
        $venue = Venue::find($id);
        if ($venue) {
            $venue->delete();
            return 1;
        }
    }
}
