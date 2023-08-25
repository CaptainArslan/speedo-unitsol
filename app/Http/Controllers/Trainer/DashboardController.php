<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    const VIEW = 'trainer';


    public function __construct()
    {
        view()->share([]);
    }
    public function index()
    {
        return view(self::VIEW . '.dashboard.index');
    }
    public function login()
    {
        return view(self::VIEW . '.auth.login');
    }
    public function profile()
    {
        return view(self::VIEW . '.dashboard.profile');
    }
}
