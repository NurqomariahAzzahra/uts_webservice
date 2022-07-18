<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hanime extends Model
{
    use HasFactory;
    protected $table = 'judul';
    protected $primaryKey = 'id';
    protected $fillable = ['judul_anime', 'jumlah_episode', 'season','id_autor','nama_autor','studio'];
    static function getAutor(){
        $return=DB::table('judul')
        ->join('autor','judul.id_autor','=','autor.id_autor');
        return $return;
    }
}
