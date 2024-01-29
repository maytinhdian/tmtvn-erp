<?php

namespace Modules\School\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'school_name'=>"required|max:255",
            'pc_name'=>'required|max:255',
            'user_name'=>'required|max:255',
            'mac_address'=>'required|mac_address|unique:computers,mac_address',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
