   @extends('layouts.admin.app')

@section('content')

    <section class="content">
         
             @foreach($companys as $company)
              <form action="{{ route('company.update') }}" method="post"  enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="company_id" value="{{ $company->company_id}}">
                 <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
             
                   
              <div class="form-group">
                <label for="inputName">Name</label>
               <input type="text" name="companyname" id="companyname" placeholder="Name" class="form-control" value="{{ $company->companyname ?: old('name') }}">
              </div>
              
               <div class="form-group">
                            <label for="name">Short Name <span class="text-danger">*</span></label>
                            <input type="text" name="shortname" id="companyname" placeholder="Name" class="form-control" value="{{ $company->shortname}}">
                        </div>
                          <div class="form-group">
                            <label for="name">GST IN <span class="text-danger">*</span></label>
                            <input type="text" name="gstin" id="companyname" placeholder="Name" class="form-control" value="{{ $company->gstin}}">
                        </div>
                          <div class="form-group">
                            <label for="name">Address 1 <span class="text-danger">*</span></label>
                            <input type="text" name="address1" id="companyname" placeholder="Address 1" class="form-control" value="{{ $company->address1}}">
                        </div> <div class="form-group">
                            <label for="name">Address 2 <span class="text-danger">*</span></label>
                            <input type="text" name="address2" id="companyname" placeholder="Address 2" class="form-control" value="{{ $company->address2}}">
                        </div> <div class="form-group">
                            <label for="name">Address 3 <span class="text-danger">*</span></label>
                            <input type="text" name="address3" id="companyname" placeholder="Address 3" class="form-control" value="{{ $company->address3}}">
                        </div>
                        
                         <div class="form-group">
                            <label for="name">Mobile <span class="text-danger">*</span></label>
                            <input type="text" name="mob_no" id="companyname" placeholder="Address 3" class="form-control" value="{{ $company->mob_no}}">
                        </div>
        
             
            </div>
          </div>
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