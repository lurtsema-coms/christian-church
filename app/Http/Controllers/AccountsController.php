<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Inertia\Response;


class AccountsController extends Controller
{
    public function index()
    {
        $query = User::withoutTrashed()->latest();
        $users = $query->paginate(10)->withQueryString();


        return Inertia::render('AdminAccounts',[
            'users' => $users,
        ]);
    }

    public function approve($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->approval_status = 1;
        $user->updated_at = now();
        $user->save();
        return redirect()->back()->with('success', 'User approved successfully.');
    }

    public function reject($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->approval_status = 2;
        $user->updated_at = now();
        $user->save();
        return redirect()->back()->with('success', 'User rejected successfully.');
    }

    public function delete($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->deleted_at = now();
        $user->save();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function edit($id): Response
    {
        $account = User::findOrFail($id);
        $roles = Role::select('id', 'title')->get();

        return Inertia::render('AdminAccountsEdit',[
            'account' => $account,
            'roles' => $roles,
        ]);
    } 

    public function update(Request $request, User $account)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $account->id,
            'role' => 'required|exists:roles,id',
            'approval_status' => 'required|in:0,1,2',
            'password' => ['nullable', 'confirmed', 'min:8'],

        ]);

        $account->name = $validated['name'];
        $account->email = $validated['email'];
        $account->role_id = $validated['role'];
        $account->approval_status = $validated['approval_status'];

        if ($request->filled('password')) {
            $account->password = Hash::make($request->password);
        }

        $account->save();
        
        return redirect()->route('admin_accounts')->with('success', 'Account updated successfully.');
    }
}
