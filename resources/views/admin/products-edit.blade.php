@extends('master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Products</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a type="button" class="btn btn-sm btn-secondary" href="{{ route('products.index') }}">Back</a>
    </div>
  </div> 
</div>
<div class="row pt-3 pb-2 mb-3"> 

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> 
  <div class="col-8 m-auto">    
<form class="form-horizontal" method="POST" action="{{route('products.update')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
 
        <div class="form-group">
            <label>Name</label>           
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$product->name}}"  autofocus >
              <input type="text" hidden="" name="id" value="{{$product->id}}">
        </div>
        <div class="form-group">
            <label>Detail</label>           
              <input id="detail" type="text" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}" name="detail" value="{{$product->detail}}"  autofocus >
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection

@section('js')
@endsection