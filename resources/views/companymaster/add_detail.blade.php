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
      <h1><a class="btn btn-success" href="{{ url('/companydetails') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Company Details</h3>
            </div>
            <form role="form" method="post" action="{{ url('/companydetails') }}" >
              @csrf

              <div class="box-body">
                <div class="row">

                        <div class="form-group col-md-3">
                           <label for="CompanyName">Company Name</label>
                           <input type="text" class="form-control @error('CompanyName') is-invalid @enderror" id="CompanyName" name="CompanyName" value="{{ old('CompanyName') }}">
                           @error('CompanyName')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="NameShown">Name Shown</label>
                           <input type="text" class="form-control @error('NameShown') is-invalid @enderror" id="NameShown" name="NameShown" value="{{ old('NameShown') }}">
                           @error('NameShown')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="CompanyLocation">Company Location</label>
                           <input type="text" class="form-control @error('CompanyLocation') is-invalid @enderror" id="CompanyLocation" name="CompanyLocation" value="{{ old('CompanyLocation') }}">
                           @error('CompanyLocation')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>


                        <div class="form-group col-md-3">
                           <label for="CompanyCode">Company Code</label>
                           <input type="text" class="form-control @error('CompanyCode') is-invalid @enderror" id="CompanyCode" name="CompanyCode" value="{{ old('CompanyCode') }}">
                           @error('CompanyCode')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                      </div>

                      <div class="row">

                        <div class="form-group col-md-3">
                           <label for="CompanyNumber">Company Contact Number</label>
                           <input type="text" class="form-control @error('CompanyNumber') is-invalid @enderror" id="CompanyNumber" name="CompanyNumber" value="{{ old('CompanyNumber') }}">
                           @error('CompanyNumber')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        



                        <div class="form-group col-md-3">
                           <label for="GSTNumber">GST Number</label>
                           <input type="text" class="form-control @error('GSTNumber') is-invalid @enderror" id="GSTNumber" name="GSTNumber" value="{{ old('GSTNumber') }}">
                           @error('GSTNumber')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="CompanyAddress">Company Address</label>
                           
                           <textarea class="form-control @error('CompanyAddress') is-invalid @enderror" id="CompanyAddress" name="CompanyAddress">{{ old('CompanyAddress') }}</textarea>
                           @error('CompanyAddress')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <!-- <div class="form-group col-md-3">
                           <label for="NickName">Nick Name</label>
                           <input type="text" class="form-control @error('NickName') is-invalid @enderror" id="NickName" name="NickName" value="{{ old('NickName') }}">
                           @error('NickName')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div> -->

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