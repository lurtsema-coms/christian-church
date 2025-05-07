<?php

namespace App\Http\Controllers;

use App\Models\Sermons;
use Illuminate\Container\Attributes\Storage;
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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            // 'audio' => 'required|mimes:mp3,wav,aac,ogg,m4a', 
        ]);
    
        $image = $request->file('image');
        $audio = $request->file('audio');

        $imageName = time() . '_' . $image->getClientOriginalName();
        $audioName = time() . '_' . $audio->getClientOriginalName();
        $image->move(public_path('photos'), $imageName);
        $audio->move(public_path('audios'), $audioName);

    
        // $audioPath = $request->file('audio')->store('public/audios');
        // $audioUrl = Storage::url($audioPath); 
    
        Sermons::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => asset('photos/' . $imageName), 

            // 'audio_url' => $audioUrl,
            'created_by' => auth()->id(),   
        ]);
    
        return redirect()->back()->with('success', 'Sermon uploaded successfully.');
    }
}
