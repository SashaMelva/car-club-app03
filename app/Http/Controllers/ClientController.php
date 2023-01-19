<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Client;



class ClientController extends Controller
{/**
 * Store a new blog post.
 *
 * @param  \App\Http\Requests\StorePostRequest  $request
 * @return Illuminate\Http\Response
 */
    
    public function create() 
    {
       return view('role/receivers/newClient');
    }


    public function clientAdd(ClientRequest $request)
    {    
        $client = new Client();
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->patronymic = $request->input('patronymic');
        $client->phone = $request->input('phone');
        
        $client->save();

        return redirect()->route('client');
    }

}
