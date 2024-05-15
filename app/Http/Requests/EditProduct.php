<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProduct extends FormRequest
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
            'product_name' => 'required|string|max:255',
            'product_unit' => 'required|string|max:255',
            'product_number' => 'required|string|max:255',
            'purchase_rate' => 'required|numeric',
            'sale_rate' => 'required|numeric',
            'sale_rate_2' => 'required|numeric',
            'sale_rate_3' => 'required|numeric',
            'stock_alert' => 'required|numeric',
            'group' => 'required|string|max:255',
            'product_location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_lock' => 'nullable|in:on',
        ];
    }
}
