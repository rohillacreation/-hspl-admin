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
      <h1><a class="btn btn-success" href="{{ url('/engineerperformance') }}">Back</a></h1>
    </section>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Engineer</h3>
            </div>
            <form role="form" method="post" action="{{ url('/engineerperformance') }}" enctype="multipart/form-data">
              @csrf
                <!-- <input type="hidden" name="Source" value="Web"> -->
              <div class="box-body">
                <div class="row">
                     
                        <div class="form-group col-md-3">
                           <label for="EngineerId">Engineer Name</label>
                           <select class="form-control @error('EngineerId') is-invalid @enderror" id="EngineerId" name="EngineerId">
                              <option value="">Select Engineer</option>
                              @foreach($data as $info)
                              <option value="{{$info->EngineerId}}" {{($info->EngineerId == old('EngineerId'))?'selected':''}} >{{$info->EngineerName}}</option>
                              @endforeach
                           </select>
                           @error('EngineerId')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="MachineDependent">Machine Dependent</label>
                           <select class="form-control @error('MachineDependent') is-invalid @enderror" id="MachineDependent" name="MachineDependent">
                              <option value="">Select dependent</option>
                              <!-- @foreach($data as $info)
                              <option value="{{$info->EngineerId}}">{{$info->MachineDependent}}</option>
                               @endforeach -->
                               <option value="Independent" {{('Independent' ==old('MachineDependent'))?'selected':''}} >Independent</option>
                                <option value="Dependent" {{('Dependent' ==old('MachineDependent'))?'selected':''}}>Dependent</option>
                           </select>
                           @error('MachineDependent')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>



                         <div class="form-group col-md-3">
                           <label for="ReviewPoints">Review Points</label>
                           <select class="form-control @error('ReviewPoints') is-invalid @enderror" id="ReviewPoints" name="ReviewPoints">
                              <option value="">Select Review Points</option>
                              <!-- @foreach($data as $info)
                              <option value="{{$info->EngineerId}}">{{$info->MachineDependent}}</option>
                               @endforeach -->
                               @for($i = 1; $i < 6; $i++)
                                <option value="{{$i}}" {{($i == old('ReviewPoints')) ? 'selected' : ''}} >{{$i}}</option>
                              @endfor
                           </select>
                           @error('ReviewPoints')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                       <div class="form-group col-md-3">
                                <label for="Punctuality">Punctuality</label>
                                <input type="text" class="form-control @error('Punctuality') is-invalid @enderror" id="Punctuality" name="Punctuality" value="{{ old('Punctuality') }}">
                                 @error('Punctuality')
                                 <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                 @enderror
                                 </div>
                              </div>

                       <div class="form-group col-md-3">
                                <label for="Feedback">Feedback</label>
                                <input type="text" class="form-control @error('Feedback') is-invalid @enderror" id="Feedback" name="Feedback" value="{{ old('Feedback') }}">
                                 @error('Feedback')
                                 <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                 @enderror
                                 </div>
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