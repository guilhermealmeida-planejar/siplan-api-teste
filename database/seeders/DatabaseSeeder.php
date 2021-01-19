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
        \App\Models\Fornecedor::factory()->count(15)->create();

//        \App\Models\Fornecedor::factory()
//            ->has(\App\Models\Banco::factory()->count(3))
//            ->create();
    }
}
