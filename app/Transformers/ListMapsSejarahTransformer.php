<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Sejarah;

class ListMapsSejarahTransformer extends TransformerAbstract
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
             'id_sejarah'		=> $sejarah->sj_id,
             'nama_sejarah'		=> $sejarah->sj_nama, 
             'alamat_sejarah'	=> $sejarah->sj_alamat, 
             'lat_sejarah'      => $sejarah->sj_lat,
             'lng_sejarah'	    => $sejarah->sj_lng
         ];
     }
}
