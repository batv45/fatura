<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AccountSettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ivd_user' => 'required|string',
            'ivd_pass' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'ivd_user' => 'İnteraktif Kullanıcı Kod',
            'ivd_pass' => 'İnteraktif Kullanıcı Şifre'
        ];
    }
}
