<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountSettingRequest;
use furkankadioglu\eFatura\Exceptions\ApiException;
use furkankadioglu\eFatura\InvoiceManager;
use Illuminate\Http\Request;

class AccountSettingController extends Controller
{
    public function update(AccountSettingRequest $request, InvoiceManager $client)
    {
        $user = $request->user();
        $user->settings()->setMultiple([
            'earsiv.ivd_user' => $request->validated('ivd_user'),
            'earsiv.ivd_pass' => $request->validated('ivd_pass')
        ]);

        try {
            $client->setCredentials($request->validated('ivd_user'), $request->validated('ivd_pass'));
            $client->connect();
            flash('E-Arşiv bilgileri güncellendi.')->success();
        } catch (ApiException $e) {
            flash('E-Arşiv bilgileri hatalı!')->error();
        }

        return redirect()->route('account.profile');
    }
}
