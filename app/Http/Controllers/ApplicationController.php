<?php

namespace App\Http\Controllers;

use App\Application;
use App\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;
use App\Quotation;
use Goutte\Client;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
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
        if ($status == 'active')
            $application = DB::table('application')->where('status',1)->orderBy('id', 'DESC')->paginate(6);
        elseif ($status == 'suspend')
            $application = DB::table('application')->where('status',0)->orderBy('id', 'DESC')->paginate(6);
        elseif ($status == 'application_with_ads')
            $application = DB::table('application')->where('ads_status',1)->orderBy('id', 'DESC')->paginate(6);
        elseif ($status == 'application_without_ads')
            $application = DB::table('application')->where('ads_status',0)->orderBy('id', 'DESC')->paginate(6);
        else
            $application = DB::table('application')->orderBy('id', 'DESC')->paginate(6);


        return view('application',['Statistics'=>$data,'apps'=>$application,'console'=>DB::table('console')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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

        $packagName = DB::table('application')->where('packageName',$request->input('packageName'))->count();


        if($packagName > 0)
            array_push($data,'<b>Package Name </b> already exists.');


        try {
            $application = new Application();

            $application->packageName = $request->input('packageName');
            $application->type = $request->input('type');
            $application->id_console = $request->input('console_id');
            $application->status = 0;
            $application->date_P = date("Y-m-d");
            $application->icon = 'images/users/user-1.jpg';
            $application->save();

            return redirect()->route('application.store')->with('success','<strong>Congratulations </strong> you have been accepted.');

        } catch (\Exception $e) {
            // do task when error
            return Redirect::back()->withInput(Input::all())
                ->with('errors',$data);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($idApp,$idCon)
    {

        // Get Application By Id
        $MyApplication = DB::table('application')->where('application.id',$idApp)->get();

        // Get All Application In Console Developer
        $ConsoleApplication = DB::table('console')
            ->join('application', function ($join) {
                $join->on('console.id', '=', 'application.id_console');
            })->where('console.id',$idCon)->get();

        // Get Ads For My application
        $ApplicationAds = DB::table('adsapps')
            ->join('application','adsapps.id_apps', '=', 'application.id')
            ->join('ads','ads.id', '=', 'adsapps.id_ads')
            ->select('ads.id_ads','adsapps.banner','adsapps.interstitial','adsapps.rewarded','adsapps.native','adsapps.status','ads.monetization','adsapps.created_at','adsapps.updated_at')
            ->where('application.id',$idApp)
            ->where('application.id_console',$idCon)
            ->get();

        // Get console Info
        $console = DB::table('console')
            ->where('console.id',$idCon)
            ->get();

        // Get Ads Info
        $AdsAccounts = DB::table('ads')
            ->join('adsapps', 'adsapps.id_ads', '=', 'ads.id')
            ->join('application','application.id', '=', 'adsapps.id_apps')
            ->select('ads.email','ads.country','ads.status','ads.monetization')
            ->where('application.id',$idApp)
            ->where('application.id_console',$idCon)
            ->get();


        return view('applicationAbout',['MyApps'=>$MyApplication,'ConsoleApps'=>$ConsoleApplication,'AppsAds'=>$ApplicationAds,'ConsoleInfo'=>$console,'AdsAcc'=>$AdsAccounts]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Retrieve the Console
        $application = Application::find($request->input('id'));

        //delete
        $application->delete();
        return redirect()->route('application');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {


        $MyApplication = DB::table('application')->select('packageName','id','date_P')->get();


        try {
            foreach ($MyApplication as $item) {


                //  Find Application Id For Update Data
                $application = Application::find($item->id);

                // Create client
                $client = new Client();
                $crawler = $client->request('GET', 'https://play.google.com/store/apps/details?id=' . $item->packageName);

                if ($client->getResponse()->getStatus() == '404') {
                    $application->status = 0;
                } else {

                    $application->name = $crawler->filter('.AHFaub')->text();
                    $application->icon = substr($crawler->filter('.T75of')->getNode(0)->getAttribute('src'), 0, -5);
                    $application->description = $crawler->filter('.DWPxHb')->html();
                    $application->category = $crawler->filter('.R8zArc')->eq(1)->text();
                    $application->email = $crawler->filter('.euBY6b')->text();
                    $application->installs = $crawler->filter('.IxB2fe .hAyfc span')->eq(4)->text();
                    $ratingNumber = $crawler->filter('.AYi5wd')->text();
                    $rating = $crawler->filter('.BHMmbe')->text();
                    $application->review = $rating . ' | ' . $ratingNumber;
                    $application->developer_Name = $crawler->filter('.R8zArc')->text();
                    $application->status = 1;
                    $dateUp = date("Y-m-d", strtotime($crawler->filter('.IxB2fe .hAyfc span')->eq(0)->text()));
                    $date1 = date_create($dateUp);
                    $date2 = date_create(date('Y-m-d'));
                    $diff = date_diff($date1, $date2);
                    $dateUp .= " | " . $diff->format("%R%a days");
                    $application->date_U = $dateUp;

                    $originalDate = $application->created_at;
                    $newDate = date("Y-m-d", strtotime($originalDate));
                    $dif = date_diff(date_create($newDate), date_create(date('Y-m-d')));
                    $application->date_P = $application->created_at . ' | ' . $dif->format("%R%a days");


                }

                $application->save(); //persist the data
            }

            echo 'true';

        }catch (\Exception $exception){
            echo $exception->getMessage();
        }



    }



}
