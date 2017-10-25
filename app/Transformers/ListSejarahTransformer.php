<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Sejarah;

class ListSejarahTransformer extends TransformerAbstract
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
			'nama_kategori'     => $sejarah->kategori->ks_nama,
			'alamat_sejarah'	=> $sejarah->sj_alamat
        ];
    }
}
