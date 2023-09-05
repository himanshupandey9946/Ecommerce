<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sizemodel;
use Auth;

class SizeController extends Controller
{
    //
    public function list(){
        $data=sizemodel::all();
    return view('dashboard.size.list',['data'=>$data]);
    }

    public function add(){
        return view('dashboard.size.add');

    }
    public function insert(Request $request){
        $size = new sizemodel;
        $size->name = $request->name;
        $size->status = $request->status;
        $size->save();
        return redirect('size_list')->with('message','Size Successfully Created');
    }
    public function edit($id){
        $data=sizemodel::find($id); 
        return view('dashboard.size.edit',compact('data'));
    }
    public function update(Request $request,$id){
        $size= sizemodel::find($id);
        $size->name = $request->name;
        $size->status = $request->status;
        $size->update();
        return redirect('size_list')->with('message','Size Successfully Updated');
    }
    public function delete($id){
        $color=sizemodel::find($id);
        $color->delete();
        return redirect('size_list')->with('message','Color Successfully Deleted');

    }
}