<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    use HasFactory;
    protected $table = 'autor';
    protected $primaryKey = 'id_autor';
    protected $fillable = ['nama_autor', 'genre', 'mangga'];
}
