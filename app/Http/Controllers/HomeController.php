<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use App\Quotation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // count application active Ads
        $apps_with_ads = DB::table('application')
            ->where('ads_status',1)
            ->count();

        // count Application Without Ads
        $apps_without_ads = DB::table('application')
            ->where('ads_status',0)
            ->count();

        // Data Statistics
        $data = array(
            "totale" => DB::table('application')->count(),
            "active" => DB::table('application')->where('status',1)->count(),
            "suspend" => DB::table('application')->where('status',0)->count(),
            "apps_with_ads" => $apps_with_ads,
            "apps_without_ads" => $apps_without_ads
        );



        // check Get var
        $application = DB::table('application')->where('status',1)->orderBy('id', 'DESC')->get();


        return view('home',['Statistics'=>$data,'apps'=>$application]);

    }
}
