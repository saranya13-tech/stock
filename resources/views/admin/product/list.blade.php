  @extends('layouts.admin.app')

@section('content')
<section class="content">
 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Products</h2>

                <div class="card-tools">
                 <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 1000px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <td >SL</td>
                      <td >Name</td>
                      <td >Item Code</td>
                      <td >Category</td>
                      <td >Purchase Price</td>
                    
                      <td >Product Price</td>
                       <td >Sale Price</td>
                     
                      <td >Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
            <tr>
                <td>{{ $product->item_id }}</td>
                <td>
                    
                        
                        {{ $product->item_name }}
                </td>
                 <td>  {{ $product->item_code }} </td>
                
                                <td>
                                   <?php   
                                   $list=DB::select("SELECT * from categorymaster where category_id= '".$product->category_id."' ");
                                   foreach($list as $l){
                                    echo $l->category_name;
                                   }
                                   ?>
                                </td>
               
                 <td>  {{ $product->purchase_price }} </td>
              
                <td>  {{ $product->product_price }} </td>
                <td>  {{$product->sales_price}}  </td>
                
                <td>
                    <form action="{{ route('products.destroy' ) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="post">
                        <input type="hidden" name="id" value="{{$product->item_id}}">
                        <div class="btn-group">
                           <a href="{{ route('products.edit', $product->item_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </section>
        @endsection