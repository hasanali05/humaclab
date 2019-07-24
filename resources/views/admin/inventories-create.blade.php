@extends('master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Inventory</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a type="button" class="btn btn-sm btn-secondary" href="{{ route('inventories') }}">Back</a>
    </div>
  </div>
</div>
<div class="row pt-3 pb-2 mb-3">  
	<div class="col-8 m-auto">		
		<form method="post" action="{{route('inventories')}}">
			@csrf
		    <div class="form-group">
		      <label>Product</label>
		        <select class="form-control form-white" name="product_id" onchange="prodcutChange(this)">
                    <option value="">Select product</option>
                    @foreach($products as $product)
                	<option value="{{$product->id}}">{{$product->name}}</option>
            		@endforeach
                </select>
		      <small id="emailHelp" class="form-text text-muted">Select any product.</small>
		    </div>
            <div id='variantContent'>
            </div>
		    <div class="form-group">
		      	<label>Variations (selected variations)</label>		        
            	<input id="variations" type="text" class="form-control{{ $errors->has('variations') ? ' is-invalid' : '' }}" name="variations" value=""  autofocus >
		    </div>
		    <div class="form-group">
		      	<label>Quantity</label>		        
            	<input id="qty" type="text" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}" name="qty" value=""  autofocus >
		    </div>
		    <div class="form-group">
		      	<label>Price per piece</label>		        
            	<input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value=""  autofocus >
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
        $('.bootstrap-tagsinput input').addClass('w-100 d-none');
    });

    function prodcutChange(th) {

        $('#variations').tagsinput('removeAll');
        var product_id = $(th).val();
        $.ajaxSetup(
        {
          headers:
          {'X-CSRF-Token': $('input[name="_token"]').val()}
        });

        $.ajax({
          url:"{{route('getVariants')}}",
          type:'POST',
          data:{product_id: product_id},

          success: function (data) {
            var variations = data.variations;
            $('#variantContent').html('');  
            var content = ``; 
            variations.forEach(function (element) {
                var contentVariants = ``;
                var values = element.value.split(",");
                values.forEach(function (item) {
                    contentVariants+=`
                                    <a class="btn btn-info" style="margin-left: 5px;color:white" data-value="`+item+`" data-type="`+element.name+`" onclick="variantSelect(this)">`+item+`</a>`
                }) 
            	
                content+=`<div class="form-group">
                			<label>`+element.name+`</label>	
                                <label class="col-md-4 col-form-label text-md-right"></label>                                  
                                <div class="col-md-8">
                                `+contentVariants+`
                                </div>                        
                            </div>`
            })  
            $('#variantContent').append(content);     

          }

        });
    }
    function variantSelect(th) {
        var type = $(th).data('type');
        var value = $(th).data('value');
        $('#variations').tagsinput('add', type+'-'+value);
    }
</script>
@endsection