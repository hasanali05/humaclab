@extends('master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Variations</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a type="button" class="btn btn-sm btn-secondary" href="{{ route('variations') }}">Back</a>
    </div>
  </div>
</div>
<div class="row pt-3 pb-2 mb-3">  
	<div class="col-8 m-auto">		

		<form method="post" action="{{route('variations.update')}}">
			@csrf
		    <div class="form-group">
		      <label>Product</label>
		      <input type="text" hidden="" name="id" value="{{$variation->id}}">
		        <select class="form-control form-white" name="product_id">
                    <option value="">Select product</option>
                    @foreach($products as $product)
                	<option value="{{$product->id}}" {{$product->id==$variation->product_id? 'selected':''}}>{{$product->name}}</option>
            		@endforeach
                </select>
		      <small id="emailHelp" class="form-text text-muted">Select any product.</small>
		    </div>
		    <div class="form-group">
		      	<label>Name</label>		        
            	<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$variation->name}}"  autofocus >
		      <small id="emailHelp" class="form-text text-muted">Variation name. eg: size, color, set ....</small>
		    </div>
		    <div class="form-group">
		      	<label>Value</label>		        
            	<input id="value" type="text" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" name="value" value="{{$variation->value}}"  autofocus data-role="tagsinput">
		      <small id="emailHelp" class="form-text text-muted">Add any seperate by comma.</small>
		    </div>
		    <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#variations').tagsinput();
        $('.bootstrap-tagsinput input').addClass('w-100');

    });
</script>
@endsection