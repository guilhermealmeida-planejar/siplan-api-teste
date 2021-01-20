<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Banco::with('fornecedor')->get();
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
            'agencia' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'erro',
                'data' => $validator->errors(),
            ]);
        }

        $banco = Banco::create([
            'nome' => $request->get('nome'),
            'agencia' => $request->get('nome'),
        ]);

        return response()->json([
            'status' => 'OK',
            'data' => $banco,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show(Banco $banco)
    {
        return $banco->load('fornecedor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Banco $banco)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'agencia' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'erro',
                'data' => $validator->errors(),
            ]);
        }

        $banco->update([
            'nome' => $request->get('nome'),
            'agencia' => $request->get('nome'),
        ]);

        return response()->json([
            'status' => 'OK'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Banco $banco)
    {
        $banco->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
