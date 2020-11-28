@include('layouts.header')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="{{ url('/engineerperformance') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Engineer Performance</h3>
            </div>
            @foreach($performancedetails as $key)
              <form role="form" method="post" action="{{ url('/engineerperformance') }}/{{$key->PerformanceId}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="row">
                    
                        <div class="form-group col-md-3">
                           <label for="EngineerId">Engineer Name</label>
                           <select class="form-control @error('EngineerId') is-invalid @enderror" id="EngineerId" name="EngineerId">
                              <option value="">Select Designation</option>
                              @foreach($performancedetails as $info)
                              <option value="{{$info->EngineerId}}" {{($info->EngineerId == $key->EngineerId) ? 'selected' : ''}}>{{$info->EngineerName}}</option>
                              @endforeach
                           </select>
                           @error('EngineerName')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                       <div class="form-group col-md-3">
                           <label for="MachineDependent">Machine Dependent</label>
                           <select class="form-control @error('MachineDependent') is-invalid @enderror" id="MachineDependent" name="MachineDependent">
                              <option value="">Select dependent</option>
                             
                               <option value="Independent" {{($key->MachineDependent =='Independent' ) ? 'selected' : ''}}>Independent</option>
                                <option value="Dependent"{{($key->MachineDependent == 'Dependent' ) ? 'selected' : ''}}>Dependent</option>
                           </select>
                           @error('MachineDependent')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>



                         <div class="form-group col-md-3">
                           <label for="ReviewPoints">Review Points</label>
                           <select class="form-control @error('ReviewPoints') is-invalid @enderror" id="ReviewPoints" name="ReviewPoints">
                              <option value="">Select Review Points</option>                              
                               @for($i = 1; $i < 6; $i++)
                                <option value="{{$i}}" {{($key->ReviewPoints ==$i)?'selected':''}} >{{$i}}</option>
                              @endfor
                           </select>
                           @error('ReviewPoints')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="Punctuality">Punctuality</label>
                           <input type="text" class="form-control @error('Punctuality') is-invalid @enderror" id="Punctuality" name="Punctuality" value="{{$key->Punctuality}}">
                           @error('Punctuality')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="Feedback">Feedback</label>
                           <input type="text" class="form-control @error('Feedback') is-invalid @enderror" id="Feedback" name="Feedback" value="{{$key->Feedback}}">
                           @error('Feedback')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
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
