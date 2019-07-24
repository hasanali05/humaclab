@extends('master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Inventory</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a type="button" class="btn btn-sm btn-secondary" href="{{ route('inventories.create') }}">Create</a>
    </div>
  </div>
</div>
<div class="row pt-3 pb-2 mb-3">  
	<div class="col-8 m-auto">		
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Product name</th>
					<th>Variations</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@php($i=1)
				@foreach($inventories as $inventory)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$inventory->product->name}}</td>
					<td>
						@php($values = explode(',', $inventory->variations))
						@foreach($values as $value)
							<span class="badge badge-secondary">{{$value}}</span>
						@endforeach
					</td>
					<td>{{$inventory->qty}}</td>
					<td>{{$inventory->price}}</td>
					<td>
				        <a class="btn btn-warning btn-icon-split">Edit</a> | 
				        <a class="btn btn-danger btn-icon-split">Delete</a>  
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