<?php

namespace App\Http\Controllers;

//use App\Index;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\People;
use App\Portfolio;
use App\Service;
use App\Page;

use App\SocialPeople;
use App\Logo;
use App\Socialy;

use Mail;
use DB;

//use App\Http\Requests\IndexRequest;

class IndexController extends Controller
{
    public function execute(Request $request)
    {//{!! Html::image('assets/img/'.$page->images,'',['class' => 'zoomIn wow animated']) !!}
    //
    if($request->isMethod('post')){
// $this->validate($request, [

//       'email' => 'required|email',
//       'subject' => 'required|min:3',
//       'message' => 'required|min:10'
//     ]);

//     $data = array(
//       'email' => $request->email,
//       'subject' => $request->subject,
//       'mailbody' => $request->message
//     );

//     Mail::send('emails.contact', $data, function($message) use ($data) {
//       $message->from($data['email']);
//       $message->to('username@gmail.com');
//       $message->subject($data['subject']);
//     });
//   }
        $messages = [

            'required' => "Fill full :attribute is required",
            'email' => "Fill full :attribute is the same with email address"


        ];



        $this->validate($request,[

            'name' => 'required|max:255',
            'email' => 'required|email',
            'text' => 'required'

            ], $messages);

       //dump($request);
        $data = $request->all();
 //       $data = array(
//       'email' => $request->name,
//       'subject' => $request->email,
//       'mailbody' => $request->text
//     );
        //dump($data);
        //mail sent
        $result = 
        Mail::send('site.email', ['data'=>$data], function($message) use ($data) {

            $mail_sender = $data['email'];// eto data user after register

            $mail_admin = env('MAIL_ADMIN');//USER_NAME');//here is all email adress from mailer
            $message->from($mail_sender, $data['name']);

            $message->to($mail_admin, 'Mr. Admin')->subject('Question');
            
            
            
//Send Mail  +++++++na mailer 100%   
// Mail::send('site.email', array('data' => 'data'), function($message) use ($data)
// {
   // $message->to($data['email'], 'Sender Name')->subject('Welcome!', $data['email'], $data['name'],  $data['text']);
            

            

        });
        if($result){

                return redirect()->route('home')->with('status', 'Email is send');
            }
        //dd(error_get_last())

    }
        $pages = Page::all();
        $portfolios = Portfolio::get(array('name', 'filter', 'images', 'link' ));
        $services = Service::where('id','<',20)->get();
        $peoples = People::all();//take(3)->get();

        
        $tags = DB::table('portfolios')->distinct()->pluck('filter');
     //dd($socials);
        $socials = Socialy::take(24)->get();
        //dd($socials);
        $socialPeoples = SocialPeople::take(5)->get();
        $logos = Logo::take(1)->get();
        //MENU
        $menu = array();
        //from db
        foreach ($pages as $page) {
            # code...
            $item = array('title'=>$page->name, 'alias'=>$page->alias);
            //alias or link
            array_push($menu, $item);
        }
        //dd($menu);
        //from hand
        $item =array('title'=>'Services','alias'=>'service');
        array_push($menu, $item);
        $item =array('title'=>'Portfolio','alias'=>'Portfolio');
        array_push($menu, $item);
        $item =array('title'=>'Team','alias'=>'team');
        array_push($menu, $item);
        $item =array('title'=>'Contacts','alias'=>'contact');
        array_push($menu, $item);
        //dd($menu);
        return view('site.index', array(
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags'=> $tags,
            'socials' => $socials,
            'socialPeoples' => $socialPeoples,
        
            'logos'=> $logos,
        ));// ne k maketu ('layouts.site'); a k promegutochnomu
    }
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
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        //
    }
}
