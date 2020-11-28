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
              <h3 class="box-title">Edit Railway Division</h3>
            </div>
            @foreach($data as $key)
              <form role="form" method="post" action="{{ url('/division-master') }}/{{$key->DevisionId}}">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="row">
              
                        
                        <div class="form-group col-md-3">
                           <label for="RailwaysId">Railways Name</label>
                           <select class="form-control @error('RailwaysId') is-invalid @enderror" id="RailwaysId" name="RailwaysId">
                              <option value="">Select Railways Name</option>
                              @foreach($data1 as $info)
                              <option value="{{$info->RailwaysId}}" {{($info->RailwaysId == $key->RailwaysId) ? 'selected' : ''}}>{{$info->RailwaysZone}}</option>
                              @endforeach
                           </select>
                           @error('RailwaysId')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="DevisionName">Division Name</label>
                           <input type="text" class="form-control @error('DevisionName') is-invalid @enderror" id="DevisionName" name="DevisionName" onkeypress="return /[A-Za-z ()]/i.test(event.key)" value="{{ $key->DevisionName }}">
                           @error('DevisionName')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>   

                        <div class="form-group col-md-3">
                           <label for="Address">Address</label>
                           
                           <textarea class="form-control @error('Address') is-invalid @enderror" id="Address" name="Address">{{ $key->Address }}</textarea>
                           @error('Address')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="GST">GST</label>
                           <input type="text" class="form-control @error('GST') is-invalid @enderror" id="GST" name="GST" value="{{ $key->GST }}">
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
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </div>
@include('layouts.footer')
