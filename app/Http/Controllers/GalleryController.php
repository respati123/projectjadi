<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UploadRequest;
use App\Traits\HistoryAdmin;
use App\Gallery;
use Session;
use DB;

class GalleryController extends Controller{


    protected $table = 'Gallery';
    
    protected $exec  = '';

    use HistoryAdmin;

    public function createGallery($id){

        $data = Gallery::where('sj_id','=',$id)->get();
        $parameter = $id;

        return view ('gallery/gal_input')->with(['parameter'=>$parameter,'data'=>$data]);
    }


    public function InsertGallery(UploadRequest $request, $id){
        
        

        foreach($request->images as $photos){

            $filename = $photos->getClientOriginalName();
            Gallery::create([

                'sj_id'     => $id,
                'gs_gambar' => $filename

            ]);
        }

        $destination = public_path('images/gallery');

        foreach($request->file('images') as $file){

            $uplaod = $file->move($destination, $file->getClientOriginalName());
        }

        Session::flash('success', 'Upload Successfully!!');
        
        
        return redirect()->back();
    }

    public function deleteGallery($id){
        
        $gallery = new Gallery();

        $this->HistoryUsers($this->getUsers(),$gallery->gs_gambar,$exec = "kurang", $this->table);
        
        DB::table('gallery_sejarah')
                ->where('gs_id','=',$id)->delete();

        return redirect()->back();

    }  
}

?>