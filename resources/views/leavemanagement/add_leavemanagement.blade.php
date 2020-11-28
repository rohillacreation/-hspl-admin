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
      <h1><a class="btn btn-success" href="{{ url('/leave-management') }}">Back</a></h1>
    </section>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Engineer</h3>
            </div>
            <form role="form" method="post" action="{{ url('/leave-management') }}" enctype="multipart/form-data">
              @csrf
                <input type="hidden" name="Source" value="Web">
              <div class="box-body">
                <div class="row">
                     
                        <div class="form-group col-md-3">
                           <label for="EngineerId">Engineer Name</label>
                           <select class="form-control @error('EngineerId') is-invalid @enderror" id="EngineerId" name="EngineerId">
                              <option value="">Select Engineer</option>
                              @foreach($data1 as $info)
                              <option value="{{$info->EngineerId}}">{{$info->EngineerName}}</option>
                              @endforeach
                           </select>
                           @error('EngineerId')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="LeaveType">Leave Type</label>
                           <select class="form-control @error('LeaveType') is-invalid @enderror" id="LeaveType" name="LeaveType">
                              <option value="">Select Type</option>
                              <option value="EL">Earning Leave</option>
                              <option value="SL">Sick Leave</option>
                              <option value="PL">Personal Leave</option>
                        
                           </select>
                           @error('LeaveType')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="FromDate">From Date</label>
                           <input type="Date" class="form-control @error('FromDate') is-invalid @enderror" id="FromDate" name="FromDate" value="{{ old('FromDate') }}">
                           @error('FromDate')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="ToDate">To Date</label>
                           <input type="Date" class="form-control @error('ToDate') is-invalid @enderror" id="ToDate" name="ToDate" value="{{ old('ToDate') }}">
                           @error('ToDate')
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