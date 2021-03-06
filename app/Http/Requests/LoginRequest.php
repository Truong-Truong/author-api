<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
        return [
            'email' => 'email|required',
            'pass' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator) 
    {

        $errors = (new ValidationException($validator))->errors();
        $response = [
            'success' => true,
            'message' => $errors,
        ];
        throw new HttpResponseException(response()->json($response, 400));
    }
}
