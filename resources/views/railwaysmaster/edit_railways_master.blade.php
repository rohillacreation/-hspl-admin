@include('layouts.header')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1><a class="btn btn-success" href="{{ url('/railways-master') }}">Back</a></h1>

    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Machine Category</h3>
            </div>
            @foreach($data as $key)
              <form role="form" method="post" action="{{ url('/railways-master') }}/{{$key->RailwaysId}}">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="row">
              

                        <div class="form-group col-md-3">
                           <label for="RailwaysZone">Railways Zone</label>
                           <input type="text" class="form-control @error('RailwaysZone') is-invalid @enderror" id="RailwaysZone" name="RailwaysZone" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="{{ $key->RailwaysZone }}">
                           @error('RailwaysZone')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="RailwaysCode">Railways Code</label>
                           <input type="text" class="form-control @error('MachineCategoryName') is-invalid @enderror" id="RailwaysCode" name="RailwaysCode" onkeypress="return /[A-Za-z]/i.test(event.key)" value="{{ $key->RailwaysCode }}">
                           @error('RailwaysCode')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="RailwaysZoneHeadQuater">Railways Zone HeadQuater</label>
                           <input type="text" class="form-control @error('RailwaysZoneHeadQuater') is-invalid @enderror" id="RailwaysZoneHeadQuater" name="RailwaysZoneHeadQuater" onkeypress="return /[A-Za-z ()]/i.test(event.key)" value="{{ $key->RailwaysZoneHeadQuater }}">
                           @error('RailwaysZoneHeadQuater')
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
