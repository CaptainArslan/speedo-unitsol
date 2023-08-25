<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventStudent;
use App\Models\Image;
use App\Models\Student;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{
    const TITLE = 'Event';
    const VIEW = 'admin/event';
    const URL = 'admin/events';


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
        abort_if(Gate::denies('view_event'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = Event::latest()->get()
                ->map(function ($r,$key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user=User::find(Auth::id());
                    if($user->can('edit_event')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";

                    }
                    $edit=$user->can('edit_event')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_event')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
                    class='icon ni ni-trash'></em><span>Delete</span></a>
                    </li>" : "";
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
                                    </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'name' => $name,
                        'no_of_student' => $r->getStudents(),
                        // 'description' => html_entity_decode($r->description),
                        'start_date_time' => date('M m,Y', strtotime($r->start_date)) . ' | ' . date('h:i A', strtotime($r->start_time)),
                        'end_date_time' => date('M m,Y', strtotime($r->end_date)) . ' | ' . date('h:i A', strtotime($r->end_time)),
                        'google_map_location' => $r->getLocation(),
                        'venue' => $r?->venue?->name,
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions','name', 'no_of_student', 'google_map_location'])
                ->make(true);
        }
        return view(self::VIEW . '.index');
    }


    public function create()
    {
        abort_if(Gate::denies('add_event'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $venues = Venue::all();
        $students = Student::all();
        return view(self::VIEW . '.create', get_defined_vars());
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'venue_id' => 'required',
            'students' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required',
            'google_map_location' => 'required',
            'descriptions' => 'required',
            'images' => 'required',
        ]);
        $event = new Event();
        $event->fill($request->all());
        $event->user_id = Auth::id();
        $event->description = $request->descriptions;
        $event->save();
        if ($request->images) {
            foreach ($request->images as $image) {
                $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/event', $name);
                $image_name = $name;
                Image::saveImage([
                    'image' => $image_name,
                    'imageable_type' => Event::class,
                    'imageable_id' => $event->id,
                ]);
            }
        }
        if ($request['students']) {
            foreach ($request['students'] as $student_id) {
                EventStudent::create([
                    'student_id' => $student_id,
                    'event_id' => $event->id,
                ]);
            }
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
        abort_if(Gate::denies('edit_event'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $event = Event::with('eventStudents.student')->find($id);
        $venues = Venue::all();
        $students = Student::all();
        return view(self::VIEW . '.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->fill($request->all());
        $event->save();
        if ($request->images) {
            Image::where('imageable_type', Event::class)->where('imageable_id', $event->id)->delete();
            foreach ($request->images as $image) {
                $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/event', $name);
                $image_name = $name;
                Image::saveImage([
                    'image' => $image_name,
                    'imageable_type' => Event::class,
                    'imageable_id' => $event->id,
                ]);
            }
        }
        if ($request['students']) {
            EventStudent::where('event_id', $event->id)->delete();
            foreach ($request['students'] as $student_id) {
                EventStudent::create([
                    'student_id' => $student_id,
                    'event_id' => $event->id,
                ]);
            }
        }
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
        $event = Event::find($id);
        if ($event) {
            Image::where('imageable_type', Event::class)->where('imageable_id', $event->id)->delete();
            EventStudent::where('event_id', $event->id)->delete();
            $event->delete();
            return 1;
        }
    }
}
