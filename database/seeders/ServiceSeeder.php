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
                'desc' => 'Описание ремикса...',
                'price' => 5000.00,
            ],
            [
                'title' => 'Реверб',
                'fone_img' => 'reverb.png',
                'desc' => 'Описание реверба...',
                'price' => 2000.00,
            ],
            [
                'title' => 'Реворк',
                'fone_img' => 'rework.png',
                'desc' => 'Описание реворка...',
                'price' => 3000.00,
            ],
            [
                'title' => 'Кавер',
                'fone_img' => 'cover.png',
                'desc' => 'Описание кавера...',
                'price' => 10000.00,
            ],
            [
                'title' => 'Ремейк',
                'fone_img' => 'remake.png',
                'desc' => 'Описание ремейка...',
                'price' => 8000.00,
            ],
            [
                'title' => 'Слоу',
                'fone_img' => 'slowed.png',
                'desc' => 'Описание слоу...',
                'price' => 3000.00,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }
    }
}

