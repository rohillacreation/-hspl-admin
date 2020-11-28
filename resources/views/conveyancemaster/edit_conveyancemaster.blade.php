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
              <h3 class="box-title">Edit Conveyance</h3>
            </div>
            @foreach($data as $key)
              <form role="form" method="post" action="{{ url('/conveyance-master') }}/{{$key->ConveyanceId}}">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="row">

                        <div class="form-group col-md-3">
                           <label for="KMRange">KMRange</label>
                           <input type="text" class="form-control @error('KMRange') is-invalid @enderror" id="KMRange" name="KMRange" value="{{ $key->KMRange }}" onkeypress="return /[0-9-]/i.test(event.key)"  >
                           @error('KMRange')
                           <span class="invalid-feedback" role="alert">
                           <strong style="color: red">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="ConveyanceAllowance">Conveyance Allowance</label>
                           <input type="text" class="form-control @error('KMRange') is-invalid @enderror" id="ConveyanceAllowance" name="ConveyanceAllowance" onkeypress="return /[0-9]/i.test(event.key)" value="{{ $key->ConveyanceAllowance }}"  >
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
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </div>
@include('layouts.footer')
