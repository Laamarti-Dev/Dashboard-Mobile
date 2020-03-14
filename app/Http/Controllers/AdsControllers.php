<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;
use App\Quotation;


class AdsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {

        // Data Statistics
        $data = array(
            "totale" => DB::table('ads')->count(),
            "active" => DB::table('ads')->where('status',1)->count(),
            "suspend" => DB::table('ads')->where('status',0)->count(),
        );



        // check Get var
        if ($status == 'active')
            $adsAcc = DB::table('ads')->where('status',1)->orderBy('id', 'DESC')->paginate(6);
        elseif ($status == 'suspend')
            $adsAcc = DB::table('ads')->where('status',0)->orderBy('id', 'DESC')->paginate(6);
        else
            $adsAcc = DB::table('ads')->orderBy('id', 'DESC')->paginate(6);


        return view('adsAccount',['Statistics'=>$data,'AccAds'=>$adsAcc]);
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
        $data = array();

        $email          = DB::table('ads')->where('email',$request->input('email_ads_add'))->count();
        $email_Recovery = DB::table('ads')->where('email_Recovery',$request->input('email_ads_add_recovery'))->count();
        $id_ads         = DB::table('ads')->where('id_ads',$request->input('id_ads_add'))->count();
        $phone          = DB::table('ads')->where('phone',$request->input('phone_ads_add'))->count();


        if($email > 0)
            array_push($data,'<b>Email </b> already exists.');
        if($email_Recovery > 0)
            array_push($data,'<b>Email Recovery </b> already exists.');
        if($id_ads > 0)
            array_push($data,'<b>ID</b> Ads already exists.');
        if($phone > 0)
            array_push($data,'<b>Phone </b> phone already exists.');

        try {
            $adsAcc = new Ads();

            $adsAcc->id = null;
            $adsAcc->email = $request->input('email_ads_add');
            $adsAcc->email_Recovery = $request->input('email_ads_add_recovery');
            $adsAcc->password = $request->input('password_ads_add');
            $adsAcc->country = $request->input('country_ads_add');
            $adsAcc->state = $request->input('state_ads_add');
            $adsAcc->city = $request->input('city_ads_add');
            $adsAcc->ip = $request->input('ip_ads_add');
            $adsAcc->latitude = $request->input('latitude_ads_add');
            $adsAcc->longitude = $request->input('longitude_ads_add');
            $adsAcc->adress = $request->input('adress_ads_add');
            $adsAcc->id_ads = $request->input('id_ads_add');
            $adsAcc->phone = $request->input('phone_ads_add');
            $adsAcc->monetization = $request->input('Platforms_ads_add');
            $adsAcc->pinCode = $request->input('codePin_ads_add');
            $adsAcc->status = 1;
            $adsAcc->save(); //persist the data

            return redirect()->route('adsAccount.store')->with('success','<strong>Congratulations </strong> you have been accepted.');

        } catch (\Exception $e) {
            // do task when error
            return Redirect::back()->withInput(Input::all())
                ->with('errors',$data);

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
        $data = array();

        $acc =  DB::table('ads')->where('id',$request->input('id'))->get();


        if ($acc[0]->email_Recovery != $request->input('email_ads_edit_recovery')){
            $email_Recovery = DB::table('ads')->where('email_Recovery',$request->input('email_ads_edit_recovery'))->count();
            if($email_Recovery > 0)
                array_push($data,'<b>Email Recovery</b> already exists.');
        }


        if ($acc[0]->phone != $request->input('phone_ads_edit')){
            $phone = DB::table('ads')->where('phone',$request->input('phone_ads_edit'))->count();
            if($phone > 0)
                array_push($data,'<b>Phone </b> already exists.');
        }


        try {

            $adsAcc = Ads::find($request->input('id'));
            $adsAcc->email_Recovery = $request->input('email_ads_edit_recovery');
            $adsAcc->password = $request->input('password_ads_edit');
            $adsAcc->phone = $request->input('phone_ads_edit');
            $adsAcc->status = $request->input('status');
            $adsAcc->pinCode = $request->input('id_ads_edit');

            $adsAcc->save(); //persist the data

            return redirect()->route('adsAccount.update')
                ->withInput(Input::all())->with('successedit','<strong>Congratulations </strong> you have been accepted.');

        } catch (\Exception $e) {
            // do task when error
            return Redirect::back()->withInput(Input::all())
                ->with('errorsedit',$data);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Retrieve the Ads Account
        $adsAccount = Ads::find($request->input('id'));

        //delete
        $adsAccount->delete();

        return redirect()->route('adsAccount');
    }


    /**
     * Get the Ads Accounts By Id
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function getAdsAccounteById(Request $request)
    {
        $adsAcc = DB::table('ads')->where('id',$request->id)->orderBy('id', 'DESC')->get();

        echo json_encode($adsAcc);
    }

    /**
     * Get the Get Application has ads  By Accounts
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function allApplicationHasAdsInAcc(Request $request)
    {
        // Get Ads For My application
        $ApplicationAds = DB::table('adsapps')
            ->join('application','adsapps.id_apps', '=', 'application.id')
            ->select('adsapps.status','application.icon','application.name','application.installs','application.packageName')
            ->where('adsapps.id_ads',$request->id)
            ->get();


        echo json_encode($ApplicationAds);
    }
}
