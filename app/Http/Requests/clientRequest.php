<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clientRequest extends FormRequest
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
            // "companyname"=>"required|string",
            // "contactperson"=>"required|string",
            // "email"=>"required|email",
            // "telephone"=>"required|numeric",
            // "mobile"=>"required|numeric",
            // "coming_from"=>"required",
            // "file_name"=>"string",
            // "file"=>"mimes:png,jpg,pdf,jpeg,webp|required"
        ];
    }
}
