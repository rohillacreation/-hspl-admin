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
                  <h3 class="box-title">Add New User</h3>
               </div>
               <form role="form" method="post" action="{{ url('/register') }}">
                  @csrf
                  <div class="box-body">
                     <div class="row">
                        <div class="form-group col-md-3">
                           <label for="name">First Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"  required>
                           @error('name')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="UserLastName">Last Name</label>
                           <input type="text" class="form-control" id="UserLastName" name="UserLastName">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="UserMobile">Mobile No.</label>
                           <input type="text" class="form-control" id="UserMobile" name="UserMobile">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="email">Email Id</label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                           <select class="form-control @error('UserDesignationId') is-invalid @enderror" id="UserDesignationId" name="UserDesignationId" required>
                              <option value="">Select Designation</option>
                              @foreach($data as $key)
                              <option value="{{$key->UserDesignationId}}">{{$key->UserDesignationName}}</option>
                              @endforeach
                           </select>
                            @error('UserDesignationId')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="password">Password</label>
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                           @error('password')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="password_confirmation">Confirm Password</label>
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                     </div>
                  </div>
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>
@include('layouts.footer')