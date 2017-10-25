<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Sejarah;

class RandomSejarahTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
     public function transform(Sejarah $sejarah)
     {
         return [
             //
             'nama_slider'		=> $sejarah->sj_nama,
             'gambar_slider'    => url('/images/sejarah'.$sejarah->sj_gambar)
         ];
     }
}
