<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetial;
use App\Models\SwimmingClass;
use App\Models\User;
use App\Models\Venue;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    const VIEW = 'admin';


    public function __construct()
    {
        view()->share([
            'url'=>url('admin/dashbaord'),
        ]);
    }
    public function index(Request $request)
    {
        $bookings=OrderDetial::ByVenue($request->venue_id)
        ->ByClass($request->class_id)
        ->where('type', null)
    ->latest()->get()->take(10);
        // dd($bookings);
        $sales = OrderDetial::ByVenue($request->venue_id)
            ->ByClass($request->class_id)
        ->where('type', null)
        ->where('created_at', '>', now()->subDays(30)->endOfDay())
        ->get();

        $sales_prices =$sales->pluck('price')->toArray();
        $venues=Venue::all();
        $classes=SwimmingClass::all();
        return view(self::VIEW . '.dashboard.index',get_defined_vars());
    }
    public function login()
    {
        return view(self::VIEW . '.auth.login');
    }

}
