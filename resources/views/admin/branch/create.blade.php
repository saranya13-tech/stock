@extends('layouts.admin.app')

@section('content')
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content ">
        @include('layouts.errors-and-messages')
        <div class="box " style="margin-left: 30px;">
            <form action="{{ route('branch.store') }}"  onsubmit="return checking();" method="post" class="form" enctype="multipart/form-data" >
                <div class="box-body row">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>branch</h2>
                       
                        
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="branchname" id="branchname" placeholder="Name" class="form-control" value="{{ old('name') }}">
                        </div>
                      <div class="form-group">
                            <label for="name">Short Name <span class="text-danger">*</span></label>
                            <input type="text" name="shortname" id="branchname" placeholder="Name" class="form-control" value="{{ old('name') }}">
                        </div>

                          <div class="form-group">
                                                <label for="categories">company <span class="text-danger">*</span></label>
                                                    <select name="company_id" id="category" class="form-control select2"  required="">
                                                     @foreach($companys as $b)
                                                             
                                                            <option  value="{{$b->company_id}} ">{{$b->companyname}}</option>
                                                            @endforeach 
                                                           
                                                           
                                                    </select>
                                            </div>
                          <div class="form-group">
                            <label for="name">Voucher Prefix <span class="text-danger">*</span></label>
                            <input type="text" name="vocher_prefix" id="branchname" placeholder="Name" class="form-control" value="{{ old('gstin') }}">
                        </div>
                          <div class="form-group">
                            <label for="name">Address 1 <span class="text-danger">*</span></label>
                            <input type="text" name="address1" id="branchname" placeholder="Address 1" class="form-control" value="{{ old('gstin') }}">
                        </div> <div class="form-group">
                            <label for="name">Address 2 <span class="text-danger">*</span></label>
                            <input type="text" name="address2" id="branchname" placeholder="Address 2" class="form-control" value="{{ old('gstin') }}">
                        </div> <div class="form-group">
                            <label for="name">Address 3 <span class="text-danger">*</span></label>
                            <input type="text" name="address3" id="branchname" placeholder="Address 3" class="form-control" value="{{ old('gstin') }}">
                        </div>
                        
                         <div class="form-group">
                            <label for="name">Mobile <span class="text-danger">*</span></label>
                            <input type="text" name="mob_no" id="branchname" placeholder="Address 3" class="form-control" value="{{ old('mob_no') }}">
                        </div>
                       <div class="form-group">
                                                <label for="categories">Bank Enabled<span class="text-danger">*</span></label>
                        <select name="isbank_enable" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option  value="Y">YES</option>
                            <option  value="N ">NO</option>                                
                                                    </select>
                                            </div>
                        
                       
                         
                      
                        
                        
                     
                       
                    
                    
                     
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <br>
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