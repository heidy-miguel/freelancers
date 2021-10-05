<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        //return auth()->check();
        if(auth()->check() && auth()->user()->hasRole('institution')){
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required, alpha'],
            'start_date' => ['required', 'date', 'after:tomorrow'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'category_id' => ['required'],
            'description' => ['required']
        ];
    }
}
