<?php

namespace App\Http\Resources;

use App\Models\ClassAssessment;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AssessmentStudentListResource extends JsonResource
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
        $class_assessment = ClassAssessment::where('class_id', $request->term_id)->where('type', $request->type)->first();
        $record=$class_assessment?->assessmentStudent->where('student_id', $this->student_id)->first();
        return [
            'student_id' => $this->student?->id,
            'student_name' => $this->student?->name,
            'swim_code' => $this->student?->swim_code,
            'student_image' => env('APP_IMAGE_URL') . 'student/' . $this->student?->image,
            'class_id' => $this->term_id,
            'class_type' => $this->type,
            'class_name' => $this->className(),
            'time' => $this->getTime(),
            'date' => $class_assessment?->date,
            'payment_status' => $this->orderDetails->order?->payment_status,
            'remaining_balance' => $this->orderDetails->order->customerOrderBalance()
                ->orderBy('created_at', 'desc')
                ->latest()
                ->first()->balance ?? 0,
            'studentAssessment' => $record!=null?[
                'message'=>$record['message'],
                'assessment'=>$record->studentAssessmentDetail,
            ] : null,
        ];
    }
}
