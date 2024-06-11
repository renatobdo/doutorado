<?php

namespace App\Http\Controllers;

use App\Models\arboviroses;
use App\Models\Catalogo;
use Illuminate\Http\Request;
use App\Models\Foco;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB; // Importe a classe DB aqui
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    //
    public function index()
    {
        
        // Buscar os focos mais recentes, ordenados da mais recente para a mais antiga
        $focosRecentes = Foco::orderBy('created_at', 'desc')->get();
        
        // Busque todos os eventos, ordenados do mais recente para o mais antigo, 
        //juntamente com o nome do usuário
        $eventosRecentes = Evento::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        // Busque os usuários que mais identificaram focos
        $rankingUsuarios = User::select('users.id', 'users.name','users.email', DB::raw('COUNT(eventos.id) as focos_count'))
            ->leftjoin('eventos', 'users.id', '=', 'eventos.user_id')
            ->groupBy('users.id', 'users.name', 'users.email')
            ->orderBy('focos_count', 'desc')
            ->take(5)
            ->get();

        

        return view('events.index', ['focosRecentes' => $focosRecentes, 
        'eventosRecentes' => $eventosRecentes,
        'rankingUsuarios' => $rankingUsuarios]);
    }
   

    public function buscarFocosProximos(Request $request)
    {
        $lat = $request->query('lat');
        $lng = $request->query('lng');
        $radius = 1000; // Raio em metros

        Log::info('Parâmetros para busca de focos próximos:', ['latitude' => $lat, 'longitude' => $lng, 'radius' => $radius]);

        // Cálculo de distância utilizando a fórmula Haversine
        $focos = DB::select(
            'SELECT * FROM (
                SELECT id, latitude, longitude, 
                (6371000 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) 
                + sin(radians(?)) * sin(radians(latitude)))) AS distance 
                FROM focos
            ) AS subquery
            WHERE distance < ?
            ORDER BY distance',
            [$lat, $lng, $lat, $radius]
        );

        Log::info('Focos próximos encontrados:', ['focos' => $focos]);

        return response()->json($focos);
    
    }



    public function create()
    {
        return view('events.create');
    }
    
    public function store(Request $request)
    {
        $event = new Evento;
        $event->titulo = $request->title;
        $event->date = $request->date;
        $event->cidade = $request->city;
        $event->cep = $request->cep;
        $event->endereco = $request->endereco;
       // $event->privado = $request->private;
        $event->descricao = $request->description;
        //$event->items = $request->items;

        //Image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) .
                "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }
        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }
    public function show($id)
    {

        $event = Evento::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;
        if ($user) {
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach ($userEvents as $userEvent) {
                if ($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', [
            'event' => $event, 'eventOwner' => $eventOwner,
            'hasUserJoined' => $hasUserJoined
        ]);
    }
    public function dashboard()
    {

        $user = auth()->user();
        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view(
            'events.dashboard',
            ['events' => $events, 'eventsasparticipant' => $eventsAsParticipant]
        );
    }

    public function destroy($id)
    {
        Evento::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }
    public function edit($id)
    {
        $user = auth()->user();

        $event = Evento::findOrFail($id);

        if ($user->id != $event->user_id) {

            return redirect('/dashboard');
        }

        return view('events.edit', ['event' => $event]);
    }
    public function update(Request $request)
    {

        $data = $request->all();

        //Image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) .
                "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);
            $data['image'] = $imageName;
        }

        Evento::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }
    public function joinEvent($id)
    {

        //usuário logado
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $event->titulo);
    }

    public function leaveEvent($id)
    {

        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento ' . $event->titulo);
    }
    public function getAddressByCEP($cep)
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        //$response = Http::get("https://h-apigateway.conectagov.estaleiro.serpro.gov.br/api-cep/v1/consulta/cep/{$cep}");

        if ($response->successful()) {
            $addressData = $response->json();
            return $addressData;
        } else {
            return response()->json(['error' => 'CEP not found'], 404);
        }
    }
    public function getCoordinates($address)
    {
        $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($address) . "&format=json&addressdetails=1&limit=1";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($output, true);

        if (isset($data[0])) {
            return [
                'latitude' => $data[0]['lat'],
                'longitude' => $data[0]['lon']
            ];
        } else {
            return null;
        }
    }
    public function buscarCasosDengue($cep)
    {
        // Busca os casos de dengue para o bairro especificado no MySQL
        $casos = arboviroses::where('cep', $cep)->count();

        return response()->json(['casos' => $casos]);
    }
    public function buscarCatalogo($termo)
    {


        $termos = Catalogo::where('termo', 'like', "%{$termo}%")->get();

        return response()->json(['termo' => $termos]);
    }
    public function buscarCatalogoAll(Request $request)
    {
        $termo = $request->query('');
        $termos = Catalogo::orderBy('termo')->get(); // Retorna todos os registros da tabela catalogo ordenados pelo termo

        return view('events.catalogo', ['termos' => $termos]);
    }


    public function showCatalogo()
    {

        $termos = Catalogo::orderBy('termo')->get(); // Retorna todos os registros da tabela catalogo ordenados pelo termo

        return view('events.catalogo', ['termos' => $termos]);
    }
    public function editarTermo($termo)
    {
        $termo = Catalogo::where('nome', $termo)->first();

        // Verifique se o termo foi encontrado
        if (!$termo) {
            // Se o termo não for encontrado, você pode retornar uma resposta de erro ou redirecionar para uma página de erro
            // Por exemplo:
            abort(404); // Isso retornará um erro 404 Not Found
        }

        // Lógica para buscar os detalhes do termo no banco de dados e passá-los para a página de edição
        return view('editar-termo', ['termo' => $termo]);
    }
}
