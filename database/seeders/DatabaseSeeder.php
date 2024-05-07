<?php

namespace Database\Seeders;

use App\Models\Alat;
use App\Models\Pic;
use App\Models\TipeSurat;
use App\Models\Type;
use App\Models\User;
use App\Models\Admin;
use App\Models\Ruangan;
use App\Models\StatusSuratStatus;
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
            "email" => "raha@gmail.com",
            "username" => "raha",
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

        Admin::create([
            "name" => "Jingga",
            "email" => "jingga@gmail.com",
            "username" => "jingga",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "2",
            "shift" => "1"
        ]);

        Admin::create([
            "name" => "Agus",
            "email" => "agus@gmail.com",
            "username" => "agus",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "2",
            "shift" => "1"
        ]);

        Admin::create([
            "name" => "Toton",
            "email" => "toton@gmail.com",
            "username" => "toton",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "2",
            "shift" => "1"
        ]);


        Admin::create([
            "name" => "Siti",
            "email" => "siti@gmail.com",
            "username" => "siti",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "2",
            "shift" => "1"
        ]);

        Admin::create([
            "name" => "Sinta",
            "email" => "sinta@gmail.com",
            "username" => "sinta",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "2",
            "shift" => "1"
        ]);

        Admin::create([
            "name" => "Agung",
            "email" => "agung@gmail.com",
            "username" => "agung",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "2",
            "shift" => "1"
        ]);


        TipeSurat::create([
            "tipe_surat" => "Peminjaman Ruangan"
        ]);

        TipeSurat::create([
            "tipe_surat" => "Peminjaman Alat"
        ]);


        // PIC -> untuk memilih PIC yang memegang ruangan x (dipilih oleh admin)

        Pic::create([
            "id_admin" => "2",
            "type" => "1",
            "deskripsi" => "PIC Lab Jaringan Komputer",
            "tingkat" => "1",
            "id_next_pic" => "5"
        ]);

        Pic::create([
            "id_admin" => "2",
            "type" => "1",
            "deskripsi" => "PIC Lab Dasar Pemrograman",
            "tingkat" => "1",
            "id_next_pic" => "5"
        ]);

        Pic::create([
            "id_admin" => "3",
            "type" => "1",
            "deskripsi" => "PIC Lab Mechine Learning",
            "tingkat" => "1",
            "id_next_pic" => "5"
        ]);

        Pic::create([
            "id_admin" => "3",
            "type" => "1",
            "deskripsi" => "PIC Lab Start-Up",
            "tingkat" => "1",
            "id_next_pic" => "5"
        ]);

        Pic::create([
            "id_admin" => "4",
            "type" => "1",
            "deskripsi" => "PIC Lab FTIB",
            "tingkat" => "2",
            "id_next_pic" => "5"
        ]);

        Pic::create([
            "id_admin" => "5",
            "type" => "1",
            "deskripsi" => "PIC Perpustakaan",
            "tingkat" => "1",
            "id_next_pic" => "9"
        ]);

        Pic::create([
            "id_admin" => "6",
            "type" => "1",
            "deskripsi" => "PIC Aula",
            "tingkat" => "1",
            "id_next_pic" => "9"
        ]);

        Pic::create([
            "id_admin" => "6",
            "type" => "1",
            "deskripsi" => "PIC Gazebo",
            "tingkat" => "1",
            "id_next_pic" => "9"
        ]);

        Pic::create([
            "id_admin" => "7",
            "type" => "1",
            "deskripsi" => "PIC Ruangan Acara",
            "tingkat" => "2",
            "id_next_pic" => "9"
        ]);

        Pic::create([
            "id_admin" => "8",
            "type" => "2",
            "deskripsi" => "PIC Walkie Talkie",
            "tingkat" => "1",
            "id_next_pic" => "16"
        ]);

        Pic::create([
            "id_admin" => "8",
            "type" => "2",
            "deskripsi" => "PIC Speaker Outdoor",
            "tingkat" => "1",
            "id_next_pic" => "16"
        ]);

        Pic::create([
            "id_admin" => "8",
            "type" => "2",
            "deskripsi" => "PIC Speaker Indoor",
            "tingkat" => "1",
            "id_next_pic" => "16"
        ]);

        Pic::create([
            "id_admin" => "8",
            "type" => "2",
            "deskripsi" => "PIC TOA",
            "tingkat" => "1",
            "id_next_pic" => "16"
        ]);

        Pic::create([
            "id_admin" => "9",
            "type" => "2",
            "deskripsi" => "PIC Kursi",
            "tingkat" => "1",
            "id_next_pic" => "16"
        ]);

        Pic::create([
            "id_admin" => "9",
            "type" => "2",
            "deskripsi" => "PIC Meja",
            "tingkat" => "1",
            "id_next_pic" => "16"
        ]);

        Pic::create([
            "id_admin" => "10",
            "type" => "2",
            "deskripsi" => "PIC Alat",
            "tingkat" => "2",
            "id_next_pic" => "16"
        ]);


        // Ruangan -> untuk memilih ruangan saat user akan memilih

        Ruangan::create([
            "name" => "Lab Jaringan Komputer",
            "kode_ruangan" => "1.25",
        ]);

        Ruangan::create([
            "name" => "Lab Dasar Pemrograman",
            "kode_ruangan" => "1.26",
        ]);

        Ruangan::create([
            "name" => "Lab Mechine Learning",
            "kode_ruangan" => "1.27",
        ]);

        Ruangan::create([
            "name" => "Lab Start-Up",
            "kode_ruangan" => "1.28",
        ]);

        Ruangan::create([
            "name" => "Perpustakaan",
            "kode_ruangan" => "perpustakaan",
        ]);

        Ruangan::create([
            "name" => "Aula",
            "kode_ruangan" => "aula",
        ]);

        Ruangan::create([
            "name" => "Gazebo",
            "kode_ruangan" => "gazebo",
        ]);

        Alat::create([
            "name" => "Walkie talkie",
            "kode_alat" => "walkie-talkie",
        ]);

        Alat::create([
            "name" => "Speaker outdoor",
            "kode_alat" => "speaker-outdoor",
        ]);

        Alat::create([
            "name" => "Speaker indoor",
            "kode_alat" => "speaker-indoor",
        ]);

        Alat::create([
            "name" => "TOA",
            "kode_alat" => "toa",
        ]);
        Alat::create([
            "name" => "Kursi",
            "kode_alat" => "kursi",
        ]);
        Alat::create([
            "name" => "Meja",
            "kode_alat" => "meja",
        ]);
    }
}
