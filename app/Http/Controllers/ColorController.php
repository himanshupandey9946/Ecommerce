<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\colormodel;
use Auth;

class ColorController extends Controller
{
    //
    public function list(){
        $data=colormodel::all();
    return view('dashboard.color.list',['data'=>$data]);
    }
    public function add(){
        return view('dashboard.color.add');

    }

    public function insert(Request $request){
        $color = new colormodel;
        $color->name = $request->name;
        $color->code = $request->code;
        $color->status = $request->status;
        $color->created_by = "1";
        $color->save();
        return redirect('color_list')->with('message','Color Successfully Created');
    }
    public function edit($id){
        $data=colormodel::find($id); 
        return view('dashboard.color.edit',compact('data'));
    }
    public function update(Request $request,$id){
        $color= colormodel::find($id);
        $color->name = $request->name;
        $color->code = $request->code;
        $color->status = $request->status;
        $color->update();
        return redirect('color_list')->with('message','Color Successfully Updated');
    }
    public function delete($id){
        $color=colormodel::find($id);
        $color->delete();
        return redirect('color_list')->with('message','Color Successfully Deleted');

    }
}
