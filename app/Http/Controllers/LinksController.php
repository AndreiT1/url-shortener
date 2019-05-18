<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class LinksController extends Controller
{
    public function show($hash)
    {

        $link = Link::where('hash', $hash)->first();
        return redirect($link->url);
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        //validate field 
        $this->validate(request(), [
            'url' => 'required'
        ]);
        //check if url is already in the database
        $link = Link::where('url', $request->url)->first();
        //dd($link);
        if (!$link) {
            try {
                $client = new Client();
                $requestGuzzle = $client->head($request->url);          
                 //check if URL is valid and persist to database 
                
                $link = Link::create([
                    'url' => $request->url,
                    'hash' => str_random(6)
                ]);
            } catch (GuzzleException $e) {
                //In case of invalid URL , redirect back with variable session invalidAdress 
                return redirect()->back()->with('invalidAdress', 'URL is not valid!');
            }
        }

        return view('links.succes', compact('link'));
    }
}

