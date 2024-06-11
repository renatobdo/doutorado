<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foco;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FocoController extends Controller
{
    public function store(Request $request)
    {
        $foco = new Foco();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $foco->caminho_foto = 'img/events/' . $imageName;
        }

        $foco->nome_foco = $request->input('title');
        $foco->data_foco = $request->input('date');
        $foco->cep = $request->input('cep');
        $foco->cidade = $request->input('city');
        $foco->estado = $request->input('state');
        $foco->endereco = $request->input('endereco');
        $foco->numero = $request->input('numero');
        $foco->descricao = $request->input('description');
        $foco->focos_identificados = implode(',', $request->input('items', []));
        $foco->latitude = $request->input('latitude');
        $foco->longitude = $request->input('longitude');
        $foco->user_id = Auth::id();

        $foco->save();

        return redirect('/')->with('success', 'Foco identificado com sucesso!');
    }
    public function show($id)
    {
        $foco = Foco::findOrFail($id);

        $user = auth()->user();
        $hasUserIdentified = false;
        if ($user) {
            $userFocos = $user->focos->toArray();

            foreach ($userFocos as $userFoco) {
                if ($userFoco['id'] == $id) {
                    $hasUserIdentified = true;
                }
            }
        }

        $focoOwner = User::where('id', $foco->user_id)->first()->toArray();

        return view('focos.show', [
            'foco' => $foco,
            'focoOwner' => $focoOwner,
            'hasUserIdentified' => $hasUserIdentified
        ]);
    }
    public function joinFoco($id)
    {
        
        $user = auth()->user();
        $foco = Foco::findOrFail($id);
        $user->monitoredFocos()->attach($foco);

        return redirect()->route('focos.dashboard')->with('success', 'Você está monitorando este foco.');
    }
    public function dashboard()
    {
        $user = Auth::user();
        
        // Focos identificados pelo usuário
        $focosIdentificados = Foco::where('user_id', $user->id)->get();
        
        // Focos que o usuário está monitorando
        $focosMonitorados = $user->monitoredFocos()->get();

        return view('focos.dashboard', [
            'focosIdentificados' => $focosIdentificados,
            'focosMonitorados' => $focosMonitorados
        ]);
    }
    public function unmonitorFoco($id)
    {
        $user = Auth::user();
        $foco = Foco::findOrFail($id);
        $user->monitoredFocos()->detach($foco);

        return redirect()->route('focos.dashboard')->with('success', 'Você deixou de monitorar este foco.');
    }
    public function identificarFoco()
    {
        return view('focos.identificarFoco');
    }
    public function update(Request $request)
    {
        $foco = Foco::findOrFail($id);

        $foco->nome_foco = $request->input('nome_foco');
        $foco->descricao = $request->input('descricao');
        $foco->cidade = $request->input('cidade');
        $foco->data_foco = $request->input('date');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $foco->caminho_foto = 'img/events/' . $imageName;
        }

        $foco->save();

        return redirect('/focos/dashboard')->with('success', 'Foco atualizado com sucesso!');
    }
    public function destroy($id)
    {
        Foco::findOrFail($id)->delete();

        return redirect('/focos/dashboard')->with('msg', 'Foco excluído com sucesso!');
    }
    public function edit($id)
    {
        $user = auth()->user();

        $foco = Foco::findOrFail($id);

        if ($user->id != $foco->user_id) {

            return redirect('/focos/dashboard');
        }

        return view('focos.edit', ['foco' => $foco]);
    }
}
