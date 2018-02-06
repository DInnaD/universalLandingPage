<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
class LogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Logo $logo)
    {
        //
        return view('admin.logos.index', [
          'logos' => Logo::orderBy('created_at', 'desc')->paginate(10)
          ]);
        
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.logos.create', compact('logo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, Logo $logo)//, People $people)
    {
        //dd($request);

        $logo->create($request->except('_token'));

        return redirect()->route('logos.index', compact('logo'))->with('status', 'Logo added');
    }

     /**
     * Display the specified resource.
     * TODO: $id -> $logo
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
        return view('admin.logos.show', compact('logo'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
        return view('admin.logos.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        //
        $logo->update($request->except('_token'));//($request->all());
        return redirect()->route('logos.index')->with('status', 'Page edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
        $logo->delete();

        return redirect()->route('logos.index');
    }
}
