<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class CompanyController extends Controller
{
	public function index(){
    if(Cookie::get('user_id')){
        	 return view('admin.company.list', ['companys' => DB::select('select * from company ')]);

        }else{
        	 return view('login');

        }
    }
    public function update(Request $request)
    {
    	$id=$request->input('company_id');
        $data=$request->except('_token','_method');
        
        
        DB::table('company')->where('company_id',$id)->update($data);
        return redirect()->route('company')->with('message', 'Create successful');
    }

    public function create(){
    if(Cookie::get('user_id')){
             return view('admin.company.create');

        }else{
             return view('login');

        }
    }
    public function edit($id){
    if(Cookie::get('user_id')){
       
             return view('admin.company.edit', ['companys' => DB::select('select * from company where company_id='.$id.'')]);

        }else{
             return view('login');

        }
    }
     public function store(Request $request)
    {
        $data = $request->except('_token', '_method',);
       
        $data['isdeleted']="N";
        $data['updated_by']=Cookie::get('user_id');
         
         DB::table('company')->insert($data);
        

        


        
            return redirect()->route('company')->with('message', 'Create successful');
        
    }
    
    public function destroy()
    {
        $id=request()->input('id');
        DB::delete('delete from company where company_id=' . $id . '');

        return redirect()->route('company')->with('message', 'Delete successful');
    }

}
