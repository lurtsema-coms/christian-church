<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Calendar;

class AdminCalendar extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = [];
        $data['calendars'] = Calendar::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('location', 'like', "%{$search}%")
                      ->orwhere('date_time', 'like', "%{$search}%");
                });
            })->paginate(10);

        return Inertia::render('AdminCalendar', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('AdminCalendarAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'dateTime' => 'required|date',
            'location' => 'required|string|max:255',
            'imgUrl' => 'nullable|string',
        ]); 

        Calendar::create([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'date_time' => $validate['dateTime'],
            'location' => $validate['location'],
            'img_url' => $validate['imgUrl'],
            'created_by' => auth()->id(),
        ]);
        
        return redirect()->route('admin_calendar.index')->with('success', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('AdminCalendarEdit', [
            'calendar' => Calendar::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        Calendar::find($id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'date_time' => $data['dateTime'],
            'location' => $data['location'],
            'img_url' => $data['imgUrl'],
        ]);

        return redirect()->route('admin_calendar.index')->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Calendar::find($id)->delete();

        return redirect()->back();
    }
}
