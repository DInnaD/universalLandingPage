<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests;
use Validator;
use File;
use Storage;

// use App\Http\Requests\TemplateRequest;
// use App\Template;
// use App\Compaign;
// use Illuminate\Http\Request;
// use App\Owned;
// use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Page $page)
    {
        //
        return view('admin.pages.index', [
          'pages' => Page::orderBy('created_at', 'desc')->paginate(10)
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
        return view('admin.pages.create', compact('page'));
    //     if(view()->exists('admin.pages.create')){
            
    //         $data = [
    //             'title' => 'New Page'

    //         ];
    //         return  view('admin.pages.create', $data);
    //         }
    //         abort(404);
    // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, Page $page, File $file)//, Page $page)
    {
        //dd($request);
        //$images= "";
        // if($request->hasFile('images')){//
        //   $file = $request->file('images')->move(public_path().'/assets/img/', $request->file('images')->getClientOriginalName());
        // }
    

    //$images = "";
if($request->hasFile('images')){


    $destinationPath = "public_path().'/assets/img/'";
    $file=$request->file('images');
    $extension=$file->getClientOriginalExtension();
    $fileName = rand(1111,9999). $extension;
    $file->move($destinationPath, $fileName);

    //dd($file);


    //$images = $fileName; 
}
        $page->create($request->except('_token'));

        // $validator = Validator::make($page,[
        //             'name' => 'required|max:255',
        //             'alias' => 'required|unique:pages|max:255',
        //             'text' => 'required',

        //         ]);
        //     if($validator->fails()){
        //         return redirect()->route('pages.create')->withErrors($validator)->withInput();
        //     }
//dd($validator);
 

        return redirect()->route('pages.index', compact('page'))->with('status', 'Page added');//->withBunch($bunch);//->with('me');
        //
        //if($request->isMethod('post')){



//             $page = $request->except('_token');

//             $validator = Validator::make($page,[
//                     'name' => 'required|max:255',
//                     'alias' => 'required|unique:pages|max:255',
//                     'text' => 'required',

//                 ]);
//             if($validator->fails()){
//                 return redirect()->route('admin.pages.index')->withErrors($validator)->withInput();
//             }
// //dd($validator);
//             if($request->hasFile('images')){
//             $file = $request->file('images');
//             $page['images'] = $file->getClientOriginalName();
//             $file->move(public_path().'/assets/img', $page['images']);
//         }
//         //dd($page);
//         //store to db
//         $pages = new Page($page);
//         if($pages->save()){
//                 return redirect('admin')->with('status', 'Page added');
//             }





        //or
        //$page = new Page();
        //$page->unguard();//fiilable in model instead but to all
        //$page->fill($page);



         //$page->create($request->all());//except('_token'));
       // }
//dd($file);
         //return redirect()->url('/admin');//, compact('compaign'));//->with('me');




    //     if($request->isMethod('post')){

    //     $messages = [

    //         'required' => "Fill full :attribute is required",
    //         'email' => "Fill full :attribute is the same with email address"


    //     ];



    //     $this->validate($request,[

    //         'name' => 'required|max:255',
    //         'email' => 'required|email',
    //         'text' => 'required'

    //         ], $messages);

    //    //dump($request);
    //     $data = $request->all();
    //     //dump($data);
    //     //mail sent
    //     //$result = 
    //     Mail::send('site.email', ['data'=>$data], function($message) use ($data) {

    //         $mail_admin = env('MAIL_ADMIN');
    //         $message->from($data['email'], $data['name']);

    //         $message->to($mail_admin, 'Mr. Admin')->subject('Question');

    //         // if($result){

    //         //     return redirect()->route('home')->with('status', 'Email is send');
    //         // }

    //     });//dd(error_get_last())

    // }
  
    }

    /**
     * Display the specified resource.
     * TODO: $id -> $page
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //



        //   if($request->hasFile('images')){
        //     $file = $request->file('images');
            
        //     $page['images'] = $file->getClientOriginalName();
        //     $file->move(public_path().'/assets/img', $page['images']);
            
        // }
        //dd($request->file('image'));
//$images = "";
if($request->hasFile('images')){


    $destinationPath = 'images';
    $file=$request->file('images');
    $extention=$file->getClientOriginalExtention();
    $fileName = public_path().'/assets/img'. $extention;
    $file->move($destinationPath, $fileName);
    //$images = $fileName; 
}


        // if($request->hasFile('images')){//
        //  $file = $request->file('images')->move(public_path().'/assets/img/', $request->file('images')->getClientOriginalName());
        // }
        $page->update($request->except('_token'));//($request->all());
        
        return redirect()->route('pages.index')->with('status', 'Page edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
        $page->delete();

        return redirect()->route('pages.index');
    }
}
