<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maincategory;
use App\Models\category;
use App\Models\subcategory;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{  

    //Code of Main Category Start

    function main_category(){
        $data=maincategory::all();
       return view('dashboard.main_category',['data'=>$data]);
}

    function addmaincategory(){
        return view('dashboard.addmaincategory');
    }

    function add_main_category(Request $req){
        //validation part start
        $req->validate([
            'name' => 'required',
           'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'

        ]);
        
        $imagename = time(). '.' .$req->image->extension();
        $req->image->move('uploads/maincategoryimage/', $imagename);
        $data=new maincategory;
        $data->main_category_name=$req->name;
        $data->main_category_image=$imagename;
        $data->save();
        return redirect('main_category')->with('message','Main_Category_Added');
       
    }

    function delete_main_category($id){
        $data=maincategory::find($id);
        $data->delete();
        $destination='uploads/maincategoryimage/'.$data->main_category_image;
            if(File::exists(  $destination)){
                File::delete($destination);
            }

        return redirect()->back()->with('message','Main_Category_Deleted');
    }

    function update_main_category($id){
        $data=maincategory::find($id);
        return view('dashboard.update_main_category',compact('data'));
    }

    

   function edit_main_category(Request $req, $id){
        $data= maincategory::find($id);
         //validation part start
         $req->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'

        ]);
            $data->main_category_name=$req->name;

            $destination='uploads/maincategoryimage/'.$data->main_category_image;
            if(File::exists(  $destination)){
                File::delete($destination);
            }
            $imagename = time(). '.' .$req->image->extension();
            $req->image->move('uploads/maincategoryimage/', $imagename);
            $data->main_category_image=$imagename;
        
            $data->update();
            return redirect('main_category')->with('message','Main_Category_Updated');

    }

    function canceladdmaincategory(){
        return redirect('main_category');
    }

    function cancelmainupdatecategory(){
        return redirect('main_category');
    }


    //Code of Main Category End

    //Code of  Category Start
    
    function category(){
       // $data=category::all();
       $data = DB::table('category')
                      ->select('category.*','maincategory.main_category_name as Main_Category_Name')
                      ->join('maincategory','maincategory.id',"=",'category.maincategory_id')
                      ->get();

        return view('dashboard.category',['data'=>$data]);
    }
   public function addcategory(){
      $categories= maincategory::orderBy('main_category_name','ASC')->distinct('main_category_name')->get();
        $data['categories']= $categories; 
      //  print_r($data['categories']);
       
        return view('dashboard.addcategory',$data);

    }
    function add_category(Request $req){
       // print_r($req);
      ////  print_r($_POST);
       // die;
         //validation part start
         $req->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'maincategory_id' => 'required'

        ]);

       
        
           $categories= maincategory::get();

        
           $data=new category;
           $data->category_name=$req->input('name');
           $imagename = time(). '.' .$req->image->extension();
           $req->image->move('uploads/categoryimage/', $imagename);  
           $data->category_image=$imagename;
           $data->maincategory_id= $req->input('maincategory_id');
        
           $data->save();
           return redirect('category')->with('message','Category_Added');
    }

    function delete_category($id){
        $data=category::find($id);
        $data->delete();
        $destination='uploads/categoryimage/'.$data->category_image;
            if(File::exists(  $destination)){
                File::delete($destination);
            }

        return redirect()->back()->with('message','Category_Deleted');

    }
    function update_category($id){
        $data=category::find($id);
       $categories= maincategory::orderBy('main_category_name','ASC')->distinct()->get();
       // $categories= maincategory::all();

         
        return view('dashboard.update_category',compact('data','categories'));

    }
    function edit_category(Request $req, $id){
        $data= category::find($id);
        //validation part start
        $req->validate([
           'name' => 'required',
           'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'

       ]);
           $data->category_name=$req->name;
           $data->maincategory_id=$req->main_category;
           $destination='uploads/categoryimage/'.$data->category_image;
           if(File::exists(  $destination)){
               File::delete($destination);
           }
           $imagename = time(). '.' .$req->image->extension();
           $req->image->move('uploads/categoryimage/', $imagename);
           $data->category_image=$imagename;
       
          $data->update();
       return redirect('category')->with('message','Category_Updated');
    }
    function cancelcategory(){
        return redirect('category');

       }
       function cancelupdatecategory(){
        return redirect('category');

       }
    
    //Code of Category End
    

    function subcategory(){
       // $data=subcategory::all();
       $data = DB::table('subcategory')
       ->select('subcategory.*','maincategory.main_category_name as Main_Category_Name','category.category_name as Category_Name')
       ->join('maincategory','maincategory.id',"=",'subcategory.maincategory_id')
       ->join('category','category.id','=','subcategory.category_id')
       ->get();



        return view('dashboard.subcategory',['data'=>$data]);
    }

    function addsubcategory(){
        $main_categories= maincategory::orderBy('main_category_name','ASC')->distinct()->get();
        
        $data['main_categories']= $main_categories;
        $categories= category::orderBy('category_name','ASC') ->distinct()->get();
        $datas['categories']= $categories;
           

       return view('dashboard.addsubcategory',$data,$datas);
    }
    function add_sub_category(Request $req){
        //validation part start
        $req->validate([
           'name' => 'required',
           'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
           'main_category' =>'required',
           'category' =>'required',

       ]);
       
       $imagename = time(). '.' .$req->image->extension();
       $req->image->move('uploads/subcategoryimage/', $imagename);
       $data=new subcategory;
       $data->subcategory_name=$req->name;
       $data->subcategory_image=$imagename;
       $data->maincategory_id=$req->main_category;
       $data->category_id=$req->category;

       $data->save();
       return redirect('subcategory')->with('message','Category_Added');
      
   }

    
          

    
    function delete_sub_category($id){
        $data=subcategory::find($id);
        $data->delete();
        $destination='uploads/subcategoryimage/'.$data->subcategory_image;
            if(File::exists(  $destination)){
                File::delete($destination);
            }


        return redirect()->back()->with('message','Sub_Category_Deleted');

    }
    function update_sub_category($id){
        $data=subcategory::find($id);
        $main_categories= maincategory::orderBy('main_category_name','ASC')->distinct()->get();
        $categories= category::orderBy('category_name','ASC')->distinct()->get();

         
        return view('dashboard.update_sub_category',compact('data','main_categories','categories'));

    }
    function edit_sub_category(Request $req,$id){
        

        $data= subcategory::find($id);
        //validation part start
        $req->validate([
           'name' => 'required',
           'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'

       ]);
           $data->subcategory_name=$req->name;
           $data->maincategory_id=$req->main_category;
           $data->category_id=$req->category;

           $destination='uploads/subcategoryimage/'.$data->subcategory_image;
           if(File::exists(  $destination)){
               File::delete($destination);
           }
           $imagename = time(). '.' .$req->image->extension();
           $req->image->move('uploads/subcategoryimage/', $imagename);
           $data->subcategory_image=$imagename;
       
       $data->update();
       return redirect('subcategory')->with('message','Sub_Category_Updated');
    }

    function cancelsubcategory(){
        return redirect('subcategory');

       }
       function cancelsubupdatecategory(){
        return redirect('subcategory');
    }
    
  
 


    
}
