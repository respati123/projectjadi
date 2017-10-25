<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sejarah;


class Gallery extends Model{

    protected $table = 'gallery_sejarah';

    protected $fillable = [

        'gs_id','sj_id','gs_gambar'
    ];

    public $timestamps = false;

    public function sejarah(){

      return $this->belongsTo(Sejarah::class, 'sj_id');
    }

}

?>
