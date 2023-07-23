<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];

        // Lấy phương thức đang hoạt động
        $currentAction = $this->route()->getActionMethod();

        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rules = [
                            'product_name' => 'required|unique:products|max:255',
                            'product_size' => 'required',
                            'product_color' => 'required',
                            'product_quantity' => 'required|numeric',
                            'selling_price' => 'required|numeric',
                            'discount_price' => 'required|numeric',
                            'category_id' => 'required',
                        ];
                        break;
                    case 'edit':
                        $productId = $this->route('id');
                        $rules = [
                            'product_name' => [
                                'required',
                                Rule::unique('products')->ignore($productId),
                                'max:255',
                            ],
                            'product_size' => 'required',
                            'product_color' => 'required',
                            'product_quantity' => 'required|numeric',
                            'selling_price' => 'required|numeric',
                            'discount_price' => 'required|numeric',
                            'category_id' => 'required',
                        ];
                        break;
                    default:
                        break;
                }
                break;
        }

        return $rules;
    }
}
