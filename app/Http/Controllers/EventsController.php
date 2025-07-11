<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventsController extends Controller
{

    public function display(Request $request)
    {
        $year = $request->query('year', date('Y'));
        $month = $request->query('month', date('m'));

        $events = Calendar::whereYear('date_time', $year)
            ->whereMonth('date_time', $month)
            ->get();

        return Inertia::render('Events', [
            'events' => $events,
            'currentYear' => $year,
            'currentMonth' => $month,
        ]);
    }
}
