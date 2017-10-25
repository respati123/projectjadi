<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\KategoriSejarah;

class KategoriSejarahTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(KategoriSejarah $kategori)
    {
        return [
            //
            'id_kategori'		 => $kategori->ks_id,
			'nama_kategori'      => $kategori->ks_nama,
			'gambar_kategori'    => url('/images/kategori/'.$kategori->ks_gambar),
			'jumlah_kategori'    => $kategori->ks_jumlah
        ];
    }
}
