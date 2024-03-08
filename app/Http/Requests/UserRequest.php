<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nom"=>["required","String"],
            "prenom"=>["required","String"],
            "matricule"=>["required",Rule::unique("users","matricule")],
            "niveau"=>["required",Rule::in(["L1","L2","L3","M1","M2"])],
            "adresse"=>["required","String"],
            "email"=>["required","email"],
            "mobile"=>["required","string"],
            "image"=>["required","string"]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "message"=>"data no valid",
            "error"=>$validator->errors()
        ],400));
    }
    
}
