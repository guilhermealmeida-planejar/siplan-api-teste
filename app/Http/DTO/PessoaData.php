<?php

namespace App\Http\DTO;

use Illuminate\Http\Request;

class PessoaData
{
    public string $nome;
    public string $documento;
    public string $tipo_pessoa;
    public string $inscricao_estadual;

    public static function fromRequest(Request $request)
    {
        $dto = new self();

        $dto->nome = $request->input('nome');
        $dto->documento = $request->input('documento');
        $dto->tipo_pessoa = $request->input('tipo_pessoa');
        $dto->inscricao_estadual = $request->input('inscricao_estadual');

        return $dto;
    }
}