<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
}
