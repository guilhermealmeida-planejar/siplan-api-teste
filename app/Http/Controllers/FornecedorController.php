<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Fornecedor::with(['banco', 'pessoa'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'pis' => 'required',
            'objetoSocial' => 'required',
            'dataRegistro' => 'required|date',
            'numeroRegistro' => 'required|integer',
            'pessoa_id' => 'required',
            'banco_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'erro',
                'data' => $validator->errors(),
            ]);
        }

        $banco = Fornecedor::create([
            'nome' => $request->get('nome'),
            'pis' => $request->get('pis'),
            'objetoSocial' => $request->get('objetoSocial'),
            'dataRegistro' => $request->get('dataRegistro'),
            'numeroRegistro' => $request->get('numeroRegistro'),
            'pessoa_id' => $request->get('pessoa_id'),
            'banco_id' => $request->get('banco_id'),
        ]);

        return response()->json([
            'status' => 'OK',
            'data' => $banco,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        return $fornecedor->load(['banco', 'pessoa']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'pis' => 'required',
            'objetoSocial' => 'required',
            'dataRegistro' => 'required|date',
            'numeroRegistro' => 'required|integer',
            'pessoa_id' => 'required',
            'banco_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'erro',
                'data' => $validator->errors(),
            ]);
        }

        $fornecedor->update([
            'nome' => $request->get('nome'),
            'pis' => $request->get('pis'),
            'objetoSocial' => $request->get('objetoSocial'),
            'dataRegistro' => $request->get('dataRegistro'),
            'numeroRegistro' => $request->get('numeroRegistro'),
            'pessoa_id' => $request->get('pessoa_id'),
            'banco_id' => $request->get('banco_id'),
        ]);

        return response()->json([
            'status' => 'OK'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
