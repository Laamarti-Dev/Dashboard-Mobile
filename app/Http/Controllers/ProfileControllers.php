<?php

namespace App\Http\Controllers;

use App\Niche;
use App\Profile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Redirect;
use DB;
use App\Quotation;
use Illuminate\Support\Facades\Hash;



class ProfileControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        return view('profile',['Statistics'=>$data,'apps'=>$application]);

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
        //
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
        try {

            $profile = Profile::find($request->input('id'));


            if($request->input('status') == 'profile_normal'){
                $profile->fullname = $request->input('fullname');
                $profile->email = $request->input('email');
                $profile->AboutUs = $request->input('aboutUs');
                $profile->aboutMe = $request->input('aboutMe');
                $profile->IpToken = $request->input('tokenProxy');
            }else{
                if (Hash::check($request->input('c_password'), $profile->password)) {
                    $profile->password = Hash::make($request->input('n_password'));
                }
            }

            $profile->save();

            return redirect()->route('profile');


        } catch (\Exception $e) {
            return redirect()->route('profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
