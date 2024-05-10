<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server;
use DB;
use Database\Factories\ServerFactory;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            'name' => '🇷🇺 Москва',
            'link' => 'Moscow',
        ]);
        DB::table('locations')->insert([
            'name' => '🇩🇪 Фалькенштайн',
            'link' => 'Falkenstein',
        ]);
        DB::table('locations')->insert([
            'name' => '🇫🇮 Хельсинки',
            'link' => 'Helsinki',
        ]);

        Server::factory()->count(50)->create();
    }
}
