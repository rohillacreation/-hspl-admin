@include('layouts.header')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1><a class="btn btn-success" href="{{ url('/AllUsers') }}">Back</a></h1>

    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User Details</h3>
            </div>
            @foreach($data as $key)
              <form role="form" method="post" action="{{ url('/update') }}/{{$key->id}}">
                @csrf
                <div class="box-body">
                  <div class="row">
                    <!-- <div class="form-group col-md-3">
                      <label for="UserDesignationName">Designation Name</label>
                      <input type="text" class="form-control @error('UserDesignationName') is-invalid @enderror" id="UserDesignationName" name="UserDesignationName" value="{{ $key->UserDesignationName }}" >
                      @error('UserDesignationName')
                        <span class="invalid-feedback" role="alert">
                          <strong style="color: red">{{ $message }}</strong>
                        </span> 
                      @enderror
                    </div>
                  </div>
                </div> -->

                <div class="form-group col-md-3">
                           <label for="name">First Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $key->name }}"  required>
                           @error('name')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="UserLastName">Last Name</label>
                           <input type="text" class="form-control" id="UserLastName" name="UserLastName" value=" {{ $key->UserLastName}} ">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="UserMobile">Mobile No.</label>
                           <input type="text" class="form-control" id="UserMobile" name="UserMobile" value=" {{ $key->UserMobile}} ">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="email">Email Id</label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $key->email }}" required autocomplete="email">
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="UserDesignationId">Designation
                           </label>
                           <!-- <input type="text" class="form-control" id="UserDesignationId" name="UserDesignationId"> -->
                           <select class="form-control" id="UserDesignationId" name="UserDesignationId" required>
                              <option value="">Select Designation</option>
                               @foreach($data1 as $info) 
                              <option value="{{$info->UserDesignationId}}" {{($info->UserDesignationId == $key->UserDesignationId) ? 'selected' : ''}}>{{$info->UserDesignationName}}</option>
                               @endforeach
                           </select>
                        </div>
                        
                     </div>
                  </div>
                   
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </div>
@include('layouts.footer')
