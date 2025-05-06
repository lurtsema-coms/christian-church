<?php

namespace App\Http\Controllers;

use App\Models\Sermons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Inertia\Inertia;
use Inertia\Response;;

class SermonsController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('AdminSermonsCreate');
    }
}
