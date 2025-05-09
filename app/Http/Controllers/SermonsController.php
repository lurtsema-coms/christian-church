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

    public function index()
    {
        $query = Sermons::with('creator')->withoutTrashed()->latest();
        $sermons = $query->paginate(10)->withQueryString();

        return Inertia:: render ('AdminSermons',[
            'sermons' => $sermons,
        ]);
    }

    public function display()
    {
        $query = Sermons::with('creator')->withoutTrashed()->latest();
        $sermons = $query->paginate(10)->withQueryString();

        return Inertia:: render ('Sermons',[
            'sermons' => $sermons,
        ]);
    }

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
            // 'audio' => 'required|mimes:mp3,wav,aac,ogg,audio/x-m4a', 
        ]);
    
        $image = $request->file('image');
        $audio = $request->file('audio');

        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('photos'), $imageName);
        $imageUrl = asset('photos/' . $imageName);

        $audioName = time() . '_' . $audio->getClientOriginalName();
        $audio->move(public_path('audios'), $audioName);
        $audioUrl = asset('audios/' . $audioName);


    
        Sermons::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $imageUrl,

            'audio_url' => $audioUrl,
            'created_by' => auth()->id(),   
        ]);
    
        return redirect()->back()->with('success', 'Sermon uploaded successfully.');
    }
}
