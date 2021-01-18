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
        \App\Models\Banco::factory(60)
            ->has(\App\Models\Fornecedor::factory()->count(10))
            ->create();
    }
}
