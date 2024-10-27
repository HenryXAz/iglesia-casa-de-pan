<?php

namespace App\Http\Requests\FoodProducts;

use App\Models\FoodProduct;
use Illuminate\Foundation\Http\FormRequest;

class MakeOrderRequest extends FormRequest
{
    private readonly FoodProduct $foodProduct;

    public  function  __construct()
    {
        $foodProductId = request()->route('id');
        $foodProduct = FoodProduct::where('id', $foodProductId)->first();

        $this->foodProduct = $foodProduct;
    }

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
            'total_units' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) {
                    if ($this->foodProduct->stock < $value) {
                        $fail('total units could not be greater than the available units.');
                    }
                }
            ],
            'total_to_pay' => 'required|numeric',
        ];
    }
}
