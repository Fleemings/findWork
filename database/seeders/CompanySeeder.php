<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(50)
            ->has(Role::factory())
            ->create();
    }
}
