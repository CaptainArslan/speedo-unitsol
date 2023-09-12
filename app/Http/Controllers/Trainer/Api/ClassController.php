<?php

namespace App\Http\Controllers\Trainer\Api;

use Illuminate\Http\Request;
use App\Models\SwimmingClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\SwimmingClassCollection;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClasses()
    {
        $record = SwimmingClass::where('status', SwimmingClass::ACTIVE)->get();
        return new SwimmingClassCollection(
            $record
        );
    }

}
