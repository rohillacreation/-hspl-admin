@include('layouts.header')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="{{ url('/engineer-asset') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Engineer Asset</h3>
            </div>
            @foreach($data as $key)
              <form role="form" method="post" action="{{ url('/engineer-asset') }}/{{$key->AssetId}}">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="row">

                         <div class="form-group col-md-3">
                           <label for="EngineerId">Engineer Name</label>
                           <select class="form-control @error('EngineerId') is-invalid @enderror" id="EngineerId" name="EngineerId">
                              <option value="">Select Engineer Name</option>
                              @foreach($data1 as $info)
                              <option value="{{$info->EngineerId}}" {{($info->EngineerId == $key->EngineerId) ? 'selected' : ''}}>{{$info->EngineerName}}</option>
                              @endforeach
                           </select>
                           @error('EngineerId')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                       
                        <div class="form-group col-md-3">
                           <label for="AssetCategoryId">Asset Category Name</label>
                           <select class="form-control @error('AssetCategoryId') is-invalid @enderror" id="AssetCategoryId" name="AssetCategoryId">
                              <option value="">Select Asset Category Name</option>
                              @foreach($data2 as $key1)
                              <option value="{{$key1->AssetCategoryId}}" {{($key1->AssetCategoryId == $key->AssetCategoryId) ? 'selected' : '' }} >{{$key1->AssetCategoryName}}</option>
                              @endforeach
                           </select>
                           @error('AssetCategoryId')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="AssignDate">Assign Date</label>
                           <input type="Date" class="form-control @error('AssignDate') is-invalid @enderror" id="AssignDate" name="AssignDate" value="{{ $key->AssignDate }}"  >
                           @error('AssignDate')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="ItemSerialNo">Item Serial No</label>
                           <input type="text" class="form-control @error('ItemSerialNo') is-invalid @enderror" id="ItemSerialNo" name="ItemSerialNo" value="{{ $key->ItemSerialNo }}"  >
                           @error('ItemSerialNo')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                    </div>
                    
                    <div class="row">    

                        <div class="form-group col-md-3">
                           <label for="ItemDescription">Item Description</label>
                           <input type="text" class="form-control @error('ItemDescription') is-invalid @enderror" id="ItemDescription" name="ItemDescription" value="{{ $key->ItemDescription }}"  >
                           @error('ItemDescription')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="ItemPrice">Item Price</label>
                           <input type="text" class="form-control @error('ItemPrice') is-invalid @enderror" id="ItemPrice" name="ItemPrice" onkeypress="return /[0-9]/i.test(event.key)" value="{{ $key->ItemPrice }}"  >
                           @error('ItemPrice')
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
