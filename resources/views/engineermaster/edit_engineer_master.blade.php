@include('layouts.header')
@include('layouts.sidebar')
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
              <h3 class="box-title">Edit Engineer Master</h3>
            </div>
            @foreach($data as $key)
              <form role="form" method="post" action="{{ url('/engineer-master') }}/{{$key->EngineerId}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="row">

                        <div class="form-group col-md-3">
                           <label for="EngineerName">Name</label>
                           <input type="text" class="form-control @error('EngineerName') is-invalid @enderror" id="EngineerName" name="EngineerName" value="{{ $key->EngineerName }}" onkeypress="return /[A-Za-z ]/i.test(event.key)"  >
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
                              <option value="{{$info->EngineerDesignationId}}" {{($info->EngineerDesignationId == $key->EngineerDesignation) ? 'selected' : ''}}>{{$info->EngineerDesignationName}}</option>
                              @endforeach
                           </select>
                           @error('EngineerDesignation')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EngineerQualification">Qualification</label>
                           <input type="text" class="form-control @error('EngineerQualification') is-invalid @enderror" id="EngineerQualification" name="EngineerQualification" onkeypress="return /[A-Za-z ().]/i.test(event.key)" value="{{ $key->EngineerQualification }}"  >
                           @error('EngineerQualification')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EngineerMobile">Mobile</label>
                           <input type="text" class="form-control @error('EngineerMobile') is-invalid @enderror" id="EngineerMobile" name="EngineerMobile" onkeypress="return /[0-9]/i.test(event.key)" value="{{ $key->EngineerMobile }}"  >
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
                           <input type="text" class="form-control @error('EngineerEmail') is-invalid @enderror" id="EngineerEmail" name="EngineerEmail" value="{{ $key->EngineerEmail }}"  >
                           @error('EngineerEmail')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <!-- <div class="form-group col-md-3">
                           <label for="EngineerPassword">Password</label>
                           <input type="text" class="form-control @error('EngineerPassword') is-invalid @enderror" id="EngineerPassword" name="EngineerPassword" value="{{ $key->EngineerPassword }}">
                           @error('EngineerPassword')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div> -->

                        <div class="form-group col-md-3">
                           <label for="EngineerPermanentAddress">Permanent Address</label>
                           
                           <textarea class="form-control @error('EngineerPermanentAddress') is-invalid @enderror" id="EngineerPermanentAddress" name="EngineerPermanentAddress"   >{{ $key->EngineerPermanentAddress }}</textarea>
                           @error('EngineerPermanentAddress')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EngineerCurrentAddress">Current Address</label>
                           
                           <textarea class="form-control @error('EngineerCurrentAddress') is-invalid @enderror" id="EngineerCurrentAddress" name="EngineerCurrentAddress"  >{{ $key->EngineerCurrentAddress }}</textarea>
                           @error('EngineerCurrentAddress')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        
                        <div class="form-group col-md-3">
                           <label for="EngineerDocuments">Documents</label>
                           <input type="file" class="form-control @error('EngineerDocuments') is-invalid @enderror" id="EngineerDocuments" name="EngineerDocuments" value="{{ $key->EngineerDocuments }}" accept=".pdf">
                           @error('EngineerDocuments')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                    </div>

                    <div class="row">
                      
                        

                        <div class="form-group col-md-3">
                           <label for="ProfilePic">Profile Pic</label>
                           <input type="file" class="form-control @error('ProfilePic') is-invalid @enderror" id="ProfilePic" name="ProfilePic" value="{{$key->ProfilePic}}">
                           @error('ProfilePic')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                         <div class="form-group col-md-3">
                           <label for="EngineerTotalLeaves">Total Leaves</label>
                           <input type="text" class="form-control @error('EngineerTotalLeaves') is-invalid @enderror" id="EngineerTotalLeaves" name="EngineerTotalLeaves" onkeypress="return /[0-9]/i.test(event.key)" value="{{ $key->EngineerTotalLeaves }}"  >
                           @error('EngineerTotalLeaves')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EarningLeave">Earning Leave</label>
                           <input type="text" class="form-control @error('EarningLeave') is-invalid @enderror" id="EarningLeave" name="EarningLeave" onkeypress="return /[0-9]/i.test(event.key)" value="{{ $key->EL }}" >
                           @error('EarningLeave')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="SickLeave">Sick Leave</label>
                           <input type="text" class="form-control @error('SickLeave') is-invalid @enderror" id="SickLeave" name="SickLeave" onkeypress="return /[0-9]/i.test(event.key)" value="{{ $key->SL }}" >
                           @error('SickLeave')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                      </div>

                      <div class="row">

                        

                        <div class="form-group col-md-3">
                           <label for="PersonalLeave">Personal Leave</label>
                           <input type="text" class="form-control @error('PersonalLeave') is-invalid @enderror" id="PersonalLeave" name="PersonalLeave" onkeypress="return /[0-9]/i.test(event.key)" value="{{ $key->PL }}" >
                           @error('PersonalLeave')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>


                        <div class="form-group col-md-3">
                           <label for="DocumentDescription">Document Description</label>
                           
                           <textarea class="form-control @error('DocumentDescription') is-invalid @enderror" id="DocumentDescription" name="DocumentDescription" >{{ $key->DocumentDescription }}</textarea>
                           @error('DocumentDescription')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="EmployeeId">Employee Id</label>
                           <input type="text" class="form-control @error('EmployeeId') is-invalid @enderror" id="EmployeeId" name="EmployeeId" value="{{ $key->EmployeeId }}">
                           @error('EmployeeId')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="AssignTo">Assign To</label>
                           <select class="form-control @error('AssignTo') is-invalid @enderror" id="AssignTo" name="AssignTo">
                              <option value="">Select User</option>
                              @foreach($user as $key1)
                              <option value="{{$key1->id}}" {{($key1->id == $key->AssignTo)?'selected':''}} >{{$key1->name}} {{$key1->UserLastName}}({{$key1->UserDesignationName}})</option>
                              @endforeach
                           </select>
                           @error('AssignTo')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <!-- <option value="{{$info->EngineerDesignationId}}" {{($info->EngineerDesignationId == $key->EngineerDesignation) ? 'selected' : ''}}>{{$info->EngineerDesignationName}}</option> -->

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
