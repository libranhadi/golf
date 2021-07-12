<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenyewaanRequest extends FormRequest
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
        return [
            'users_id' => 'required',
            'id_jadwal' => 'required',
            'status_penyewaan' => 'required',
        ];
    }
}
