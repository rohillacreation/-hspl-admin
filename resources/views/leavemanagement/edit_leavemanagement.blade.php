@include('layouts.header')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="{{ url('/leave-management') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Leaves</h3>
            </div>
            @foreach($data1 as $key)
              <form role="form" method="post" action="{{ url('/leave-management') }}/{{$key->LeaveId}}">
                <input type="hidden" name="Source" value="Web">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="row">

                        <div class="form-group col-md-3">
                           <label for="EngineerId">Engineer Name</label>
                           <select class="form-control @error('EngineerId') is-invalid @enderror" id="EngineerId" name="EngineerId">
                              <option value="">Select Engineer Name</option>
                              @foreach($data as $info)
                              <option value="{{$info->EngineerId}}" {{($info->EngineerId==$key->EngineerId) ? 'selected' : '' }}>{{$info->EngineerName}}</option>
                              @endforeach
                           </select>
                           @error('EngineerId')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="LeaveType">Leave Type</label>
                           <select class="form-control @error('LeaveType') is-invalid @enderror" id="LeaveType" name="LeaveType" >
                              <option value="">Select Type</option>
                              <option value="EL" {{($key->LeaveType == 'EL') ? 'selected' : ''}}>Earning Leave</option>
                              <option value="SL" {{($key->LeaveType == 'SL') ? 'selected' : ''}}>Sick Leave</option>
                              <option value="PL" {{($key->LeaveType == 'PL') ? 'selected' : ''}}>Personal Leave</option>
                        
                           </select>
                           @error('LeaveType')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="FromDate">From Date</label>
                           <input type="Date" class="form-control @error('FromDate') is-invalid @enderror" id="FromDate" name="FromDate" value="{{ $key->FromDate }}"  >
                           
                           @error('FromDate')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="ToDate">To Date</label>
                           <input type="Date" class="form-control @error('ToDate') is-invalid @enderror" id="ToDate" name="ToDate" value="{{ $key->ToDate }}"  >                          
                           @error('ToDate')
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
