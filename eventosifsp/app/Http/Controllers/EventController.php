<?php

namespace App\Http\Controllers;

use App\Models\arboviroses;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    //
    public function index()
    {
    /*
        $nome = "Renato";
        $idade = 20;
        $arr = [1, 2, 3, 4, 5];
        $nomes = ["Renato", "Paula", "Laura", "Helena"];

        return view(
            'layouts.product',
            [
                'nome' => $nome,
                'idade' => $idade,
                'profissao' => 'professor',
                'arr' => $arr,
                'nomes' => $nomes,
                'id' =>null
            ]
        );
    */
        $search = request('search');
        if($search){
            $eventos = Evento::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $eventos = Evento::all();
        }
        
        return view("events.index",["events" => $eventos, 'search' =>
                                                $search]);
    }
    public function create(){
        return view('events.create');
    }
    public function store(Request $request){
        $event = new Evento;
        $event->titulo = $request->title;
        $event->date = $request->date;
        $event->cidade = $request->city;
        $event->cep = $request->cep;
        $event->endereco = $request->endereco;
        $event->privado = $request->private;
        $event->descricao = $request->description;
        $event->items = $request->items;

        //Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){            
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).
                ".".$extension;
            $requestImage->move(public_path('img/events'),$imageName);
            $event->image = $imageName;
        }
        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }
    public function show($id){

        $event = Evento::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;
        if($user){
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner= User::where('id', $event->user_id)->first()->toArray();

        return view ('events.show',['event'=>$event, 'eventOwner' => $eventOwner,
            'hasUserJoined' => $hasUserJoined]);

    }
    public function dashboard(){
        
        $user = auth()->user();
        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;    

        return view('events.dashboard',
        ['events'=>$events,'eventsasparticipant'=>$eventsAsParticipant]);
    }

    public function destroy($id){
        Evento::findOrFail($id)->delete();
        
        return redirect('/dashboard')->with('msg','Evento excluído com sucesso!');
    }
    public function edit($id){
        $user = auth()->user();

        $event= Evento::findOrFail($id);

        if ($user->id != $event->user_id){

            return redirect('/dashboard');
        }

        return view('events.edit',['event'=>$event]);
        


    }
    public function update(Request $request){

        $data = $request->all();

        //Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).
                ".".$extension;

            $requestImage->move(public_path('img/events'),$imageName);
            $data['image'] = $imageName;
        }

        Evento::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg','Evento editado com sucesso!');
    }
    public function joinEvent($id){

        //usuário logado
        $user = auth()->user();
    
        $user->eventsAsParticipant()->attach($id);
    
        $event = Evento::findOrFail($id);
        
        return redirect('/dashboard')->
            with('msg', 'Sua presença está confirmada no evento '.$event->titulo);
    
    }

    public function leaveEvent($id){

        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Evento::findOrFail($id);

        return redirect('/dashboard')->
            with('msg', 'Você saiu com sucesso do evento '.$event->titulo);

    }
    public function getAddressByCEP($cep) {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        //$response = Http::get("https://h-apigateway.conectagov.estaleiro.serpro.gov.br/api-cep/v1/consulta/cep/{$cep}");
        
        if ($response->successful()) {
            $addressData = $response->json();
            return $addressData;
        } else {
            return response()->json(['error' => 'CEP not found'], 404);
        }
    }
    public function buscarCasosDengue($cep)
    {
        // Busca os casos de dengue para o bairro especificado no MySQL
        $casos = arboviroses::where('cep', $cep)->count();

        return response()->json(['casos' => $casos]);
    }
    
}
