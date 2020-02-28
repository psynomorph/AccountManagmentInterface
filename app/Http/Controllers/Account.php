<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account as AccountModel;
use App\Http\Requests\StoreAccountRequest;
use Illuminate\Support\Facades\Redirect;

/**
 * Account model class
 */
class Account extends Controller
{
    /**
     * Count of accounts on page
     */
    const ACCOUNTS_PER_PAGE = 10;

    /**
     * Show list of created accounts
     *
     * @return View
     */
    public function list()
    {
        $accounts = AccountModel::paginate(self::ACCOUNTS_PER_PAGE);
        $accounts->withPath('list');
        return view('accounts.list', ['accounts' => $accounts]);
    }

    /**
     * Show account creation form
     *
     * @return View
     */
    public function accountCreationForm(Request $request)
    {
        $account = new AccountModel;
        if ($request->old())
        {
            $account->fill($request->old());
        }
        return view('accounts.edit', ['account' => $account]);
    }


    /**
     * Show account edit form
     *
     * @param int $id
     * @return View
     */
    public function showEditForm($id, Request $request)
    {
        $account = AccountModel::findOrFail($id);
        if ($request->old())
        {
            $account->fill($request->old());
        }
        return view('accounts.edit', ['account' => $account]);
    }

    /**
     * Create new account
     *
     * @param StoreAccountRequest $request
     * @return Redirect
     */
    public function create(StoreAccountRequest $request)
    {
        $account = new AccountModel;
        $account->fill($request->validated());
        $account->save();
        return redirect()
            ->route('index')
            ->with('status', 'Account created!');
    }

    /**
     * Update account
     *
     * @param int $id
     * @return Redirect
     */
    public function update($id, StoreAccountRequest $request)
    {
        $account = AccountModel::findOrFail($id);
        $account->fill($request->validated());
        $account->save();
        return redirect()
            ->route('index')
            ->with('status', 'Account updated!');
    }

    /**
     * Delete acount
     *
     * @param int $id
     * @return Redirect
     */
    public function delete($id)
    {
        $account = AccountModel::findOrFail($id);
        $account->delete();
        return redirect()
            ->route('index')
            ->with('status', 'Account removed!');
    }
}
