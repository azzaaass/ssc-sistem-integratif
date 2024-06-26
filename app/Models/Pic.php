<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function admin() {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
