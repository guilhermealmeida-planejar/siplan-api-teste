<?php

namespace Database\Seeders;

use App\Models\BancoFornecedor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        BancoFornecedor::factory(1)->create();

        \App\Models\Fornecedor::factory()
            ->has(\App\Models\Banco::factory()->count(3))
            ->create();

//        \App\Models\Fornecedor::factory(1)->create();
//
//        \App\Models\Banco::factory(1)->create();
    }
}
