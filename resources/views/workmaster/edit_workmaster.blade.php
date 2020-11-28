@include('layouts.header')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1><a class="btn btn-success" href="{{ url('/work-master') }}">Back</a></h1>

    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit File Name</h3>
            </div>
            @foreach($data as $key)
              <form role="form" method="post" action="{{ url('/work-master') }}/{{$key->WorkId}}">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="row">
                    
                        <div class="form-group col-md-3">
                           <label for="FileType">File Type</label>
                           <input type="text" class="form-control @error('FileType') is-invalid @enderror" id="FileType" name="FileType" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="{{ $key->WorkName }}" >
                           @error('FileType')
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
