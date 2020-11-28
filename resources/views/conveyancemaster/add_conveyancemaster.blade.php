@include('layouts.header')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="{{ url('/conveyance-master') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Conveyance</h3>
            </div>
            <form role="form" method="post" action="{{ url('/conveyance-master') }}">
              @csrf
              <div class="box-body">
                <div class="row">
                  
                  <div class="form-group col-md-3">
                    <label for="KMRange">KMRange</label>
                    <input type="text" class="form-control @error('KMRange') is-invalid @enderror" id="KMRange" name="KMRange" onkeypress="return /[0-9-]/i.test(event.key)" placeholder="Example: 0-5" value="{{ old('KMRange') }}" >
                    @error('KMRange')
                      <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                      </span> 
                    @enderror
                  </div>

                  <div class="form-group col-md-3">
                    <label for="ConveyanceAllowance">Conveyance Allowance</label>
                    <input type="text" class="form-control @error('KMRange') is-invalid @enderror" id="ConveyanceAllowance" name="ConveyanceAllowance" onkeypress="return /[0-9]/i.test(event.key)" placeholder="Example: 100" value="{{ old('ConveyanceAllowance') }}" >
                    @error('ConveyanceAllowance')
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