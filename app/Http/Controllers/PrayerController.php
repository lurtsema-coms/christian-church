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
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = [];

        $data['prayers'] = Prayer::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('prayer_title', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('prayer_category', 'like', "%{$search}%")
                    ->orWhere('prayer_details', 'like', "%{$search}%");

                    // Format: "Sat, July 19, 2025"
                    $q->orWhereRaw("DATE_FORMAT(created_at, '%a, %M %d, %Y') LIKE ?", ["%{$search}%"]);

                    // Optional extra formats (in case user types different variations)
                    $q->orWhereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') LIKE ?", ["%{$search}%"]);
                    $q->orWhereRaw("DATE_FORMAT(created_at, '%M %d %Y') LIKE ?", ["%{$search}%"]);
                    $q->orWhereRaw("DATE_FORMAT(created_at, '%M') LIKE ?", ["%{$search}%"]);
                    $q->orWhereRaw("DATE_FORMAT(created_at, '%Y') LIKE ?", ["%{$search}%"]);

                    // Handle "Active"/"Inactive" for `is_approved`
                    if (strtolower($search) === 'active') {
                        $q->orWhere('is_approved', 1);
                    } elseif (strtolower($search) === 'inactive') {
                        $q->orWhere('is_approved', 0);
                        $q->orWhere('is_approved', null);
                    }
                });
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return Inertia::render('AdminPrayer', $data);
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
    public function edit(string $id)
    {
        $data = [];
        $data['prayer'] = Prayer::findOrFail($id);
        
        return Inertia::render('AdminPrayerEdit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prayer = Prayer::findOrFail($id);
        $prayer->is_approved = $prayer->is_approved ? 0 : 1;
        $prayer->save();

        return redirect()->route('admin_prayer.index')->with('success', 'Prayer status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prayer $prayer)
    {
        //
    }
}
