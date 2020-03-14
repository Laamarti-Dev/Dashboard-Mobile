<?php

namespace App\Http\Controllers;

use App\Console;
use App\Niche;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use App\Quotation;

class NicheControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        $data = array(
            "totale" => DB::table('niche')->count(),
            "good" => DB::table('niche')->where('status','Good Niche')->count(),
            "bad" => DB::table('niche')->where('status','Bad Niche')->count(),
            "new" =>  DB::table('niche')->where('status','New Niche')->count()
        );

        if ($status == 'good')
            $niche = DB::table('niche')->where('status','Good Niche')->orderBy('id', 'DESC')->paginate(6);
        elseif ($status == 'bad')
            $niche = DB::table('niche')->where('status','Bad Niche')->orderBy('id', 'DESC')->paginate(6);
        elseif ($status == 'new')
            $niche = DB::table('niche')->where('status','New Niche')->orderBy('id', 'DESC')->paginate(6);
        else
            $niche = DB::table('niche')->orderBy('id', 'DESC')->paginate(6);

        return view('niche',['Statistics'=>$data,'Niche'=>$niche]);

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
            $niche = new Niche();

            $niche->id = null;
            $niche->name = $request->input('nicheName');
            $niche->category = $request->input('nicheCategory');
            $niche->about = $request->input('elm1');
            $niche->status = "New Niche";
            $niche->save(); //persist the data

            return redirect()->route('niche.store')->with('success','<strong>Congratulations </strong> you have been accepted.');

        } catch (\Exception $e) {
            // do task when error
            return Redirect::back()->withInput(Input::all())
                ->with('errors',"Cannot add Niche");

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
        try {

            $niche = Niche::find($request->input('id'));
            $niche->name = $request->input('nicheNameEdit');
            $niche->category = $request->input('nicheCategoryEdit');
            $niche->about = $request->input('elm1e');
            $niche->status = $request->input('status');
            $niche->save(); //persist the data

            return redirect()->route('niche.update');


        } catch (\Exception $e) {
            // do task when error
            return Redirect::back()->withInput(Input::all())
                ->with('errorsedit',"Cannot Update Niche !!");


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
        //Retrieve the Console
        $niche = Niche::find($request->input('id'));

        //delete
        $niche->delete();
        return redirect()->route('niche');
    }

    /**
     * Get the Niche By Id
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function getNicheById(Request $request)
    {
        $niche = DB::table('niche')->where('id',$request->id)->orderBy('id', 'DESC')->get();

        echo json_encode($niche);
    }
}
