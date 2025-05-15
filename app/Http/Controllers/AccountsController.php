<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;


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
}
