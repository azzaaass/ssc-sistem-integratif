<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Admin::factory(10)->create();

        // Type::create([
        //     'input1' => 'Keperluan Peminjaman',
        //     'type1' => '    ',
        //     'input2' => 'Keterangan Tambahan',
        //     'input3' => 'Hari Peminjaman',
        //     'input4' => '',
        //     'input5' => '',
        //     'input6' => '',
        //     'input7' => '',
        // ]);
        
        // Type::create([
        //     'input1' => '',
        //     'input2' => '',
        //     'input3' => '',
        //     'input4' => '',
        //     'input5' => '',
        //     'input6' => '',
        //     'input7' => '',
        // ]);

        // Type::create([
        //     'input1' => '',
        //     'input2' => '',
        //     'input3' => '',
        //     'input4' => '',
        //     'input5' => '',
        //     'input6' => '',
        //     'input7' => '',
        // ]);
    }
}
