<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
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
    public function opening_stock(){
    if(Cookie::get('user_id')){
             return view('admin.product.opening_stock', ['products' => DB::select('select item_id,item_name,opening_stock from itemmaster where branch_id='.Cookie::get('branch_id' ).' ')]);

        }else{
             return view('login');

        }
    }
    public function track_stock(){
    if(Cookie::get('user_id')){
      $list= DB::select('select  a.item_id,a.created_at,a.quantity,a.type,b.item_name from stock a join itemmaster b on a.item_id=b.item_id where b.branch_id='.Cookie::get('branch_id' ).'');
          $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $productCollection = collect($list);
        $perPage = 15;
        $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedproducts = new LengthAwarePaginator($currentPageproducts, count($productCollection), $perPage);
        
            $paginatedproducts->setPath(request()->url());
        
    return view('admin.product.track_stock', ['report' => $paginatedproducts, 'date' => '']);

        }else{
             return view('login');

        }
    }
    public function track(){
    if(Cookie::get('user_id')){
      $date_from = request()->input('date_from');
            $date_to = request()->input('date_to');
            $from = $date_from;
            $to = $date_to;
            $date = array('date1' => $date_from,
                'date2' => $date_to);
             $list= DB::select('select a.item_id,a.created_at,a.quantity,a.type,b.item_name from stock a join itemmaster b on a.item_id=b.item_id where b.branch_id='.Cookie::get('branch_id' ).' and date(a.created_at) >= "' . $from . '" and  date(a.created_at) <= "' . $to . '" ');
          $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $productCollection = collect($list);
        $perPage = 15;
        $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedproducts = new LengthAwarePaginator($currentPageproducts, count($productCollection), $perPage);
        
            $paginatedproducts->setPath(request()->url());
        
    return view('admin.product.track_stock', ['report' => $paginatedproducts , 'date' => $date ]);

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
     $type =  request()->input('type');
     
      $balance = DB::select('select balance_stock from itemmaster where item_id=' . $item . ' ');
                        foreach ($balance as $t) {
                          if($type=="Sales_return"){

                            $b = $t->balance_stock + number_format($balance_stock);
                          }
                          else if($type=="Purchase"){

                            $b = $t->balance_stock + number_format($balance_stock);
                          }
                           else if($type=="Dead_Stock"){
                            
                            $b = $t->balance_stock - number_format($balance_stock);
                          }
                           else if($type=="decrement"){
                            
                            $b = $t->balance_stock - number_format($balance_stock);
                          }
                        }
           $d=array(
          'item_id'=>$item,
          'updated_by'=>Cookie::get('user_id'),
          'quantity'=>$balance_stock,
          'type'=>$type);
         DB::table('stock')->insert($d);
         
        DB::update('update itemmaster set balance_stock='.$b.' where item_id='.$item.'');
        
return json_encode($d);
      //   return redirect()->route('stock')
      //       ->with('message', 'Update successful');
        }
         public function update2()
    {
    
    $item =  request()->input('item');
    $balance_stock =  request()->input('stock');
     
     
      $balance = DB::select('select opening_stock from itemmaster where item_id=' . $item . ' ');
                        foreach ($balance as $t) {
                          if($t->opening_stock==0){

                            $b = $balance_stock ;
                          }
                          else{
                             $b = $t->opening_stock;
                          }
                          
                        }
           $d=array(
          'item_id'=>$item,
          'updated_by'=>Cookie::get('user_id'),
          'quantity'=>$b,
          'type'=>'opening_stock');
         DB::table('stock')->insert($d);
         
        DB::update('update itemmaster set opening_stock='.$b.',balance_stock='.$b.' where item_id='.$item.'');
        
return json_encode($d);
      //   return redirect()->route('stock')
      //       ->with('message', 'Update successful');
        }
}
