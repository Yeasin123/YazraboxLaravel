<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
Use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    public function index() 
    {
        $category = Category::orderBy('id','desc')->get();
        return Datatables::of($category)
        ->addColumn('action', function($category){
            $actionBtn = '<a href="'.route("addeditCategory", $category->id).'" class="edit btn btn-primary btn-sm mb-1" >Edit</a> <a href="javascript:void(0)"   class="delete btn btn-dark btn-sm " onclick="deleteId('.$category->id.')">Delete</a> ';
            return $actionBtn;
        })
        // ->addColumn('image', function ($category) {
        //     $url=asset("images/category/".$category->image); 
        //   return '<img src='.$url.' border="0" width="40" />'; 
        // })
        // ->addColumn('icon',function ($category) {
        //     $url = asset("images/category/".$category->icon);
        //     return '<img = src="'.$url.'" width="60" />';
        // })
        ->make(true);
    }

    public function addeditCategory(Request $request, $id=null){

        if ($id==null) {

            $category = new Category;
            $category =array();
        }else {
            $category= Category::find($id);
            $messsage = 'category update successfully';
        }

        // dd($category);


        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
            ]);
    
            if ($validator->fails())
            {
                return response(['errors'=>$validator->errors()->all()], 422);
            }
    
                $category->name = $request->name;
                $category->mainshop_id = $request->mainshop_id;
                // $category->slug = Str::slug($request->name);
                $category->status =  $request->status;

                if($request->has('image'))
                {
                    $imageName = rand().'.'.$request->image->getClientOriginalExtension();
                    $request->image->move(public_path('/images/category/'), $imageName);
                }

                if($request->has('icon'))
                {
                    $iconName = rand().'.'.$request->icon->getClientOriginalExtension();
                    $request->icon->move(public_path('/images/category/'), $iconName);
                }
    

                $category->image = $imageName ?? $category->image;
                $category->icon = $iconName ?? $category->icon;

                $category->save();
            
            return redirect('/');
        }

        return view('addcategory')->with(compact('category'));

    }


    public function delete(Request $request , $id){
        if($request->ajax()) {

            $finddiscount = Category::find($id);
            $finddiscount->delete();

        }
    }
}