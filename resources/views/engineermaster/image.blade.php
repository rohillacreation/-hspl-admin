@foreach($data as $key)

@if(env('APP_ENV') == 'local')
<img src="{{ asset('images/ProfilePic') }}/{{$key->ProfilePic}}" style="width: 100%;height: 8%">

@else
<img src="{{ asset('public/images/ProfilePic') }}/{{$key->ProfilePic}}" style="width: 100%;height: 8%">
@endif
@endforeach