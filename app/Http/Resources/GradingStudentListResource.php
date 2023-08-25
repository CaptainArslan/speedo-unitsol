<?php

namespace App\Http\Resources;

use App\Models\ClassGrading;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GradingStudentListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $now = Carbon::now();
        $current_date = $now->format('Y-m-d');
        $class_grading = ClassGrading::where('class_id', $request->term_id)->where('type', $request->type)->first();
        $data=$class_grading?->gradings->where('student_id', $this->student_id)->first();
        $record=$data?->only('status', 'remarks');
        // dd($record);
        return [
            'student_id' => $this->student?->id,
            'student_name' => $this->student?->name,
            'swim_code' => $this->student?->swim_code,
            'student_image' => env('APP_IMAGE_URL') . 'student/' . $this->student?->image,
            'class_id' => $this->term_id,
            'class_type' => $this->type,
            'class_name' => $this->className(),
            'time' => $this->getTime(),
            'date' => $class_grading?->date,
            'studentGrading' => $record!=null?[
                'status'=>$record['status'],
                'remarks'=>$record['remarks'],
            ] : null,
        ];
    }
}
