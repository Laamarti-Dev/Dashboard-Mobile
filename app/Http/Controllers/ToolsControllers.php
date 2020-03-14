<?php

namespace App\Http\Controllers;

use App\tools;
use Illuminate\Http\Request;
use App\Niche;
use Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use App\Quotation;

class ToolsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = DB::table('tools')->get();

        return view('tools',['Tools'=>$tools]);
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

            $tools = tools::find(1);
            $tools->tools = $request->input('elm1e');
            $tools->save(); //persist the data

            return redirect()->route('tools.update');


        } catch (\Exception $e) {
            // do task when error
            return Redirect::back()->withInput(Input::all())
                ->with('errorsedit',"Cannot Update Tools !!");
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
