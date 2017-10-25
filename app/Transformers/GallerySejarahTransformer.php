<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Gallery;


/**
 *
 */
class GallerySejarahTransformer extends TransformerAbstract
{


  public function transform(Gallery $gallery){

    return [

      'id_sejarah'  => $gallery->sejarah->sj_nama,
      'galeri_foto' => url('/images/gallery/'.$gallery->gs_gambar)

    ];
  }


}




 ?>
