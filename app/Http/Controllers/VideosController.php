<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Services\EncriptacionService;

class VideosController extends Controller
{
    //Para utilizar Servicios
    private EncriptacionService $encriptacionService;

    //Ejemplo de alcance de un middleware
    public function __construct(EncriptacionService $encriptacionService) // -> Inyeccion de dependecias, se utiliza Service Container esto lo veremos mas adelante
    {
        $this->middleware('modifica.mayuscula')->only(['store', 'update']);

        //Utilizando inyeccion de dependencia, gracias a que utilizamos esta forma inyectar dependencias, sabemos que la podemos utilizar en todo el controlador 
        $this->encriptacionService = $encriptacionService;

        //Forma de utilizar Servicios
        /* $this->encriptacionService = new EncriptacionService(); */
    }

    public function index(): View
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function create(): View
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => ['required'],
            'plataforma' => ['required']
        ]);

        Video::create($request->all());
        return redirect()->route('videos.create')->with('success', 'Video Guardado');
    }

    public function show(Video $video): View
    {
        return view('videos.show', compact('video'));
    }

    public function edit(Video $video): View
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'video' => ['required'],
            'plataforma' => ['required']
        ]);

        $video->update($request->all());
        return redirect()->route('videos.index')->with('success', 'Video actualizado');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('danger', 'Video eliminado');
    }

    public function otraAccion()
    {
        $cadenaRamdom = $this->encriptacionService->generarCadenaAleatoria();
        return "HASH: {$cadenaRamdom}";
    }

    public function hash()
    {
        //Demostracion de que la inyeccion de dependencia esta disponible en todo el Controlador
        $cadenaRamdom = $this->encriptacionService->generarCadenaAleatoria();
        return "Otro HASH: {$cadenaRamdom}";
    }
}
