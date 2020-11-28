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
              <h3 class="box-title">Add User Designation</h3>
            </div>
            <form role="form" method="post" action="{{ url('/user-designations') }}">
              @csrf
              <div class="box-body">
                <div class="row">
                  
                  <div class="form-group col-md-3">
                    <label for="UserDesignationName">Designation Name</label>
                    <input type="text" class="form-control @error('UserDesignationName') is-invalid @enderror" id="UserDesignationName" name="UserDesignationName" onkeypress="return /[A-Za-z ()]/i.test(event.key)" value="{{ old('UserDesignationName') }}" >
                    @error('UserDesignationName')
                      <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                      </span> 
                    @enderror
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