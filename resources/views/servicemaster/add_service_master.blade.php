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
      <h1><a class="btn btn-success" href="{{ url('/service-master') }}">Back</a></h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
              @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
              @endif
               <div class="box-header with-border">
                  <h3 class="box-title">Add New Service</h3>
               </div>
               <form role="form" method="post" action="{{ url('/service-master') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="box-body">
                     <div class="row">
                        <div class="form-group col-md-3">
                           <label for="MachineSerialNumber">Machine Name</label>
                           <input list="MachineSerialNumber" autocomplete="off" name="MachineSerialNumber" class="form-control" placeholder="Enter Machine Sr. no." onchange="GetRailways(this)">
                            <datalist id="MachineSerialNumber">
                              @foreach($Machines as $Machine)
                                <option value="{{$Machine->MachineSerialNumber}}"></option>
                              @endforeach
                            </datalist>
                            <input type="hidden" name="MId" id="MId">
                           @error('MachineSerialNumber')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="RailwaysZone">Railways Zone</label>
                           <input type="text" class="form-control @error('RailwaysZone') is-invalid @enderror" id="RailwaysZone" name="RailwaysZone" readonly value="{{ old('RailwaysZone') }}">
                           @error('RailwaysZone')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="DevisionName">Division Name</label>
                           <input type="text" class="form-control @error('DevisionName') is-invalid @enderror" id="DevisionName" name="DevisionName" value="{{ old('DevisionName') }}" readonly>
                           @error('DevisionName')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="ServiceLocation">Service Location</label>
                           <input type="text" class="form-control @error('ServiceLocation') is-invalid @enderror" id="ServiceLocation" name="ServiceLocation" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="{{ old('ServiceLocation') }}">
                           @error('ServiceLocation')
                              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>
                        
                      </div>
                      <div class="row">
                        
                        <div class="form-group col-md-3">
                           <label for="LetterReceivingDate">Letter Receiving Date</label>
                           <input type="Date" class="form-control @error('LetterReceivingDate') is-invalid @enderror" id="LetterReceivingDate" name="LetterReceivingDate" value="{{ old('LetterReceivingDate') }}">
                           @error('LetterReceivingDate')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="ServiceLetter">Service Letter</label>
                           <input type="file" class="form-control @error('ServiceLetter') is-invalid @enderror" id="ServiceLetter" name="ServiceLetter" value="{{ old('ServiceLetter') }}" accept=".pdf">
                           @error('ServiceLetter')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="Remark">Remark</label>
                           <textarea class="form-control @error('Remark') is-invalid @enderror" id="Remark" name="Remark">{{old('Remark')}}</textarea>
                           @error('Remark')
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

<script>
  function GetRailways(e)
   {
      var machinenumber = e.value;
       $.ajax({
         url: "/service-master/get-railways",
         type:'POST',
         data:{machinenumber : machinenumber}, 
         success: function(result)
         {
            document.getElementById('RailwaysZone').value = result['RailwaysZone'] ? result['RailwaysZone'] : '';
            document.getElementById('DevisionName').value = result['DevisionName'] ? result['DevisionName'] : '';
         }
         });
   }
</script>