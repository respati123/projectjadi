<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Histori;
use Auth;


trait HistoryAdmin{

    public function HistoryUsers($users,$object,$no,$table){

        $histori = new Histori();
        
        switch($no){

            case "edit":
                $histori->us_id = $users['id'];
                $histori->hp_deskripsi = $users['nama'].", Telah mengubah data ".$table." dengan nama data".$object;
                $histori->save();
                break;
            case "tambah":
                $histori->us_id = $users['id'];
                $histori->hp_deskripsi = $users['nama'].", Telah menambah data ".$table." dengan nama data".$object;
                $histori->save();
                break;
            case "kurang":
                $histori->us_id = $users['id'];
                $histori->hp_deskripsi = $users['nama'].", Telah mengurangi data ".$table." dengan nama data".$object;
                $histori->save();
                break;

                

        }

        
    }

    protected function getUsers(){
        
                
                
        $user = Auth::user();

        return $data =  [

            'id'    => $user->id,
            'nama'  => $user->name
        ];
        
    }

}
?>