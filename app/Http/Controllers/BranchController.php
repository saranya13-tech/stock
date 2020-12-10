<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class BranchController extends Controller
{
    public function index(){
    if(Cookie::get('user_id')){
           return view('admin.branch.list', ['branchs' => DB::select('select * from branch ')]);

        }else{
           return view('login');

        }
    }
    public function update(Request $request)
    {
      $id=$request->input('branch_id');
        $data=$request->except('_token','_method');
        
        
        DB::table('branch')->where('branch_id',$id)->update($data);
        return redirect()->route('branch')->with('message', 'Create successful');
    }

    public function create(){
    if(Cookie::get('user_id')){
             return view('admin.branch.create', ['companys' => DB::select('select * from company ')]);

        }else{
             return view('login');

        }
    }
    public function edit($id){
    if(Cookie::get('user_id')){
       
             return view('admin.branch.edit', ['branchs' => DB::select('select * from branch where branch_id='.$id.''),'companys' => DB::select('select * from company ')]);

        }else{
             return view('login');

        }
    }
     public function store(Request $request)
    {
        $data = $request->except('_token', '_method',);
       
        $data['isdeleted']="N";
        $data['updated_by']=Cookie::get('user_id');
         
         DB::table('branch')->insert($data);
        

        


        
            return redirect()->route('branch')->with('message', 'Create successful');
        
    }
    
    public function destroy()
    {
        $id=request()->input('id');
        DB::delete('delete from branch where branch_id=' . $id . '');

        return redirect()->route('branch')->with('message', 'Delete successful');
    }
}
