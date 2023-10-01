<?php

namespace App\Http\Resources;

use App\Models\ClassSession;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionStudentListResource extends JsonResource
{

    public function toArray($request)
    {
        $now = Carbon::now();
        $current_date = $now->format('Y-m-d');
        $class_session = ClassSession::where('class_id', $request->term_id)->where('type', $request->type)->whereDate('date', $current_date)->first();
        // dd($class_session);
        $data=$class_session?->sessionAttendance->where('student_id', $this->student_id)->first();
        $record=$data?->only('status', 'late');
        return [
            'student_id' => $this->student?->id,
            'student_name' => $this->student?->name,
            'swim_code' => $this->student?->swim_code,
            'student_image' => env('APP_IMAGE_URL') . 'student/' . $this->student?->image,
            'class_id' => $this->term_id,
            'class_type' => $this->type,
            'date' => $class_session?->date,
            'class_name' => $this->className(),
            'time' => $this->getTime(),
            'payment_status' => $this->orderDetails->order?->payment_status,
            'remaining_balance' => $this->orderDetails->order->customerOrderBalance()
                ->orderBy('created_at', 'desc')
                ->latest()
                ->first()->balance ?? 0,
            'studentAttandance' => $record!=null?[
                'status'=>$record['status'],
                'reason'=>$record['late'],
            ] : null,
        ];
    }
}
