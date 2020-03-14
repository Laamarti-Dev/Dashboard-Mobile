<?php

namespace App\Http\Controllers;
use App\Ads;
use App\Adsapp;
use App\Application;
use App\Console;
use DB;

use App\Quotation;
use Goutte\Client;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdsappsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {

        // Get All Console Developer
        $consoles = DB::table('console')->orderBy('console.id', 'DESC')->get();


        // Get All Console Developer
        $apps = DB::table('application')->get();

        // Get All Monetization
        $monetization = DB::table('ads')->get();

        // Get All Accounts Ads
        $accAds = DB::table('ads')->get();

        // Get All Application Ads
        if ($status == 'active')
            $AdsAcc = DB::table('application')
                ->join('adsapps', 'adsapps.id_apps', '=', 'application.id')
                ->join('ads','ads.id', '=', 'adsapps.id_ads')
                ->join('console','console.id', '=', 'application.id_console')
                ->select('console.email AS emailC','adsapps.id','adsapps.id','adsapps.status','application.name','application.icon','application.packageName','ads.country','ads.monetization','ads.email','ads.id_ads','adsapps.banner','adsapps.interstitial','adsapps.rewarded','adsapps.native')
                ->where('adsapps.status',1)
                ->orderBy('adsapps.id', 'DESC')->get();
        elseif($status == 'suspend')
            $AdsAcc = DB::table('application')
                ->join('adsapps', 'adsapps.id_apps', '=', 'application.id')
                ->join('ads','ads.id', '=', 'adsapps.id_ads')
                ->join('console','console.id', '=', 'application.id_console')
                ->select('console.email AS emailC','adsapps.id','adsapps.status','application.name','application.icon','application.packageName','ads.country','ads.monetization','ads.email','ads.id_ads','adsapps.banner','adsapps.interstitial','adsapps.rewarded','adsapps.native')
                ->where('adsapps.status',0)
                ->orderBy('adsapps.id', 'DESC')->get();
        else
            $AdsAcc = DB::table('application')
                ->join('adsapps', 'adsapps.id_apps', '=', 'application.id')
                ->join('ads','ads.id', '=', 'adsapps.id_ads')
                ->join('console','console.id', '=', 'application.id_console')
                ->select('console.email AS emailC','adsapps.id','adsapps.status','application.name','application.icon','application.packageName','ads.country','ads.monetization','ads.email','ads.id_ads','adsapps.banner','adsapps.interstitial','adsapps.rewarded','adsapps.native')
                ->orderBy('adsapps.id', 'DESC')->get();

        return view('ads',['cons'=>$consoles,'monetization'=>$monetization,'accAds'=>$accAds,'apps'=>$apps,'AdsAccounts'=>$AdsAcc]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $ads = new Adsapp();

            $ads->id = null;
            $ads->id_apps = $request->id_app;
            $ads->id_ads = $request->id_ads;
            $ads->banner = $request->input('banner');
            $ads->interstitial = $request->input('interstitial');
            $ads->rewarded = $request->input('rewarded');
            $ads->native = $request->input('native');
            $ads->jsonurl = '';
            $ads->status = $request->input('status');

            $ads->save();

            return redirect()->route('ads')->with('success','<strong>Congratulations </strong> you have been accepted.');

        } catch (\Exception $e) {
            // do task when error
            return redirect()->route('ads')
                ->with('errors','error !!');

        }


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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


            $ads = Adsapp::find($request->input('id'));

            $ads->id_apps = $request->id_app;
            $ads->id_ads = $request->id_ads;
            $ads->banner = $request->input('banner');
            $ads->interstitial = $request->input('interstitial');
            $ads->rewarded = $request->input('rewarded');
            $ads->native = $request->input('native');
            $ads->status = $request->input('status');

            $ads->save(); //persist the data

            return redirect()->route('ads');


    }

    /**
     * Remove the specified resource from storage.g
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Retrieve the Console
        $ads = Adsapp::find($request->input('id'));

        //delete
        $ads->delete();
        return redirect()->route('ads');
    }



    /**
     * Get Ads Application By Id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAdsApplicationById(Request $request )
    {
        $adsAcc = DB::table('adsapps')->where('id',$request->id)->orderBy('id', 'DESC')->get();

        echo json_encode($adsAcc);
    }


    /**
     * Get Ads Application By Id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAdsForApplication($packagename,$id)
    {


        $AdsAcc = DB::table('application')
            ->join('adsapps', 'adsapps.id_apps', '=', 'application.id')
            ->join('ads','ads.id', '=', 'adsapps.id_ads')
            ->where('application.packageName',$packagename)
            ->where('adsapps.id',$id)
            ->select('banner','interstitial','rewarded','native','ads.id_ads','ads.monetization','adsapps.status')
            ->orderBy('application.id', 'DESC')->get();
        echo json_encode($AdsAcc);
    }

}
