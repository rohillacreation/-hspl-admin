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
      <h1><a class="btn btn-success" href="{{ url('/division-master') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Division</h3>
            </div>
            <form role="form" method="post" action="{{ url('/division-master') }}" >
              @csrf

              <div class="box-body">
                <div class="row">

                        <div class="form-group col-md-3">
                           <label for="RailwaysId">Railways Zone</label>
                           <select class="form-control @error('RailwaysId') is-invalid @enderror" id="RailwaysId" name="RailwaysId">
                              <option value="">Select Railways Zone</option>
                              @foreach($data as $key)
                              <option value="{{$key->RailwaysId}}" {{($key->RailwaysId == old('RailwaysId'))? 'selected' : ''}}>{{$key->RailwaysZone}}</option>
                              @endforeach
                           </select>
                           @error('RailwaysId')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>
                
                        <div class="form-group col-md-3">
                           <label for="DevisionName">Division Name</label>
                           <input type="text" class="form-control @error('DevisionName') is-invalid @enderror" id="DevisionName" name="DevisionName" value="{{ old('DevisionName') }}" onkeypress="return /[A-Za-z ()]/i.test(event.key)">
                           @error('DevisionName')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="Address">Address</label>
                           
                           <textarea class="form-control @error('Address') is-invalid @enderror" id="Address" name="Address">{{ old('Address') }}</textarea>
                           @error('Address')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="GST">GST</label>
                           <input type="text" class="form-control @error('GST') is-invalid @enderror" id="GST" name="GST" value="{{ old('GST') }}">
                           @error('GST')
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