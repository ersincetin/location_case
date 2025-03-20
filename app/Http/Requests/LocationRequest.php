<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'latitude'  => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'markerColor'     => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/'
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'Konum adı zorunludur.',
            'latitude.required'  => 'Enlem bilgisi zorunludur.',
            'latitude.between'   => 'Enlem -90 ile 90 arasında olmalıdır.',
            'longitude.required' => 'Boylam bilgisi zorunludur.',
            'longitude.between'  => 'Boylam -180 ile 180 arasında olmalıdır.',
            'markerColor.required'     => 'Renk kodu zorunludur.',
            'markerColor.regex'        => 'Geçerli bir HEX renk kodu giriniz (örn: #FF5733).'
        ];
    }
}
