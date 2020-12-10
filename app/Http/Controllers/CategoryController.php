<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class CategoryController extends Controller
{
     public function index(){
    if(Cookie::get('user_id')){
        	 return view('admin.category.list', ['category' => DB::select('select * from categorymaster where branch_id='.Cookie::get('branch_id' ).'')]);

        }else{
        	 return view('login');

        }
    }
    public function create(){
    if(Cookie::get('user_id')){
        	 return view('admin.category.create');

        }else{
        	 return view('login');

        }
    }
    public function edit($id){
    if(Cookie::get('user_id')){
       
             return view('admin.category.edit', ['categories'=> DB::select('select * from categorymaster where category_id='.$id.' '),]);

        }else{
             return view('login');

        }
    }
     public function store(Request $request)
    {
        $data = $request->except('_token', '_method',);
       

         $data['isdeleted']="N";
        $data['updated_by']=Cookie::get('user_id');
          $data['branch_id']=Cookie::get('branch_id');
         DB::table('categorymaster')->insert($data);
        

        


        
            return redirect()->route('category')->with('message', 'Create successful');
        
    }
    public function update(Request $request)
    {
        $data = $request->except('_token', '_method',);
       
        $id=request()->input('category_id');
         $data['isdeleted']="N";
        $data['updated_by']=Cookie::get('user_id');
          $data['branch_id']=Cookie::get('branch_id');
         DB::table('categorymaster')->where('category_id',$id)->update($data);
        

        


        
            return redirect()->route('category')->with('message', 'Create successful');
        
    }
    public function destroy()
    {
        $id=request()->input('id');
        DB::delete('delete from categorymaster  where category_id=' . $id . '');

        return redirect()->route('category')->with('message', 'Delete successful');
    }
}
