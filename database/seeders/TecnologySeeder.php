<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['html', 'css', 'javascreipt', 'vuejs', 'php', 'laravel', 'sql'];

        foreach ($technologies as $tech) {
            $newtech = new Tecnology();
            $newtech->name = $tech;
            $newtech->slug = Str::slug($newtech->name, '-');
            $newtech->save();
        }
    }
}
