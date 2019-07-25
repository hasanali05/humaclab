@extends('master')

@section('content')

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Products</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a type="button" class="btn btn-sm btn-secondary" href="{{ route('products.create') }}">Create</a>
    </div>
  </div>
</div>
<div class="row pt-3 pb-2 mb-3">  
	<div class="col-8 m-auto">		
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Detail</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@php($i=1)
				@foreach($products as $product)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$product->name}}</td>
					<td>{{$product->detail}}</td>
					<td>
				        <a class="btn btn-warning btn-icon-success" href="{{route('products.edit',$product)}}">Edit</a> | 
				        <a class="btn btn-danger btn-icon-split" href="{{route('products.delete',$product)}}">Delete</a>  
				    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('js')
@endsection