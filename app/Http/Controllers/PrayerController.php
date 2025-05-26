<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('AdminPrayer', [
            'prayers' => Prayer::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'prayer_title' => 'required|string|max:255',
            'prayer_category' => 'required|string|max:255',
            'prayer_details' => 'required|string|max:1000',
        ]);

        Prayer::create($validated);

        return redirect()->back()->with('success', 'Prayer submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prayer $prayer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prayer $prayer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $admin_prayer)
    {
        $prayer = Prayer::findOrFail($admin_prayer); // Use findOrFail to throw a 404 if not found
        $prayer->is_approved = $prayer->is_approved ? 0 : 1;
        $prayer->save();

        return back()->with('success', 'Prayer status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prayer $prayer)
    {
        //
    }
}
