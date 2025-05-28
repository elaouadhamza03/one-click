<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'status' => 'required|in:en_attente,valide,refuse'
        ];
    }

    public function attributes()
    {
        return [
            'nom' => 'nom',
            'email' => 'email',
            'message' => 'message',
            'status' => 'statut'
        ];
    }
}