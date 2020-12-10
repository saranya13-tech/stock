   @extends('layouts.admin.app')

@section('content')

    <section class="content">
         
             @foreach($branchs as $branch)
              <form action="{{ route('branch.update') }}" method="post"  enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="branch_id" value="{{ $branch->branch_id}}">
                    <div class="col-md-6">
                <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="branchname" id="branchname" placeholder="Name" class="form-control" value="{{ $branch->branchname}}">
                        </div>
                      <div class="form-group">
                            <label for="name">Short Name <span class="text-danger">*</span></label>
                            <input type="text" name="shortname" id="branchname" placeholder="Name" class="form-control" value="{{ $branch->shortname}}">
                        </div>

                          <div class="form-group">
                           <label for="categories">branch <span class="text-danger">*</span></label>
                            <select name="branch_id" id="category" class="form-control select2"  required="">
                              @foreach($companys as $b)
                                                             
                               <option @if($branch->company_id==$b->company_id)  selected="selected" @endif  value="{{$b->company_id}} ">{{$b->companyname}}</option>
                                                            @endforeach 
                                                           
                                                           
                                                    </select>
                                            </div>
                          <div class="form-group">
                            <label for="name">Voucher Prefix <span class="text-danger">*</span></label>
                            <input type="text" name="vocher_prefix" id="branchname" placeholder="Name" class="form-control" value="{{ $branch->vocher_prefix}}">
                        </div>
                          <div class="form-group">
                            <label for="name">Address 1 <span class="text-danger">*</span></label>
                            <input type="text" name="address1" id="branchname" placeholder="Address 1" class="form-control" value="{{ $branch->address1}}">
                        </div> <div class="form-group">
                            <label for="name">Address 2 <span class="text-danger">*</span></label>
                            <input type="text" name="address2" id="branchname" placeholder="Address 2" class="form-control" value="{{ $branch->address2}}">
                        </div> <div class="form-group">
                            <label for="name">Address 3 <span class="text-danger">*</span></label>
                            <input type="text" name="address3" id="branchname" placeholder="Address 3" class="form-control" value="{{ $branch->address3}}">
                        </div>
                        
                         <div class="form-group">
                            <label for="name">Mobile <span class="text-danger">*</span></label>
                            <input type="text" name="mob_no" id="branchname" placeholder="Address 3" class="form-control" value="{{ $branch->mob_no}}">
                        </div>
                       <div class="form-group">
                                                <label for="categories">Bank Enabled<span class="text-danger">*</span></label>
                        <select name="isbank_enable" id="category" class="form-control select2"  required="">
                                                                                                               
                         <option @if($branch->isbank_enable=="Y")  selected="selected" @endif value="Y">YES</option>
                            <option @if($branch->isbank_enable=="N")  selected="selected" @endif value="N ">NO</option>                                
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