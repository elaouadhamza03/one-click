<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        return [
            'email_contact' => 'required|email|max:255',
            'adresse' => 'required|string',
            'telephone' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'description' => 'required|string',
            'logo_blanc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_noir' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}