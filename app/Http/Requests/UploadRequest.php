<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UploadRequest extends FormRequest
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
    public function rules()
    {   
        $rules = [];
        $count = count($this->input('images'));
        foreach(range(0, $count) as $index){

            $rules['images.' .$index] = "required|image|mimes:jgp,png,jpeg|max:2048";
        }

        return $rules;
    }
}
