<?php

namespace App\Http\Controllers;

use App\Application;
use App\Console;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use App\Quotation;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($status = null){

        $active_with_apps = DB::select(sprintf('SELECT COUNT(*) as nbr FROM (SELECT DISTINCT id_console FROM `console`,application WHERE console.id = application.id_console AND console.status = 1) as dt'));

        $data = array(
            "totale" => DB::table('console')->count(),
            "active" => DB::table('console')->where('status',1)->count(),
            "suspend" => DB::table('console')->where('status',0)->count(),
            "active_with_apps" => $active_with_apps[0]->nbr,
            "active_without_apps" => DB::table('console')->where('status',1)->count() - $active_with_apps[0]->nbr
        );

        if ($status == 'active')
            $consoles = DB::table('console')->where('status',1)->orderBy('id', 'DESC')->paginate(6);
        elseif ($status == 'suspend')
            $consoles = DB::table('console')->where('status',0)->orderBy('id', 'DESC')->paginate(6);
        elseif ($status == 'accounts_with_apps')
            $consoles = DB::table('console')
                ->select('console.id','console.email', 'console.email_Recovery', 'console.password','console.country','console.state','console.city','console.ip','console.latitude','console.longitude','console.open_Method','console.card_Number','console.phone','console.status','console.created_at','console.updated_at')
                ->rightJoin('application', 'application.id_console', '=', 'console.id')
                ->where('console.status',1)
                ->groupBy('application.id_console')
                ->orderBy('id', 'DESC')
                ->paginate(6);
        elseif ($status == 'accounts_without_apps')
            $consoles = DB::table('console')
                ->select('console.id','console.email', 'console.email_Recovery', 'console.password','console.country','console.state','console.city','console.ip','console.latitude','console.longitude','console.open_Method','console.card_Number','console.phone','console.status','console.created_at','console.updated_at')
                ->rightJoin('application', 'application.id_console', '<>', 'console.id')
                ->where('console.status',1)
                ->groupBy('application.id_console')
                ->orderBy('id', 'DESC')
                ->paginate(6);
        else
            $consoles = DB::table('console')->orderBy('id', 'DESC')->paginate(6);



        return view('console',['Statistics'=>$data,'cons'=>$consoles]);
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

        $email          = DB::table('console')->where('email',$request->input('email_console_add'))->count();
        $email_Recovery = DB::table('console')->where('email_Recovery',$request->input('email_console_add_recovery'))->count();
        $card_Number    = DB::table('console')->where('card_Number',$request->input('card_console_add'))->count();
        $phone          = DB::table('console')->where('phone',$request->input('phone_console_add'))->count();


        if($email > 0)
            array_push($data,'<b>Email </b> already exists.');
        if($email_Recovery > 0)
            array_push($data,'<b>Email Recovery </b> already exists.');
        if($card_Number > 0)
            array_push($data,'<b>Card Number </b> card number already exists.');
        if($phone > 0)
            array_push($data,'<b>Phone </b> phone already exists.');

        try {
            $console = new Console();

            $console->id = null;
            $console->email = $request->input('email_console_add');
            $console->email_Recovery = $request->input('email_console_add_recovery');
            $console->password = $request->input('password_console_add');
            $console->country = $request->input('country_console_add');
            $console->state = $request->input('state_console_add');
            $console->city = $request->input('city_console_add');
            $console->ip = $request->input('ip_console_add');
            $console->latitude = $request->input('latitude_console_add');
            $console->longitude = $request->input('longitude_console_add');
            $console->open_Method = $request->input('method_console_add');
            $console->card_Number = $request->input('card_console_add');
            $console->phone = $request->input('phone_console_add');
            $console->status = 1;
            $console->save(); //persist the data

            return redirect()->route('console.store')->with('success','<strong>Congratulations </strong> you have been accepted.');

        } catch (\Exception $e) {
            // do task when error
            return Redirect::back()->withInput(Input::all())
                                    ->with('errors',$data);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function show(Console $console)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function edit(Console $console)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Console $console)
    {
        $data = array();

        $acc =  DB::table('console')->where('id',$request->input('id'))->get();


        if ($acc[0]->email_Recovery != $request->input('email_console_edit_recovery')){
            $email_Recovery = DB::table('console')->where('email_Recovery',$request->input('email_console_edit_recovery'))->count();
            if($email_Recovery > 0)
                array_push($data,'<b>Email Recovery</b> already exists.');
        }


        if ($acc[0]->phone != $request->input('phone_console_edit')){
            $phone = DB::table('console')->where('phone',$request->input('phone_console_edit'))->count();
            if($phone > 0)
                array_push($data,'<b>Phone </b> already exists.');
        }


        try {

            $console = Console::find($request->input('id'));
            $console->email_Recovery = $request->input('email_console_edit_recovery');
            $console->password = $request->input('password_console_edit');
            $console->phone = $request->input('phone_console_edit');
            $console->status = $request->input('status');
            $console->save(); //persist the data

            return redirect()->route('console.update')
                ->withInput(Input::all())->with('edits','<strong>Congratulations </strong> you have been accepted.');

        } catch (\Exception $e) {
            // do task when error
            return Redirect::back()->withInput(Input::all())
                ->with('error',$data);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Retrieve the Console
        $console = Console::find($request->input('id'));

        //delete
        $console->delete();
        return redirect()->route('console');
    }

    /**
     * Get the Console By Id
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function getConsoleById(Request $request)
    {
        $console = DB::table('console')->where('id',$request->id)->orderBy('id', 'DESC')->get();

        echo json_encode($console);
    }

    /**
     * Get the Console By Id
     *
     * @param  $id Console
     * @return \Illuminate\Http\Response
     */
    public function getAllApplicationInConsole(Request $request)
    {
        $application = DB::table('console')
            ->join('application', function ($join) {
                $join->on('console.id', '=', 'application.id_console');
            })->where('console.id',$request->id)->orderBy('id', 'DESC')->get();

        echo json_encode($application);
    }


}
