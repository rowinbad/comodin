<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'tipo' => 'Administrador',
        ]);
        DB::table('roles')->insert([
            'tipo' => 'Usuario',
        ]);
        User::factory(10)->create();
        Book::factory(10)->create();
        BookUser::factory(10)->create();
    }
}
