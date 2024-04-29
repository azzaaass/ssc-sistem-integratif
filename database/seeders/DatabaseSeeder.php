<?php

namespace Database\Seeders;

use App\Models\Pic;
use App\Models\TipeSurat;
use App\Models\Type;
use App\Models\User;
use App\Models\Admin;
use App\Models\Ruangan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nim" => "1202210",
            "name" => "azza",
            "prodi" => "Teknologi informasi",
            "email" => "azza@gmail.com",
            "username" => "azza",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
        ]);

        User::create([
            "nim" => "1202211",
            "name" => "sonia",
            "prodi" => "Teknologi informasi",
            "email" => "sonia@gmail.com",
            "username" => "sonia",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
        ]);

        Admin::create([
            "name" => "Fitri",
            "email" => "fitri@gmail.com",
            "username" => "fitri",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "1",
            "shift" => "1"
        ]);

        Admin::create([
            "name" => "Ongky",
            "email" => "ongky@gmail.com",
            "username" => "ongky",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "2",
            "shift" => "1"
        ]);

        Admin::create([
            "name" => "Raha",
            "email" => "ongky@gmail.com",
            "username" => "ongky",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "2",
            "shift" => "1"
        ]);

        Admin::create([
            "name" => "Okta",
            "email" => "okta@gmail.com",
            "username" => "okta",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "2",
            "shift" => "1"
        ]);

        // Ruangan -> untuk memilih ruangan saat user akan memilih

        Ruangan::create([
            "name" => "Lab Jaringan Komputer",
            "kode_ruangan" => "1.25"
        ]);

        Ruangan::create([
            "name" => "Lab Dasar Pemrograman",
            "kode_ruangan" => "1.26"
        ]);

        Ruangan::create([
            "name" => "Lab Mechine Learning",
            "kode_ruangan" => "1.27"
        ]);

        Ruangan::create([
            "name" => "Lab Start-Up",
            "kode_ruangan" => "1.28"
        ]);

        // PIC -> untuk memilih PIC yang memegang ruangan x (dipilih oleh admin)

        Pic::create([
            "id_admin" => "2",
            "deskripsi" => "PIC Lab Jaringan Komputer",
            "id_ruangan" => "1",
            "tingkat" => "1",
            "id_next_pic" => "5"
        ]);

        Pic::create([
            "id_admin" => "2",
            "deskripsi" => "PIC Lab Dasar Pemrograman",
            "id_ruangan" => "2",
            "tingkat" => "1",
            "id_next_pic" => "5"
        ]);

        Pic::create([
            "id_admin" => "3",
            "deskripsi" => "PIC Lab Mechine Learning",
            "id_ruangan" => "3",
            "tingkat" => "1",
            "id_next_pic" => "5"
        ]);

        Pic::create([
            "id_admin" => "3",
            "deskripsi" => "PIC Lab Start-Up",
            "id_ruangan" => "4",
            "tingkat" => "1",
            "id_next_pic" => "5"
        ]);

        // PIC tingkat 2
        Pic::create([
            "id_admin" => "4",
            "deskripsi" => "PIC Lab FTIB",
            "tingkat" => "2",
            "id_next_pic" => "5"
        ]);

        TipeSurat::create([
            "tipe_surat" => "Peminjaman Ruangan"
        ]);
        // User::factory(10)->create();
        // Admin::factory(10)->create();

    }
}
