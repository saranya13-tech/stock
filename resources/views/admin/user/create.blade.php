@extends('layouts.admin.app')

@section('content')
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content ">
        @include('layouts.errors-and-messages')
        <div class="box " style="margin-left: 30px;">
            <form action="{{ route('user.store') }}"  onsubmit="return checking();" method="post" class="form" enctype="multipart/form-data" >
                <div class="box-body row">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>USER</h2>
                       
                        
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                        </div>
                      <div class="form-group">
                            <label for="name">User Name <span class="text-danger">*</span></label>
                            <input type="text" name="username" id="branchname" placeholder="Name" class="form-control" value="{{ old('name') }}">
                        </div>
                         <div class="form-group">
                            <label for="name">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="branchname" placeholder="Name" class="form-control" value="{{ old('name') }}">
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
                                                <label for="categories">branch <span class="text-danger">*</span></label>
                                                    <select name="branch_id" id="category" class="form-control select2"  required="">
                                                     @foreach($branchs as $b)
                                                             
                                                            <option  value="{{$b->branch_id}} ">{{$b->branchname}}</option>
                                                            @endforeach 
                                                           
                                                           
                                                    </select>
                                            </div>
                         <div class="form-group">
                          <label for="categories">User Type<span class="text-danger">*</span></label>
                        <select name="user_type" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option  value="E">E</option>
                         <option  value="P ">P</option>
                          <option  value="A">A</option>                                
                                                    </select>
                                            </div>
                       <div class="form-group">
                          <label for="categories">Is Active<span class="text-danger">*</span></label>
                        <select name="isactive" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option  value="Y">YES</option>
                            <option  value="N ">NO</option>                                
                                                    </select>
                                            </div>
                        
                          
                       <div class="form-group">
                          <label for="categories">Add permission<span class="text-danger">*</span></label>
                        <select name="add_permission" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option  value="Y">YES</option>
                            <option  value="N ">NO</option>                                
                                                    </select>
                                            </div>

                      <div class="form-group">
                          <label for="categories">Edit permission<span class="text-danger">*</span></label>
                        <select name="edit_permission" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option  value="Y">YES</option>
                            <option  value="N ">NO</option>                                
                                                    </select>
                                            </div>
                                            <div class="form-group">
                          <label for="categories">Delete permission<span class="text-danger">*</span></label>
                        <select name="delete_permission" id="category" class="form-control select2"  required="">
                                                                                                               
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