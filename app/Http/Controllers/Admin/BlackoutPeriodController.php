<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlackoutPeriod;
use App\Models\BlackoutPeriodDay;
use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlackoutPeriodController extends Controller
{
    const TITLE = 'Blackout Period';
    const VIEW = 'admin/blackout_period';
    const URL = 'admin/blackout-periods';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
        ]);
    }
    public function index()
    {
        $days = Day::all();
        $blackout_periods = BlackoutPeriod::all();
        return view(self::VIEW . '.index', get_defined_vars());
    }


    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'day_id' => 'required',
        ]);
        $blackout_period = new BlackoutPeriod();
        $blackout_period->fill($request->all());
        $blackout_period->user_id = Auth::id();
        $blackout_period->save();
        foreach ($request['day_id'] as $day) {
            BlackoutPeriodDay::create([
                'day_id' => $day,
                'blackout_period_id' => $blackout_period->id,
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
        $days = Day::all();
        $blackout_period = BlackoutPeriod::find($id);
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $blackout_period = BlackoutPeriod::find($id);
        $blackout_period->fill($request->all());
        $blackout_period->save();
        if ($request['day_id']) {
            BlackoutPeriodDay::where('blackout_period_id', $id)->delete();
            foreach ($request['day_id'] as $day) {
                BlackoutPeriodDay::create([
                    'day_id' => $day,
                    'blackout_period_id' => $blackout_period->id,
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
        $blackout_period = BlackoutPeriod::find($id);
        if ($blackout_period) {
            BlackoutPeriodDay::where('day_id', $id)->delete();
            $blackout_period->delete();
            return 1;
        }
    }
}
