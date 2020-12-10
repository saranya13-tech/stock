<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class UserController extends Controller
{
    public function index(){
    if(Cookie::get('user_id')){
        	 return view('admin.user.list', ['users' => DB::select('select * from usersinfo ')]);

        }else{
        	 return view('login');

        }
    }
   
    public function create(){
    if(Cookie::get('user_id')){ 
        	 return view('admin.user.create', ['companys' => DB::select('select * from company '),'branchs' => DB::select('select * from branch ')]);

        }else{
        	 return view('login');

        }
    }
    public function edit($id){
    if(Cookie::get('user_id')){
       
             return view('admin.user.edit', ['companys' => DB::select('select * from company '),'branchs' => DB::select('select * from branch '),'users'=> DB::select('select * from usersinfo where user_id='.$id.' '),]);

        }else{
             return view('login');

        }
    }
     public function store(Request $request)
    {
        $data = $request->except('_token', '_method',);
       
        $data['isdeleted']="N";
        $data['updated_by']=Cookie::get('user_id');
        
         DB::table('usersinfo')->insert($data);
        

        


        
            return redirect()->route('user')->with('message', 'Create successful');
        
    }
    public function update(Request $request)
    {
        $data = $request->except('_token', '_method',);
       $data['isdeleted']="N";
        $data['updated_by']=Cookie::get('user_id');
          
        $id=request()->input('user_id');
         
         DB::table('usersinfo')->where('user_id',$id)->update($data);
        

        


        
            return redirect()->route('user')->with('message', 'Create successful');
        
    }
    public function destroy()
    {
        $id=request()->input('id');
        DB::delete('delete from usersinfo where user_id=' . $id . '');

        return redirect()->route('user')->with('message', 'Delete successful');
    }
    
}
