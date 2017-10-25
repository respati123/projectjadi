<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\KategoriSejarah;
use App\Gallery;

class Sejarah extends Model
{
    //
    protected $table = 'sejarah';
    protected $primaryKey = 'sj_id';
    protected $foreignKey = 'ks_id';

    protected $fillable = [
        'sj_id','ks_id','sj_nama','sj_alamat','sj_deskripsi','sj_lat','sj_lng','sj_youtube','sj_gambar'
    ];

    public function kategori(){
        return $this->belongsTo(KategoriSejarah::class, 'ks_id');
    }

    public $timestamps = false;

    public static function count(){

        $query = Sejarah::all();
        return count($query);
    }

    public function gallery(){
        return $this->hasMany(Gallery::class, 'sj_id');
    }


}
