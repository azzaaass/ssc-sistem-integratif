<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_admin',
        'estimasi',
        'type',
        'input1',
        'input2',
        'input3',
        'input4',
        'input5',
        'input6',
        'input7',
    ];

    protected $guarded = ['id'];
}
