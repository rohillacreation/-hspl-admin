@include('layouts.header')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="{{ url('/engineer-designation-master') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Engineer Designation</h3>
            </div>
            <form role="form" method="post" action="{{ url('/engineer-designation-master') }}">
              @csrf
              <div class="box-body">
                <div class="row">

                  <div class="form-group col-md-3">
                    <label for="EngineerDesignationName">Engineer Designation Name</label>
                    <input type="text" class="form-control @error('EngineerDesignationName') is-invalid @enderror" id="EngineerDesignationName" name="EngineerDesignationName" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="{{ old('EngineerDesignationName') }}" >
                    @error('EngineerDesignationName')
                      <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                      </span> 
                    @enderror
                  </div>

                  <div class="form-group col-md-3">
                    <label for="EngineerDesignationTA">Engineer Designation TA</label>
                    <input type="text" class="form-control @error('EngineerDesignationTA') is-invalid @enderror" id="EngineerDesignationTA" name="EngineerDesignationTA" onkeypress="return /[0-9.]/i.test(event.key)" value="{{ old('EngineerDesignationTA') }}" >
                    @error('EngineerDesignationTA')
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