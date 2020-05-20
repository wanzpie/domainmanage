<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;

class DomainRequest extends FormRequest
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
            'pr'             =>  'required|integer',
            'mr'             =>  'required|integer',
            'alexa'          =>  'required|integer',
            'backlinks'      =>  'required|integer',
            'da'     =>  'required|integer',
            'pa'     =>  'required|integer',
            'registered'     =>  'required|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'registered' => 'format date is dd-mm-yyyy',

        ];
    }
    protected function failedValidation(Validator $validator)
    {
       $errors = (new ValidationException($validator));
       throw new HttpResponseException(response()->json(['error'=>$errors],JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
    public function response(array $errors)
    {

        return response()->json($errors, 422);
    }
}
