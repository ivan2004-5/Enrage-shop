<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Ремикс',
                'fone_img' => 'remix.png',
                'price' => 5000.00,
            ],
            [
                'title' => 'Реверб',
                'fone_img' => 'reverb.png',
                'price' => 2000.00,
            ],
            [
                'title' => 'Реворк',
                'fone_img' => 'rework.png',
                'price' => 3000.00,
            ],
            [
                'title' => 'Кавер',
                'fone_img' => 'cover.png',
                'price' => 10000.00,
            ],
            [
                'title' => 'Ремейк',
                'fone_img' => 'remake.png',
                'price' => 8000.00,
            ],
            [
                'title' => 'Слоу',
                'fone_img' => 'slowed.png',
                'price' => 3000.00,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }
    }
}

