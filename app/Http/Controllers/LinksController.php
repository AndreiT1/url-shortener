<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class LinksController extends Controller
{
    //

    public function show($hash){
        
        $link=Link::where('hash' , $hash)->first();
        return  redirect($link->url,301);
    }


    public function create(){
        return view('links.create');
    }


    public function store(Request $request){

        $this->validate(request(),[
            'url' => 'required'   
           ]);

        $link=Link::where('url' , $request->url)->first();

        if(!$link){

            try{
            $client=new Client();
            $request=$client->head($request->url);
            
            if($request->getStatusCode()==200){

                    $link=Link::create([
                    'url'=>$request->url,
                    'hash'=>str_random(6)
                ]);
            }
        }catch(GuzzleException $e) {
                return redirect()->back()->with('invalidAdress','URL is not valid!');
        }

            
       }
        

        return view('links.succes',compact('link'));
    
    }

    
}
