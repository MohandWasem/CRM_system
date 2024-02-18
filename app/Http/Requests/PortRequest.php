<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortRequest extends FormRequest
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
            "Port_Name"=>"required|string",
            "Port_Type"=>"required",
            "Port_Code"=>"required|numeric|min:3|unique:ports",
            "Port_Country"=>"required|string",
            "Port_Notes"=>"required",
        ];
    }
}
