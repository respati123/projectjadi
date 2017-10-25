<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriSejarah;
use App\Sejarah;
use Session;
use Auth;
use App\Histori;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * 
     */

  
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::select("
        
            SELECT  h.hp_deskripsi, h.created_at, (

                SELECT u.name
                from users as u
                WHERE u.id = h.us_id 
            ) AS 'name'

            FROM histori_pengguna AS h
            Order By created_at Desc
        ");

        $data = [

            'sejarah'   => Sejarah::count(),
            'kategori'  => KategoriSejarah::count(),
            'table'      => $query

        ];


        return view('partials.dashboard')->with('data', $data);
    }
}
