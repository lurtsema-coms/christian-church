<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventsController extends Controller
{
    public function display()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');

        $events = Calendar::whereYear('date_time',$currentYear)
            ->whereMonth('date_time', $currentMonth)
            ->get();

        return Inertia::render('Events', [
            'events' => $events,
            'currentYear' => $currentYear,
            'currentMonth' => $currentMonth,
        ]);
    }
}
