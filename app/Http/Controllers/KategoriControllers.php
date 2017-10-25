<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriSejarah;
use Session;
use App\Traits\HistoryAdmin;
use Auth;


class KategoriControllers extends Controller
{
    
    use HistoryAdmin;

    protected  $table = 'kategori';

    protected  $exec  = null;


    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {

        $data = KategoriSejarah::orderBy('ks_id','desc')
                                ->get();
        return view('kategori.show_data_kategori')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        return view('kategori.kat_input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validate($request,[

            'namakategori'  => 'required|max:50',
            'images'        => 'required|image|mimes:png,jpeg,jpg|max:2048'

        ]);

       $file = $request->file('images');
       $data = [

            'ks_nama'   => $request->namakategori,
            'ks_gambar' => $file->getClientOriginalName(),
            'ks_jumlah' => 0
       ];
       
       $input = KategoriSejarah::create($data);

       $destinationPath = public_path('/images/kategori');
       $upload = $file->move($destinationPath, $file->getClientOriginalName());

       $this->HistoryUsers($this->getUsers(), $request->namakategori,$this->exec = "tambah",$this->table);

       return redirect()->back()->with('success','Successfully')->withInput();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $input = KategoriSejarah::findOrFail($id);

        return View('kategori.kat_edit')->with('kategori',$input);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        $kategori = new KategoriSejarah();
        if(!$request->hasFile('images')){

           $this->validate($request,[

                'namakategori' => 'required|max:50'
            ]);

            $data = [

                'ks_nama' => $request->namakategori
            ];

            $kategori::find($id)->update($data);

            $this->HistoryUsers($this->getUsers(), $request->namakategori,$this->exec = "edit",$this->table);
            
            Session::flash('success', 'Updated Successfully!!');

            return redirect()->back();

        } 

        $this->validate($request, [

            'namakategori'  => 'required|max:50',
            'images'        => 'required|image|mimes:png,jpeg,jpg|max:2048'

        ]);

        $file = $request->file('images');
        $data = [

            'ks_nama'   => $request->namakategori,
            'ks_gambar' => $file->getClientOriginalName(),
        ];

        $kategori::find($id)->update($data);

        $destinationPath = public_path('/images/kategori');
        
        $upload = $file->move($destinationPath, $file->getClientOriginalName());

        $this->HistoryUsers($this->getUsers(), $request->namakategori,$this->exec = "edit",$this->table);

        
        Session::flash('success', 'Updated Successfully!!');

        return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $kategori = KategoriSejarah::find($id);
        $this->HistoryUsers($this->getUsers(), $kategori->ks_nama,$this->exec = "kurang",$this->table);
        $kategori->delete();
        
        // redirect
        Session::flash('message', 'Successfully deleted!');
        return redirect()->back();
    }

   
}
