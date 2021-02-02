<?php

namespace App\Data;

use Spatie\DataTransferObject\DataTransferObject;
use Symfony\Component\HttpFoundation\Request;

class PessoaData extends DataTransferObject{
    public string$nome;
    public string$documento;
    public string$tipo_pessoa;
    public string$inscricao_estadual;

    public static function fromRequest(Request $request)
    {
        return new self([
            'nome' => $request->get('nome'),
            'documento' => $request->get('documento'),
            'tipo_pessoa' => $request->get('tipo_pessoa'),
            'inscricao_estadual' => $request->get('inscricao_estadual'),
        ]);
    }
}