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

      <h1><a class="btn btn-success" href="{{ url('/machine-sub-category-master') }}">Back</a></h1>

    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Machine Sub Category</h3>
            </div>
            @foreach($data as $key)
              <form role="form" method="post" action="{{ url('/machine-sub-category-master') }}/{{$key->MachineSubcategoryId}}">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="row">
              
                        
                        <div class="form-group col-md-3">
                           <label for="MachineType">Machine Type</label>
                           <select class="form-control @error('MachineType') is-invalid @enderror" id="MachineType" name="MachineType">
                              <option value="">Select Machine Type</option>
                              @foreach($data1 as $info)
                              <option value="{{$info->MachineCategoryId}}" {{($info->MachineCategoryId == $key->MachineCategoryId) ? 'selected' : ''}}>{{$info->MachineCategoryName}}</option>
                              @endforeach
                           </select>
                           @error('MachineType')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="MachineSubcategoryName">Machine Sub Category Name</label>
                           <input type="text" class="form-control @error('MachineSubcategoryName') is-invalid @enderror" id="MachineSubcategoryName" name="MachineSubcategoryName" value="{{ $key->MachineSubcategoryName }}">
                           @error('MachineSubcategoryName')
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
