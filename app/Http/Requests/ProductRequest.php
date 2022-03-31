<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'                  => 'required',
            'barcode'               => ['string','nullable',Rule::unique('products','barcode')->ignore( request('id'))],
            'maximum_stock'         => 'required',
            'minimum_stock'         => 'required',
            'box_quantity'          => 'required',
            'blister_quantity'      => 'required',
            'presentation_sale'     => 'required',
            'buy_unit'              => 'required',
            'buy_blister'           => 'required',
            'buy_box'               => 'required',
            'sale_unit'             => 'required',
            'sale_blister'          => 'required',
            'sale_box'              => 'required',
            'minimum_sale_unit'     => 'required',
            'minimum_sale_blister'  => 'required',
            'minimum_sale_box'      => 'required',
            'control_expiration'    => 'required',
            'control_stock'         => 'required',
            'control_refrigeration' => 'required',
            'control_prescription'  => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'                  => 'Este campo es requerido',
            'barcode.unique'                 => 'El código debe ser único',
            'maximum_stock.required'         => 'Este campo es requerido',
            'minimum_stock.required'         => 'Este campo es requerido',
            'box_quantity.required'          => 'Este campo es requerido',
            'blister_quantity.required'      => 'Este campo es requerido',
            'presentation_sale.required'     => 'Este campo es requerido',
            'buy_unit.required'              => 'Este campo es requerido',
            'buy_blister.required'           => 'Este campo es requerido',
            'buy_box.required'               => 'Este campo es requerido',
            'sale_unit.required'             => 'Este campo es requerido',
            'sale_blister.required'          => 'Este campo es requerido',
            'sale_box.required'              => 'Este campo es requerido',
            'minimum_sale_unit.required'     => 'Este campo es requerido',
            'minimum_sale_blister.required'  => 'Este campo es requerido',
            'minimum_sale_box.required'      => 'Este campo es requerido',
            'control_expiration.required'    => 'Este campo es requerido',
            'control_stock.required'         => 'Este campo es requerido',
            'control_refrigeration.required' => 'Este campo es requerido',
            'control_prescription.required'  => 'Este campo es requerido',
        ];
    }
}
