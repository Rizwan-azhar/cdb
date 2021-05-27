<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    public function getStats()
    {
            return view('home.view-stats');
  
     
    }

    public function getUserStats(Request $request)
    {
            //dd($request->segment(1) == '');
            $users = DB::table('users')->where('email','!=','admin@admin.com')->orderBy('id','desc')->get();

            return view('home.view_user',compact('users'));
      
    }
    public function getVendors()
    {
        
            
            $vendors = DB::table('vendors')->get();

            return view('home.vendor',compact('vendors'));
       
    }
    public function getConfirm($id)
    {
        
            
        DB::Table('vendors')->where('id',$id)->update([
            'status' => '1',
            ]);
       

            return redirect('view-vendors');
       
    }
    public function getCommission($id)
    {           $vendor = DB::table('vendors')->where('id', $id)->first();
            return view('commission', compact('vendor'));
       
    }
    public function getWatermark()
    {               return view('watermark');
       
    }
    public function postCommission(Request $request)
    {
        $this->validate($request, [
            'commissions'=> 'required|integer|min:1|max:100',
            ]);    

        DB::table('vendors')->where('id', $request->id)->update([
            'commissions' => $request->commissions
        ]);
        return redirect('view-vendors')->with('message','Successfully updated');
    }
    public function getCategory()
    {
            $categories = DB::table('categories')->orderBy('id','desc')->get();
            return view('home.view-category',compact('categories'));
    }

    public function postCategory(Request $request){
        
        $validated = $request->validate([
            'title' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
            
        ]);


        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/images/';
            $file->move($path, $filename);

        };

             DB::Table('categories')->insert([
            'title' => $request->title,
            'image' => $filename
            ]);

             return redirect()->back()->with('success','Successfully Added');
    }


    

    public function getViewUser()
    {
        if (Auth::user()->username == 'admin')
        {
            
            return view('home.view_user');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function postUser(Request $request){
        
       $validated = $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'
        ]);

        
      

             DB::Table('users')->insert([
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
            ]);

             return redirect()->back()->with('success','Successfully Added');
       
    }


    public function getContactQueries()
    {
           
            $queries = DB::table('contact_queries')->orderBy('id','desc')->get();
            return view('home.view_contact_us',compact('queries'));
        
    }

     public function getSubscriptions()
    {
            $queries = DB::table('subscriptions')->orderBy('id','desc')->get();
            return view('home.view_subscriptions',compact('queries'));
        
    }

    public function getViewVideos()
    {
          
            $videos = DB::table('videos')->orderBy('id','desc')->get();
            $categories = DB::table('categories')->orderBy('title','asc')->get();
            return view('home.view_videos',compact('videos','categories'));
        
    }

    public function postVideos(Request $request){
        
       $validated = $request->validate([
            'title' => 'required',
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required'
        ]);

      // dd($request);

        if($request->file('video')){
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/videos/';
            $file->move($path, $filename);


                DB::Table('videos')->insert([
                'title' => $request->title,
                'file' => $filename,
                'category_id' => $request->category_id,
                'poster' => 'poster.png',
                'description' => $request->description,
                'price' => $request->price
                ]);

                return redirect()->back()->with('success','Successfully Added');

             };

             

             
        
       
        return redirect()->back()->with('error','Something Wrong');
        
    }

    public function editVideo($id){
        $video = DB::table('videos')->where('id',$id)->first();
        if(!$video){
            return redirect()->back();
        }
        return view('home.edit_videos',compact('video'));
    }

 

    public function getViewCashin()
    {
        if (Auth::user()->username == 'admin')
        {
            $opt['opt'] = 'view-cashin';
            $job['job'] = DB::table('jobs')->get();
            return view('home.view_cashin')->with($opt)->with($job);
        }
        else
        {
            return redirect()->back();
        }
    }


    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
    

}
