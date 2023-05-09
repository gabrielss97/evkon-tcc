<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $anuncios = Anuncio::orderBy('created_at', 'desc');

        // Filtros
        if ($request->local != '')
            $anuncios->where('titulo', 'like', '%' . $request->local . '%');

        if ($request->cat != '')
            $anuncios->whereHas('categoria', function ($query) use ($request) {
                return $query->where('id', $request->cat);
            });

        if ($request->estado != '')
            $anuncios->where('estado', $request->estado);

        if ($request->cidade != '')
            $anuncios->where('cidade', $request->cidade);


        $anuncios = $anuncios->paginate(12);

        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('painel.anuncios.anuncios', compact('anuncios', 'categorias'));
    }

    /**
     * Anúncios do colaborador
     *
     * @param  mixed $request
     * @return void
     */
    public function meusAnuncios(Request $request)
    {
        $this->authorize('colaborador');
        $anuncios = Anuncio::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id);

        // Filtros
        if ($request->local != '')
            $anuncios->where('titulo', 'like', '%' . $request->local . '%');

        if ($request->cat != '')
            $anuncios->whereHas('categoria', function ($query) use ($request) {
                return $query->where('id', $request->cat);
            });

        if ($request->estado != '')
            $anuncios->where('estado', $request->estado);

        if ($request->cidade != '')
            $anuncios->where('cidade', $request->cidade);


        $anuncios = $anuncios->paginate(12);

        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('painel.anuncios.meus_anuncios', compact('anuncios', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        if ($user->telefone == null || $user->sobre == null || $user->dt_nasc == null || $user->sexo == null) {
            Session::flash('danger', 'Preencha todos os dados na sua conta para criar um anúncio.');
        }

        $this->authorize('colaborador');
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('painel.anuncios.criar', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->telefone == null || $user->sobre == null || $user->dt_nasc == null || $user->sexo == null) {
            Session::flash('danger', 'Preencha todos os dados na sua conta para criar um anúncio.');
            return redirect()->back();
        }


        $this->authorize('colaborador');
        $request['preco'] = $this->converterMoedaParaNumero($request['preco']);
        $validate = [
            'titulo' => ['required', 'min:3', 'max:255', 'string'],
            'estado' => ['required', 'max:255'],
            'cidade' => ['required', 'max:255'],
            'img1' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2048 kb
            'img2' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2048 kb
            'local_lat_lng' => ['required', 'max:255'],
            'descricao_local' => ['required', 'min:3'],
            'descricao_servico' => ['required', 'min:3'],
            'preco' => ['required', 'numeric', 'min:30', 'max:99999999'],
            'tempo_resposta' => ['required', 'max:255'],
            'categoria_id' => ['required', 'exists:categorias,id']
        ];

        // Add essas validações se forem enviadas, ela não são obrigatórias
        if ($request->img3)
            $validate['img3'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        if ($request->img4)
            $validate['img4'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        if ($request->img5)
            $validate['img5'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';

        $request->validate($validate, [], [
            'titulo' => 'título',
            'local_lat_lng' => 'local',
            'descricao_local' => 'descrição do local',
            'descricao_servico' => 'descrição do serviço',
            'preco' => 'preço',
            'tempo_resposta' => 'tempo de resposta',
            'categoria_id' => 'categoria',
        ]);


        $imgs = [
            $request->img1->store('assets/img/img_anuncios'),
            $request->img2->store('assets/img/img_anuncios'),
        ];

        if ($request->img3)
            $imgs[] = $request->img3->store('assets/img/img_anuncios');
        if ($request->img4)
            $imgs[] = $request->img4->store('assets/img/img_anuncios');
        if ($request->img5)
            $imgs[] = $request->img5->store('assets/img/img_anuncios');

        $anuncios = (new Anuncio)->fill($request->all());
        $anuncios->imgs = json_encode($imgs);
        $anuncios->user_id = Auth::user()->id;
        $anuncios->save();

        return redirect()->back()->withSuccess('Anúncio criado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        $comentarios = $anuncio->comentarios;
        return view('painel.anuncios.visualizar', compact('anuncio', 'comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncio $anuncio)
    {

        if ($anuncio->user_id != Auth::user()->id) {
            abort(403);
        }
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('painel.anuncios.editar', compact('anuncio', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anuncio $anuncio)
    {
        if ($anuncio->user_id != Auth::user()->id) {
            abort(403);
        }
        $request['preco'] = $this->converterMoedaParaNumero($request['preco']);
        $validate = [
            'titulo' => ['required', 'min:3', 'max:255', 'string'],
            'local_lat_lng' => ['required', 'max:255'],
            'estado' => ['required', 'max:255'],
            'cidade' => ['required', 'max:255'],
            'descricao_local' => ['required', 'min:3'],
            'descricao_servico' => ['required', 'min:3'],
            'preco' => ['required', 'numeric', 'min:30', 'max:99999999'],
            'tempo_resposta' => ['required', 'max:255'],
            'categoria_id' => ['required', 'exists:categorias,id']
        ];

        // Add validações se as imagens forem enviadas
        if ($request->img1)
            $validate['img1'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        if ($request->img2)
            $validate['img2'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        if ($request->img3)
            $validate['img3'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        if ($request->img4)
            $validate['img4'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        if ($request->img5)
            $validate['img5'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';

        $request->validate($validate, [], [
            'titulo' => 'título',
            'local_lat_lng' => 'local',
            'descricao_local' => 'descrição do local',
            'descricao_servico' => 'descrição do serviço',
            'preco' => 'preço',
            'tempo_resposta' => 'tempo de resposta',
            'categoria_id' => 'categoria',
        ]);

        $foo = json_decode($anuncio->imgs);
        $imgs= [];

        foreach ($foo as $key => $value) {
            $imgs[] = $value;
        }

        if ($request->img1) {
            if (isset($imgs[0]))
                if (strpos($imgs[0], 'img_anuncios') > 1)
                    $this->deletarIMG($imgs[0]);
            $imgs[0] = $request->img1->store('assets/img/img_anuncios');
        }
        if ($request->img2) {
            if (isset($imgs[1]))
                if (strpos($imgs[1], 'img_anuncios') > 1)
                    $this->deletarIMG($imgs[1]);
            $imgs[1] = $request->img2->store('assets/img/img_anuncios');
        }
        if ($request->img3) {
            if (isset($imgs[2]))
                if (strpos($imgs[2], 'img_anuncios') > 1)
                    $this->deletarIMG($imgs[2]);
            $imgs[2] = $request->img3->store('assets/img/img_anuncios');
        }
        if ($request->img4) {
            if (isset($imgs[3]))
                if (strpos($imgs[3], 'img_anuncios') > 1)
                    $this->deletarIMG($imgs[3]);
            $imgs[3] = $request->img4->store('assets/img/img_anuncios');
        }
        if ($request->img5) {
            if (isset($imgs[4]))
                if (strpos($imgs[4], 'img_anuncios') > 1)
                    $this->deletarIMG($imgs[4]);
            $imgs[4] = $request->img5->store('assets/img/img_anuncios');
        }

        $anuncio = $anuncio->fill($request->all());
        $anuncio->imgs = json_encode($imgs);
        $anuncio->save();

        return redirect()->back()->withSuccess('Anúncio editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        if ($anuncio->user_id != Auth::user()->id) {
            if (Auth::user()->conta != 'admin') {
                abort(403);
            }
        }
        $anuncio->delete();
        return redirect()->route('anuncios.index')->withSuccess('Anúncio removido.');
    }

    public function converterMoedaParaNumero($string = '0,00')
    {
        return str_replace(['.', ' ', 'R$', ','], ['', '', '', '.'], $string);
    }

    public function deletarIMG($path)
    {
        if (file_exists($path)) {
            return Storage::disk('local')->delete($path);
        }
        return false;
    }
}
