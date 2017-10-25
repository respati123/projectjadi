<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Gallery;


/**
 *
 */
class ImagesGalleryTransformer extends TransformerAbstract
{


  public function transform(Gallery $gallery){


    return [

      'data' => $gallery->sejarah->sj_nama
    ];
  }


}




 ?>
