@extends('master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Products</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a type="button" class="btn btn-sm btn-secondary" href="{{ route('products') }}">Back</a>
    </div>
  </div>
</div>
<div class="row pt-3 pb-2 mb-3">  
  <div class="col-8 m-auto">    

    <form method="post" action="{{route('products')}}">
      @csrf
        <div class="form-group">
            <label>Name</label>           
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value=""  autofocus >
        </div>
        <div class="form-group">
            <label>Detail</label>           
              <input id="detail" type="text" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}" name="detail" value=""  autofocus >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection

@section('js')
@endsection