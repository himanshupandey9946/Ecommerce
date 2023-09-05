<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maincategory;
use App\Models\category;
use App\Models\subcategory;
use App\Models\productmodel;
use App\Models\sizemodel;
use App\Models\colormodel;
use App\Models\productattr;
use App\Models\ProductImage;



use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;





class ProductController extends Controller
{
    public function list(){
        $data=productmodel::paginate(20);
        $data = DB::table('product')
                 ->where('product.is_delete', '=', 0)
                 ->orderBy('product.id','desc')
                 ->paginate(20);
        $product_attr=productattr::all();
                 
        return view('dashboard.product.list',['data'=>$data,'product_attr'=>$product_attr]);
    }

    public function add(){
        $data['header_title'] = 'Add New Product';
        //$data['product']=productmodel::find($id);
        $data['main_categories']= maincategory::orderBy('main_category_name','ASC')->distinct()->get();
        $data['categories']= category::orderBy('category_name','ASC')->distinct()->get();
        $data['sub_categories']= subcategory::orderBy('subcategory_name','ASC')->distinct()->get();
        $data['color']= colormodel::all();
        $data['size']= sizemodel::all();
        return view('dashboard.product.add',$data);
    }

    public function insert(Request $request){
        $title = $request->title;
        $product=new productmodel;
        $product->title = $title;
        //$product->created_by= Auth::user()->id;
       
        $product->created_by=1;
        $product->save();
        $slug = Str::slug($title, "-");

        $ckeckSlug= productmodel::checkSlug($slug);
        if(empty($checkSlug))
        {
            $product->slug = $slug;
            $product->save();
        }

        else{
            $new_slug = $slug.'-'.$product->id;
            $product->slug = $new_slug;
            $product->save();   

        }
        return redirect('product_edit/'.$product->id);
        
    }

    public function edit($id){
        $data['product']=productmodel::find($id);
        $data['main_categories']= maincategory::orderBy('main_category_name','ASC')->distinct()->get();
        $data['categories']= category::orderBy('category_name','ASC')->distinct()->get();
        $data['sub_categories']= subcategory::orderBy('subcategory_name','ASC')->distinct()->get();
        $data['color']= colormodel::all();
        $data['size']= sizemodel::all();
       // $data['id']='id';
      // echo '<pre>'  ;
        $data['productAttrArr']=DB::table('product_attr')->where(['product_id'=>$id])->get();
        $data['productImage']=DB::table('product_image')->where(['products_id'=>$id])->get();

      ////  print_r($data['productAttrArr']);
      //  die();
    


        return view('dashboard.product.edit',$data);


     //   return view('dashboard.product.edit',compact('product','main_categories','categories','sub_categories','size','color'));
    }

    public function update(Request $request,$id) {
        

        $product=productmodel::find($id);
        $files = $request->file('image');
        if($request->hasFile('image'))
        {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalName();
                $fileName = time().'-' .$request->name.'.'.$extension; 
                $file->move('uploads/productimage/', $fileName);
                $imageupload=new ProductImage;
                $imageupload->image_name = $fileName;
                $imageupload->products_id = $product->id;
                $imageupload->save();
                
            }
        }
    
        $product->title=$request->title;
        $product->sku=$request->sku;
        $product->maincategory_id=$request->maincategory;
        $product->category_id=$request->category;
        $product->subcategory_id=$request->subcategory;
        $product->price=$request->price;
        $product->isdiscount=$request->isdiscount;
        $product->discount_price=$request->discount_price;
        $product->total_price=$request->total_price;
        $product->status=$request->status;
        $product->short_description=$request->short_description;
        $product->description=$request->description;
        $product->update();
        $pid=$product->id;

        
        $productattr =DB::table('product_attr')->where(['product_id'=>$pid])->get();
        if(count($productattr) != 0){
         
            $abf =DB::table('product_attr')->where(['product_id'=>$pid])->delete();
        }



       

        
            


        
        
        /*Product Attr Start */
        $skuArr=$request->post('sku');
        $attr_priceArr=$request->post('attr_price');
        $qtyArr=$request->post('qty');
        $size_idArr=$request->post('size_id');
        $color_idArr=$request->post('color_id');


        foreach($color_idArr as $key=>$val)
        {
            $productAttrArr['product_id']=$pid;
            $productAttrArr['attr_price']=$attr_priceArr[$key];
            $productAttrArr['qty']=$qtyArr[$key];
         if($size_idArr[$key]==''){
              $productAttrArr['size_id']=0;
           }
         else{
                $productAttrArr['size_id']=$size_idArr[$key];

  }
            if($color_idArr[$key]==''){
                $productAttrArr['color_id']=0;
            }
            else{
            $productAttrArr['color_id']=$color_idArr[$key];
            }
            


            DB::table('product_attr')->insert($productAttrArr);

        }
        
        

        



        /*Product Attr End */



        return redirect('product_list')->with('message','Product Successfully Updated');
    }

    public function delete($id){
        $product=productmodel::find($id);
        $product_attr=productattr::all();

        DB::table('product_attr')->where(['product_id'=>$id])->delete();
        $product->delete();
        return redirect('product_list')->with('message','product Successfully Deleted');


       // $data['productAttrArr']=DB::table('product_attr')->where(['product_id'=>$id])->get();



      {{
       // print_r($data['productAttrArr']);
           //  die; 
      }}
        
     //   $product->delete();
       // return redirect('product_list')->with('message','product Successfully Deleted');
    }

    public function attrdelete(Request $request, $paid,$pid){
     
        DB::table('product_attr')->where(['id'=>$paid])->delete();
        return redirect('product_edit/'.$pid);

    }

    public function deleteimage(Request $request, $piid,$pid){
       // DB::table('product_image')->where(['id'=>$piid])->delete();
        //return redirect('product_edit/'.$pid);

        $data=ProductImage::find($piid);
        $data->delete();
        $destination='uploads/productimage/'.$data->image_name;
            if(File::exists(  $destination)){
                File::delete($destination);
            }
        return redirect('product_edit/'.$pid);
    }




}
 