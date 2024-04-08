<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name'=> 'Kpop',
        ]) ;
        Genre::create([
            'name'=> 'Pop',
        ]) ;
        Genre::create([
            'name'=> 'Classic',
        ]) ;
        Genre::create([
            'name'=> 'Jazz',
        ]) ;
        Genre::create([
            'name'=> 'Rap',
        ]) ;
    }
}
