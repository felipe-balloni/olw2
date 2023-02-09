<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->count(100)
            ->has(
                Seller::factory()
                    ->hasSales(30)
            )
            ->create();
    }
}
