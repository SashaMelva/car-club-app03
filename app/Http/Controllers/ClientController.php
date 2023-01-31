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
    
    public function create() {
       return view('role/receivers/newClient');
    }


    public function store(ClientRequest $request) {    
       // $client = DB::select('select * from client where active = ?', [1]);
        $client = new Client();
        
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->patronymic = $request->input('patronymic');
        $client->phone = $request->input('phone');
        
        $client->save();

        return redirect()->route('client')->with("Клиет успешно создан");
    } 

    public function allData() {
        return view('role/receivers/client', ['clientsData' => Client::all()]);
    }

    public function deletClient($id) {
        Client::find($id)->delete();
        return view('role/receivers/client', ['clientsData' => Client::all()]);
    }

    public function updateClient($id) {
        $client = new Client();
        return view('role/receivers/updateClient', ['clientData' => $client->find($id)]);
    }

    public function updateClientSubmit($id, ClientRequest $request) {
        $client = Client::find($id);
        
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->patronymic = $request->input('patronymic');
        $client->phone = $request->input('phone');
        
        $client->save();

        return redirect()->route('client', $id)->with("Данные клиета успешно обновлены");
    }
}