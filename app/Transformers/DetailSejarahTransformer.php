<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Sejarah;

class DetailSejarahTransformer extends TransformerAbstract
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
			'nama_sejarah'		        => $sejarah->sj_nama,
			'alamat_sejarah'			=> $sejarah->sj_alamat,
			'deskripsi_sejarah'			=> $sejarah->sj_deskripsi,
			'latitude_sejarah'			=> $sejarah->sj_lat,
            'longitude_sejarah'			=> $sejarah->sj_lng,
			'youtube_sejarah'			=> $sejarah->sj_youtube,
			'gambar_sejarah'			=> url('/images/sejarah/'.$sejarah->sj_gambar) 
        ];
    }
}
