<?php

namespace codeFin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'denomination' => 'required|max:255',
            'start_date_time' => 'required|date',
            'end_date_time' => 'required|date',
            //'work_plan' => 'required',
            //'rider_tecnique' => 'required',
            //'program' => 'required',
            //'notes' => 'required',
            'scheduling' => 'required',
            //'provisional_price' => 'required',
            //'final_price' => 'required',
            'participants_number' => 'required',
            'days_number' => 'required',
            //'programme_doc' => 'required',
            //'procedding_doc' => 'required',
            'abrangence_id' => 'required',
            'eventState_id' => 'required',
            'eventType_id' => 'required',
            'eventKind_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
