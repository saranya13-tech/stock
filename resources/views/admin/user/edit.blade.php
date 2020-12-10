   @extends('layouts.admin.app')

@section('content')

    <section class="content">
         
             @foreach($users as $user)
              <form action="{{ route('user.update') }}" method="post"  enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="user_id" value="{{ $user->user_id}}">
                    <div class="col-md-6">
               <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $user->name}}">
                        </div>
                      <div class="form-group">
                            <label for="name">User Name <span class="text-danger">*</span></label>
                            <input type="text" name="username" id="username" placeholder="Name" class="form-control" value="{{ $user->username}}">
                        </div>
                         <div class="form-group">
                            <label for="name">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="username" placeholder="Name" class="form-control" value="{{ $user->password}}">
                        </div>

                          <div class="form-group">
                                                <label for="categories">company <span class="text-danger">*</span></label>
                                                    <select name="company_id" id="category" class="form-control select2"  required="">
                                                     @foreach($companys as $b)
                                                             
                              <option @if($user->company_id==$b->company_id)  selected="selected" @endif   value="{{$b->company_id}} ">{{$b->companyname}}</option>
                                                            @endforeach 
                                                           
                                                           
                                                    </select>
                                            </div>
                                             <div class="form-group">
                                                <label for="categories">user <span class="text-danger">*</span></label>
                                                    <select name="user_id" id="category" class="form-control select2"  required="">
                                                     @foreach($branchs as $b)
                                                             
                             <option  @if($user->branch_id==$b->branch_id)  selected="selected" @endif value="{{$b->branch_id}} ">{{$b->branchname}}</option>
                                                            @endforeach 
                                                           
                                                           
                                                    </select>
                                            </div>
                         <div class="form-group">
                          <label for="categories">User Type<span class="text-danger">*</span></label>
                        <select name="user_type" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option @if($user->user_type=="E")  selected="selected" @endif value="E">E</option>
                         <option  @if($user->user_type=="P")  selected="selected" @endif value="P ">P</option>
                          <option   @if($user->user_type=="A")  selected="selected" @endif value="A">A</option>                                
                                                    </select>
                                            </div>
                       <div class="form-group">
                          <label for="categories">Is Active<span class="text-danger">*</span></label>
                        <select name="isactive" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option  @if($user->isactive=="Y")  selected="selected" @endif value="Y">YES</option>
                            <option @if($user->isactive=="N")  selected="selected" @endif value="N ">NO</option>                                
                                                    </select>
                                            </div>
                        
                          
                       <div class="form-group">
                          <label for="categories">Add permission<span class="text-danger">*</span></label>
                        <select name="add_permission" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option @if($user->add_permission=="Y")  selected="selected" @endif value="Y">YES</option>
                            <option @if($user->add_permission=="N")  selected="selected" @endif value="N ">NO</option>                                
                                                    </select>
                                            </div>

                      <div class="form-group">
                          <label for="categories">Edit permission<span class="text-danger">*</span></label>
                        <select name="edit_permission" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option @if($user->edit_permission=="Y")  selected="selected" @endif  value="Y">YES</option>
                            <option @if($user->edit_permission=="N")  selected="selected" @endif value="N ">NO</option>                                
                                                    </select>
                                            </div>
                                            <div class="form-group">
                          <label for="categories">Delete permission<span class="text-danger">*</span></label>
                        <select name="delete_permission" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option @if($user->delete_permission=="Y")  selected="selected" @endif value="Y">YES</option>
                            <option @if($user->delete_permission=="N")  selected="selected" @endif value="N ">NO</option>                                
                                                    </select>
                                            </div>
                      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{route('home')}}" class="btn btn-secondary">Back</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
       </form>

    @endforeach

   
    </section>

  
    @endsection