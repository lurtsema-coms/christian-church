<?php

namespace App\Http\Controllers;

use App\Models\Sermons;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Inertia\Response;


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

    // public function display()
    // {
    //     $query = Sermons::with('creator')->withoutTrashed()->latest();
    //     $sermons = $query->paginate(10)->withQueryString();

    //     return Inertia:: render ('Sermons',[
    //         'sermons' => $sermons,
    //     ]);
    // }

    public function display()
    {
        $url = 'https://feed.podbean.com/unstoppablerevkev/feed.xml';

        $context = stream_context_create([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ]
        ]);

        $rssContent = file_get_contents($url, false, $context);
        if (!$rssContent) {
            abort(500, "Failed to load RSS feed.");
        }

        $rss = simplexml_load_string($rssContent);

        $defaultImage = (string) $rss->channel->image->url ?? '/img/default-sermon.jpg';

        $sermons = collect();

        foreach ($rss->channel->item as $item) {
            // Check if <itunes:image> exists
            $itunes = $item->children('itunes', true);
            $image = isset($itunes->image) ? (string) $itunes->image->attributes()->href : $defaultImage;

            $sermons->push([
                'title' => (string) $item->title,
                'description' => (string) $item->description,
                'audio_url' => (string) $item->enclosure['url'],
                'image_url' => $image,
            ]);
        }

        // Manual pagination
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $sermons->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $currentItems,
            $sermons->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return Inertia::render('Sermons', [
            'sermons' => $paginated,
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
    
        return Inertia::location(route('admin_sermon'));

    }

    public function edit($id): Response
    {
        $sermon = Sermons::findOrFail($id);
        return Inertia::render('AdminSermonsEdit', [
            'sermon' => $sermon
        ]);
    }


    public function update(Request $request, Sermons $sermon)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // 'audio' => 'nullable',
        ]);

    
        // Update title and description
        $sermon->title = $validated['title'];
        $sermon->description = $validated['description'];
    

        // Update image if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('photos'), $imageName);
            $sermon->image_url = asset('photos/' . $imageName);
        }


    
        // Update audio if a new audio is provided
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $audioName = time() . '_' . $audio->getClientOriginalName();
            $audio->move(public_path('audios'), $audioName);
            $sermon->audio_url = asset('audios/' . $audioName);
        }
    
        // Save the updated sermon
        $sermon->save();
    
        return redirect()->route('admin_sermon')->with('success', 'Sermon updated successfully.');
    }
    

    public function destroy(Sermons $sermon)
    {
        $sermon->delete();
        return back()->with('success', 'Product deleted successfully');
    }
}
