<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class ProductController extends Controller
{
    public function index(){
    if(Cookie::get('user_id')){
        	 return view('admin.product.list', ['products' => DB::select('select * from itemmaster where branch_id='.Cookie::get('branch_id' ).' ')]);

        }else{
        	 return view('login');

        }
    }
    public function stock(){
    if(Cookie::get('user_id')){
             return view('admin.product.stock', ['products' => DB::select('select item_id,item_name,opening_stock,balance_stock from itemmaster where branch_id='.Cookie::get('branch_id' ).' ')]);

        }else{
             return view('login');

        }
    }
    public function create(){
    if(Cookie::get('user_id')){
        	 return view('admin.product.create', ['categories' => DB::select('select * from categorymaster where branch_id='.Cookie::get('branch_id').' ')]);

        }else{
        	 return view('login');

        }
    }
    public function edit($id){
    if(Cookie::get('user_id')){
       
             return view('admin.product.edit', ['categories' => DB::select('select * from categorymaster where branch_id='.Cookie::get('branch_id').''),'products'=> DB::select('select * from itemmaster where item_id='.$id.' '),]);

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
         DB::table('itemmaster')->insert($data);
        

        


        
            return redirect()->route('products')->with('message', 'Create successful');
        
    }
    public function update(Request $request)
    {
        $data = $request->except('_token', '_method',);
       $data['isdeleted']="N";
        $data['updated_by']=Cookie::get('user_id');
          $data['branch_id']=Cookie::get('branch_id');
        $id=request()->input('item_id');
         
         DB::table('itemmaster')->where('item_id',$id)->update($data);
        

        


        
            return redirect()->route('products')->with('message', 'Create successful');
        
    }
    public function destroy()
    {
        $id=request()->input('id');
        DB::delete('delete from itemmaster where item_id=' . $id . '');

        return redirect()->route('products')->with('message', 'Delete successful');
    }
     public function update1()
    {
    
    $item =  request()->input('item');
    $balance_stock =  request()->input('stock');
    
      $balance = DB::select('select balance_stock from itemmaster where item_id=' . $item . ' ');
                        foreach ($balance as $t) {
                            $b = $t->balance_stock + number_format($balance_stock);
                        }
           $d=array(
          'item_id'=>$item,
          'updated_by'=>Cookie::get('user_id'),
          'quantity'=>$balance_stock);
         DB::table('stock')->insert($d);
        DB::update('update itemmaster set balance_stock='.$b.' where item_id='.$item.'');
        

      //   return redirect()->route('stock')
      //       ->with('message', 'Update successful');
        }
}
