@extends('layouts.admin.app')

@section('content')
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content ">
        @include('layouts.errors-and-messages')
        <div class="box " style="margin-left: 30px;">
            <form action="{{ route('products.store') }}"  onsubmit="return checking();" method="post" class="form" enctype="multipart/form-data" >
                <div class="box-body row">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Product</h2>
                       
                        <div class="form-group">
                            <label for="sku">Item Code</label>
                             <span id="errmsg1"></span>
                            <input type="text" name="item_code" id="item_code"  placeholder="xxxxx" class="form-control"  value="" > 
                        </div>
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="item_name" id="item_name" placeholder="Name" class="form-control" required="" value="{{ old('item_name') }}">
                        </div>
                      
                          
                          <div class="form-group">
                                                <label for="categories">Category <span class="text-danger">*</span></label>
                                                    <select name="category_id" id="category" class="form-control select2"  required="">
                                                     @foreach($categories as $b)
                                                             
                                                            <option  value="{{$b->category_id}} ">{{$b->category_name}}</option>
                                                            @endforeach 
                                                           
                                                           
                                                    </select>
                                            </div>
                        
                      
                         
                      
                        
                        <div class="form-group">
                            <label for="price">Product Price <span class="text-danger"></span></label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="number" name="product_price" id="product_price" placeholder="Product Price" class="form-control" value="{{ old('product_price') }}" >
                            </div>
                        </div>
                          <div class="form-group">
                            <label for="price">Purchase Price <span class="text-danger"></span></label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="number" name="purchase_price" id="purchase_price" placeholder="Purchase Price" class="form-control" value="{{ old('purchase_price') }}" >
                            </div>
                        </div>
                         <div class="form-group">
                                                <label for="sale_price">Sales Price <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <input type="number" required name="sales_price" id="sales_price" placeholder="Sale Price" class="form-control" value="{{ old('sales_price') }}" >
                                                </div>
                                            </div>
                      
                        
                      

                        
                     
                       
                     
                   
                    
                    
                  </div>
                  
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('products') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@section('js')

<script type="text/javascript">
    $('#select_all').click(function() {
   $('#branch option').prop("selected", true);

    });

 </script>
 <script type="text/javascript">

function checking(){
  var price1=$('#price').val();
  var sale1=$('#sale_price').val();
var price=parseInt(price1);
  var sale=parseInt(sale1);
 
  
  if(sale>price){
     alert("Sales Price must be less than Price");
    return false;
  
  }
else if(sale == price){
   
  
   return true;
}
else if(sale < price){
  
   return true;
}
}
 </script>
  <script>
                      ClassicEditor
                                .create( document.querySelector( '#description' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
  
  @endsection