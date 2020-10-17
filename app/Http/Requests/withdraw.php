<?php

namespace App\Http\Requests;

use App\Models\cards;
use Illuminate\Foundation\Http\FormRequest;

class withdraw extends FormRequest
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
        $card = cards::where('barcode','=',$this->get('barcode'))->first();

        return [
            'barcode' => 'required|exists:cards,barcode',
            'amount' => 'required|integer|max:' . $card->balance . '|min:0',
            'orderNo' => 'required',
        ];
    }
}
