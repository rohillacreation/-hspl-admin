@include('layouts.header')
@include('layouts.sidebar')
<style type="text/css">
  strong{
    color: red;
  }
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="{{ url('/organisation-master') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Machine Category</h3>
            </div>
            <form role="form" method="post" action="{{ url('/organisation-master') }}" >
              @csrf

              <div class="box-body">
                <div class="row">
                
                        <div class="form-group col-md-3">
                           <label for="OrganisationName">Organisation Name</label>
                           <input type="text" class="form-control @error('OrganisationName') is-invalid @enderror" id="OrganisationName" name="OrganisationName" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="{{ old('OrganisationName') }}">
                           @error('OrganisationName')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
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