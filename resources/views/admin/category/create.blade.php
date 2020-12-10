@extends('layouts.admin.app')

@section('content')
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content ">
        @include('layouts.errors-and-messages')
        <div class="box " style="margin-left: 30px;">
            <form action="{{ route('category.store') }}"  onsubmit="return checking();" method="post" class="form" enctype="multipart/form-data" >
                <div class="box-body row">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Category</h2>
                       
                        
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="category_name" id="category_name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                        </div>
                      <div class="form-group">
                            <label for="name">Short Name <span class="text-danger">*</span></label>
                            <input type="text" name="shortname" id="category_name" placeholder="Name" class="form-control" value="{{ old('name') }}">
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