<?php

namespace App\Http\Controllers;

use App\Ads;
use App\BootHunter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;
use App\Quotation;
use Goutte\Client;

class BootHunterControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = 9)
    {

        $listIp = DB::table('ipdetection')
            ->join('application', 'application.packageName', '=', 'ipdetection.packageName')
            ->select('application.name','application.icon','ipdetection.id','ipdetection.ip','ipdetection.country_name','ipdetection.city','ipdetection.isp','ipdetection.domain','ipdetection.block','ipdetection.packageName','ipdetection.updated_at','ipdetection.created_at')
            ->orderBy('application.id', 'DESC')->get();


        // Get All
        if ($status == 0)
            $listIp = DB::table('ipdetection')
                ->join('application', 'application.packageName', '=', 'ipdetection.packageName')
                ->where('ipdetection.block',0)
                ->select('application.name','application.icon','ipdetection.id','ipdetection.ip','ipdetection.country_name','ipdetection.city','ipdetection.isp','ipdetection.domain','ipdetection.block','ipdetection.packageName','ipdetection.updated_at','ipdetection.created_at')
                ->orderBy('application.id', 'DESC')->get();

        if ($status == 1)
            $listIp = DB::table('ipdetection')
                ->join('application', 'application.packageName', '=', 'ipdetection.packageName')
                ->where('ipdetection.block',1)
                ->select('application.name','application.icon','ipdetection.id','ipdetection.ip','ipdetection.country_name','ipdetection.city','ipdetection.isp','ipdetection.domain','ipdetection.block','ipdetection.packageName','ipdetection.updated_at','ipdetection.created_at')
                ->orderBy('application.id', 'DESC')->get();

        if ($status == 2)
            $listIp = DB::table('ipdetection')
                ->join('application', 'application.packageName', '=', 'ipdetection.packageName')
                ->where('ipdetection.block',2)
                ->select('application.name','application.icon','ipdetection.id','ipdetection.ip','ipdetection.country_name','ipdetection.city','ipdetection.isp','ipdetection.domain','ipdetection.block','ipdetection.packageName','ipdetection.updated_at','ipdetection.created_at')
                ->orderBy('application.id', 'DESC')->get();

        if ($status == 3)
            $listIp = DB::select(sprintf('SELECT * FROM ipdetection WHERE ipdetection.packageName NOT IN (SELECT packageName FROM application) ORDER BY `ipdetection`.`id` DESC'));






        return view('proxydetection',['AccIp'=>$listIp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Retrieve
        $boothunter = BootHunter::find($request->input('id'));

        //delete
        $boothunter->delete();

        return redirect()->route('proxydetection');
    }

    /**
     * PHP Integration - Fraudulent traffic detector
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function BootHunterIp($id)
    {

        // get Token
        $token = DB::table('users')->select('IpToken')->get();

        $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));

        $headers = [
            'X-Key: '.$token[0]->IpToken,
        ];

        $ch = curl_init("https://www.iphunter.info:8082/v1/ip/".$ip);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = json_decode(curl_exec($ch), 1);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);


        if($http_status == 200) {
            //-- If the result is 1, we will proceed to block the user
            if($output['data']['block'] == 1)
                echo 'true';
            else
                echo 'false';

            $info = new BootHunter();
            $info->id = null;
            $info->ip = $output['data']['ip'];
            $info->packageName = $id;
            $info->country_name = $output['data']['country_name'];
            $info->city = $output['data']['city'];
            $info->isp = $output['data']['isp'];
            $info->domain = $output['data']['domain'];
            $info->block = $output['data']['block'];
            $info->save();

        }

    }
}
