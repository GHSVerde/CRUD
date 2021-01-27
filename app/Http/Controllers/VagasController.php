<?php

namespace App\Http\Controllers;

use App\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VagasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $breadcrumb = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Vagas', 'url' => '']
            ]);

        $vagas = Vaga::select('id', 'empresa', 'vaga', 'situacao', 'url_referencia')->get();

        return view('admin.vagas.index', compact('vagas', 'breadcrumb'));
    }

    /**
     * Display a listing of the deleted resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function bin()
    {

        $breadcrumb = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Vagas', 'url' => route('vaga.index')],
            ['titulo' => 'Lixeira', 'url' => ''],
            ]);

        $vagas = Vaga::select('id', 'empresa', 'vaga', 'situacao', 'url_referencia')->onlyTrashed()->get();

        return view('admin.vagas.bin', compact('vagas', 'breadcrumb'));
    }

    /**
     * Restaura a vaga para o normal
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $vaga = Vaga::onlyTrashed()->find($id);
        $vaga->restore();
        return redirect()->route('vaga.index')->with('restaurado', 'Vaga '. $vaga->id . ' restaurada com sucesso');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Vagas', 'url' => route('vaga.index')],
            ['titulo' => 'Criar Vaga', 'url' => '']
        ]);
        return view('admin.vagas.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $validacao = Validator::make($data, [
            'email'             => 'required|email',
            'situacao'          => 'required|string',
            'vaga'              => 'required|string',
            'empresa'           => 'required|string',
            'url_referencia'    => 'url',
        ]);

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        $vagaCriada = Vaga::create($data);
        return redirect()->route('vaga.show', $vagaCriada->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breadcrumb = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Vagas', 'url' => route('vaga.index')],
            ['titulo' => 'Vaga ' . $id, 'url' => '']
        ]);
        $vaga = Vaga::find($id);

        return view('admin.vagas.show', compact('vaga', 'breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaga = Vaga::find($id);
        
        $breadcrumb = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Vagas', 'url' => route('vaga.index')],
            ['titulo' => 'Editar Vaga ' . $id, 'url' => '']
        ]);


        return view('admin.vagas.edit', compact('vaga', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validacao = Validator::make($data, [
            'email'             => 'required|email',
            'situacao'          => 'required|string',
            'vaga'              => 'required|string',
            'empresa'           => 'required|string',
            'url_referencia'    => 'url',
        ]);

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Vaga::find($id)->update($data);
        return redirect()->route('vaga.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaga = Vaga::find($id);
        $vaga->delete();
        return redirect()->route('vaga.index')->with('deletado', 'Vaga '. $vaga->id . ' deletada com sucesso');
    }

    public function permanentDestroy($id) {
        $vaga = Vaga::onlyTrashed()->find($id);

        $vaga->forceDelete();
        return redirect()->route('vaga.bin')->with('deletado', 'Vaga ' . $vaga->id . ' permanentemente deletada');
    }
}
