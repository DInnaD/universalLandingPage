<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Portfolio $portfolio)
    {
        //
        return view('admin.portfolios.index', [
          'portfolios' => Portfolio::orderBy('created_at', 'desc')->paginate(10)
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
        return view('admin.portfolios.create', compact('portfolio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, Portfolio $portfolio)//, Portfolio $portfolio)
    {
        //dd($request);

        $portfolio->create($request->except('_token'));

        return redirect()->route('portfolios.index', compact('portfolio'))->with('status', 'Portfolio added');
    }

     /**
     * Display the specified resource.
     * TODO: $id -> $portfolio
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
        return view('admin.portfolios.show', compact('portfolio'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
        $portfolio->update($request->except('_token'));//($request->all());
        return redirect()->route('portfolios.index')->with('status', 'Page edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
        $portfolio->delete();

        return redirect()->route('portfolios.index');
    }
}
