@extends('layouts.app')

@section('content')
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($instants as $instant)
          <x-instantCard :instant='$instant'/> 
        @endforeach
      </div>
    </div>
  </div>
@endsection
 

