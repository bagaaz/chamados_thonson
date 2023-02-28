<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'title' => 'required|string|max:255',
            // 'caller_id' => 'required|integer',
            // 'service_order' => 'required|string|max:255',
            // 'local_mnemonic' => 'required|string|max:255',
            // 'outside_mnemonic' => 'required|string|max:255',
            // 'priority' => 'required|integer',
            // 'description' => 'required|string'
        ];
    }
}
