<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SwimmingSessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // foreach ($this as $class){
            // dd($this,$data);
            // $records=[];
            // $class=$this->first();
            // if ($class->checkDate()){
            //     if (count($class->termStudents) != 0){
            //         if ($class->attandanceDays()){
            //             // dd(2);
            //             $current_date = Carbon::now();
            //             $first = substr($class->name, 0, 1);
            //             $record=[
            //                 'term_id'=>$class->id,
            //                 'name'=>$class->name,
            //                 'students'=>count($class->termStudents),
            //                 'type'=>'term',
            //                 'date'=>$current_date->format('d M y'),
            //             ];
            //             $records[] = $record;
            //         }
            //     }
            // }
        // }
        // foreach ($this as $class){
        //     // $class=$data->first();
        //     foreach ($class->termBaseBookingPackages as $package){
        //         if ($class->checkDate()) {
        //             // dd(1);
        //             if (count($package->packageStudents) != 0){
        //                 if ($class->attandanceDays()){
        //                     $current_date = Carbon::now();
        //                     $first = substr($package->name, 0, 1);
        //                     $record=[
        //                         'term_id'=>$package->id,
        //                         'name'=>$package->name,
        //                             'students' => count($package->packageStudents),
        //                         'type'=>'package',
        //                         'date'=>$current_date->format('d M y'),
        //                     ];
        //                     $records[] = $record;
        //                 }
        //             }
        //         }
        //     }
        // }
        $current_date = Carbon::now();
            $records=[];
                $records=[

                    [
                        'term_id'=>$this->id,
                        'name'=>$this->name,
                        'students'=>count($this->termStudents),
                        'type'=>'term',
                        'date'=>$current_date->format('d M y'),
                    ],
                    
                ];
        return  $records;
    }
}
