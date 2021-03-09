<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    // 'title',
    // 'description',
    // 'amount',
    // 'desired_date',
    // 'address',

     
    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required', 'max:1000'],
            'amount' => ['required', 'numeric'],
            'address' => ['required'],
            'desired_date' => ['required', 'date'],
        ];
    }
}
