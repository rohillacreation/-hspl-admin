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
      <h1><a class="btn btn-success" href="{{ url('/engineer-master') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Engineer</h3>
            </div>
            <form role="form" method="post" action="{{ url('/engineer-master') }}" enctype="multipart/form-data">
              @csrf

              <div class="box-body">
                <div class="row">
                 
                        <div class="form-group col-md-3">
                           <label for="EngineerName">Name</label>
                           <input type="text" class="form-control @error('EngineerName') is-invalid @enderror" id="EngineerName" name="EngineerName" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="{{ old('EngineerName') }}">
                           @error('EngineerName')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        
                        <div class="form-group col-md-3">
                           <label for="EngineerDesignation">Designation</label>
                           <select class="form-control @error('EngineerDesignation') is-invalid @enderror" id="EngineerDesignation" name="EngineerDesignation">
                              <option value="">Select Designation</option>
                              @foreach($data1 as $info)
                              <option value="{{$info->EngineerDesignationId}}" {{($info->EngineerDesignationId == old('EngineerDesignation'))?'selected':''}} >{{$info->EngineerDesignationName}}</option>
                              @endforeach
                           </select>
                           @error('EngineerDesignation')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EngineerQualification">Qualification</label>
                           <input type="text" class="form-control @error('EngineerQualification') is-invalid @enderror" id="EngineerQualification" name="EngineerQualification" onkeypress="return /[A-Za-z ().]/i.test(event.key)" value="{{ old('EngineerQualification') }}">
                           @error('EngineerQualification')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EngineerMobile">Mobile</label>
                           <input type="text" class="form-control @error('EngineerMobile') is-invalid @enderror" id="EngineerMobile" name="EngineerMobile" onkeypress="return /[0-9]/i.test(event.key)" value="{{ old('EngineerMobile') }}">
                           @error('EngineerMobile')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        
                     </div>

                    <div class="row">
                    	
                    	<div class="form-group col-md-3">
                           <label for="EngineerEmail">Email</label>
                           <input type="text" class="form-control @error('EngineerEmail') is-invalid @enderror" id="EngineerEmail" name="EngineerEmail" value="{{ old('EngineerEmail') }}">
                           @error('EngineerEmail')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EngineerPassword">Password</label>
                           <input type="text" class="form-control @error('EngineerPassword') is-invalid @enderror" id="EngineerPassword" name="EngineerPassword" value="{{ old('EngineerPassword') }}">
                           @error('EngineerPassword')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EngineerPermanentAddress">Permanent Address</label>
                           
                           <textarea class="form-control @error('EngineerPermanentAddress') is-invalid @enderror" id="EngineerPermanentAddress" name="EngineerPermanentAddress">{{ old('EngineerPermanentAddress') }}</textarea>
                           @error('EngineerPermanentAddress')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EngineerCurrentAddress">Current Address</label>
                           
                           <textarea class="form-control @error('EngineerCurrentAddress') is-invalid @enderror" id="EngineerCurrentAddress" name="EngineerCurrentAddress">{{ old('EngineerCurrentAddress') }}</textarea>
                           @error('EngineerCurrentAddress')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                    </div>

                    <div class="row">
                    	
                    	<div class="form-group col-md-3">
                           <label for="EngineerDocuments">Documents</label>
                           <input type="file" class="form-control @error('EngineerDocuments') is-invalid @enderror" id="EngineerDocuments" name="EngineerDocuments" accept=".pdf">
                           <span style="color: blue">Only 1 Pdf File Upload For All Documents.</span>
                           @error('EngineerDocuments')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="ProfilePic">Profile Pic</label>
                           <input type="file" class="form-control @error('ProfilePic') is-invalid @enderror" id="ProfilePic" name="ProfilePic" accept=".jpeg,.png,.jpg,.gif,.svg'">
                           @error('ProfilePic')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EngineerTotalLeaves">Total Leaves</label>
                           <input type="text" class="form-control @error('EngineerTotalLeaves') is-invalid @enderror" id="EngineerTotalLeaves" name="EngineerTotalLeaves" onkeypress="return /[0-9]/i.test(event.key)" value="{{ old('EngineerTotalLeaves') }}">
                           @error('EngineerTotalLeaves')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EarningLeave">Earning Leave</label>
                           <input type="text" class="form-control @error('EarningLeave') is-invalid @enderror" id="EarningLeave" name="EarningLeave" onkeypress="return /[0-9]/i.test(event.key)" value="{{ old('EarningLeave') }}">
                           @error('EarningLeave')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                      </div>

                      <div class="row">

                        <div class="form-group col-md-3">
                           <label for="SickLeave">Sick Leave</label>
                           <input type="text" class="form-control @error('SickLeave') is-invalid @enderror" id="SickLeave" name="SickLeave" onkeypress="return /[0-9]/i.test(event.key)" value="{{ old('SickLeave') }}">
                           @error('SickLeave')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="PersonalLeave">Personal Leave</label>
                           <input type="text" class="form-control @error('PersonalLeave') is-invalid @enderror" id="PersonalLeave" name="PersonalLeave" onkeypress="return /[0-9]/i.test(event.key)" value="{{ old('PersonalLeave') }}">
                           @error('PersonalLeave')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>



                        <div class="form-group col-md-3">
                           <label for="DocumentDescription">Description</label>
                           
                           <textarea class="form-control @error('DocumentDescription') is-invalid @enderror" id="DocumentDescription" name="DocumentDescription">{{ old('DocumentDescription') }}</textarea>
                           @error('DocumentDescription')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        

                        <div class="form-group col-md-3">
                           <label for="EmployeeId">Employee Id</label>
                           <input type="text" class="form-control @error('EmployeeId') is-invalid @enderror" id="EmployeeId" name="EmployeeId" value="{{ old('EmployeeId') }}">
                           @error('EmployeeId')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-3">
                           <label for="AssignTo">Assign To</label>
                           <select class="form-control @error('AssignTo') is-invalid @enderror" id="AssignTo" name="AssignTo">
                              <option value="">Select User</option>
                              @foreach($user as $key)
                              <option value="{{$key->id}}" {{($key->id == old('AssignTo'))?'selected':''}} >{{$key->name}} {{$key->UserLastName}}({{$key->UserDesignationName}})</option>
                              @endforeach
                           </select>
                           @error('AssignTo')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
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