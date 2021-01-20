
## Gerando Registros

 - `php artisan migrate:refresh --seed`


## Rotas disponiveis

- `php artisan route:list`

## Campos para Cadastro/Edicao
### Banco

    {
	    "nome": "",
	    "agencia": ""
    }

### Fornecedor

    {
        "nome": "",
        "pis": "",
        "objetoSocial": "",
        "dataRegistro": "",
        "numeroRegistro": ""
    }

### Pessoa

    {
        'nome' => '',
        'documento' => '',
        'tipo_pessoa' => '',
        'inscricao_estadual' => '',
    }

## breadcrumb

- **Fornecedor**
    - Formulario
        - Create
        - Edit
    - index
    - Detalhes (?)

- **Banco**
    - Formulario
        - Create
        - Edit
    - index
    - Detalhes (?)
