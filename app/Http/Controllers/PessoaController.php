<?php

namespace App\Http\Controllers;

use App\Http\DTO\PessoaData;
use App\Http\Requests\PessoaRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pessoa::with('fornecedor')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PessoaRequest $request, Pessoa $pessoa)
    {

        $validated = PessoaData::fromRequest($request);

        $pessoa->nome = $validated->nome;
        $pessoa->documento = $validated->documento;
        $pessoa->tipo_pessoa = $validated->tipo_pessoa;
        $pessoa->inscricao_estadual = $validated->inscricao_estadual;

        $pessoa->save();

        return response()->json([
            'status' => 'OK',
            'data' => $pessoa,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        return $pessoa->load('fornecedor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'documento' => 'required',
            'tipo_pessoa' => 'required',
            'inscricao_estadual' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'erro',
                'data' => $validator->errors(),
            ]);
        }

        $pessoa->update([
            'nome' => $request->get('nome'),
            'documento' => $request->get('documento'),
            'tipo_pessoa' => $request->get('tipo_pessoa'),
            'inscricao_estadual' => $request->get('inscricao_estadual'),
        ]);

        return response()->json([
            'status' => 'OK'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
