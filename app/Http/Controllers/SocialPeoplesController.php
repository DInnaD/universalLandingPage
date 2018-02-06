<?php

namespace App\Http\Controllers;

use App\SocialPeople;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
class SocialPeoplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SocialPeople $socialPeople)
    {
        //
        return view('admin.socialPeoples.index', [
          'socialPeoples' => SocialPeople::orderBy('created_at', 'desc')->paginate(10)
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
        return view('admin.socialPeoples.create', compact('socialPeople'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, SocialPeople $socialPeople)//, People $people)
    {
        //dd($request);

        $socialPeople->create($request->except('_token'));

        return redirect()->route('socialPeoples.index', compact('socialPeople'))->with('status', 'SocialPeoples added');
    }

     /**
     * Display the specified resource.
     * TODO: $id -> $socialPeople
     * @param  \App\SocialPeople  $socialPeople
     * @return \Illuminate\Http\Response
     */
    public function show(SocialPeople $socialPeople)
    {
        //
        return view('admin.socialPeoples.show', compact('socialPeople'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SocialPeople  $socialPeople
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialPeople $socialPeople)
    {
        //
        return view('admin.socialPeoples.edit', compact('socialPeople'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialPeople  $socialPeople
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialPeople $socialPeople)
    {
        //
        $socialPeople->update($request->except('_token'));//($request->all());
        return redirect()->route('socialPeoples.index')->with('status', 'Page edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialPeople  $socialPeople
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialPeople $socialPeople)
    {
        //
        $social->delete();

        return redirect()->route('socialPeoples.index');
    }
}
