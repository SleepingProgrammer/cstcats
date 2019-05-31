<?php

namespace Laraspace\Http\Controllers;

use Laraspace\Alumni;
use Laraspace\User;
use Illuminate\Http\Request;
use Response;

use Auth;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Laraspace\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumni = Alumni::findOrFail($id);

        $bday = "";
        if(!empty($alumni_birthday)){
            $bday = date("F dd, yyyy", $alumni->birthday);
        }
        $alumni->birthdate = (!empty($alumni->birthday)) ? $bday : "Not Set";
        return view('admin.alumni.show')->with('alumni', $alumni);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Laraspace\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
        $id = Auth::user()->alumni->id;
        
        $alumni = Alumni::findOrFail($id);

        $bday = "";
        if(!empty($alumni_birthday)){
            $bday = date("F dd, yyyy", $alumni->birthday);
        }
        $alumni->birthdate = (!empty($alumni->birthday)) ? $bday : "Not Set";
        return view('admin.alumni.show')->with('alumni', $alumni);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laraspace\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumni $alumni)
    {
        $id = Auth::user()->alumni->id;        
        $alumni = Alumni::findOrFail($id);        
        return view('admin.alumni.edit')->with('alumni', $alumni);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laraspace\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->gender = $request->gender;
        $alumni->current_employment_status = $request->current_employment_status;
        $alumni->birthday = $request->birthday;
        $alumni->address = $request->address;
        $alumni->phone = $request->phone;
        $alumni->landline = $request->landline;
        $alumni->profile_picture = $request->profile_picture;
        $alumni->proof_link = $request->proof_link;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Laraspace\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumni $alumni)
    {
        //
    }
}
