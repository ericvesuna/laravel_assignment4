@extends('layouts.templates')
  

@section('title')
 
   Product List

@endsection

@section('content')
 

   
   @if(session()->has('status'))
    
    <p align="center" style='margin-top:10px;color:red;font-size:18px;font-family:Arial;'>{{ session('status') }}</p>
    
    @php
    session()->forget('status');
    @endphp

    @endif



<script>

    $(document).ready(function () {
        $("#checkbox_All").click(function () {
         
         $(".checkbox").prop('checked', $(this).prop('checked'));
             
        });
    });
</script>


{{ Form::open(array('id'=>'frm_list_product', 'url'=>route('multiple_delete_product'), 'method'=>'post')) }}



     <div class="section content_section">
	<div class="container">
		<div class="filable_form_container">
			<div class="mange_buttons">
		       <span id='error_msg' style="color:red;font-family: Arial bold;font-size:18px;"></span>
			
				<ul>
					<!--<li class="search_div">
				 <div class="Search">
				 	<input name="search" type="text" /> 
				 	<input type="submit" class="submit" value="submit">
				 </div>
					</li>-->
					<li><a href="{{ url('/createproduct') }}">Create Product</a></li>
					<li><button type="submit" name="multiple_delete" style="background-color:#a5cf3c;height:53px;width:125px;border-radius: 6px;text-align: center;color: white;border:none;margin-right: 35%;font-size: 14px;">Delete </button></li>
				</ul>
			</div>
			<div class="table_container_block">
				<table width="100%" >
					<thead>
						<tr>
						<th width="10%" style="text-align:center;padding:10px;">
							<input type="checkbox" class="checkbox" name="checkbox[]" id="checkbox_All"> <label class="css-label mandatory_checkbox_fildes" for="checkbox_All"></label>
						</th>
						<th style="text-align:center;padding:10px;">Product Name <!--<a href="#" class="sort_icon"><img src="images/sort.png"></a>--></th>
						<th style="text-align:center;padding:10px;">Product Image</th>
						<th style="text-align:center;padding:10px;">Product Price</th>
						<th style="text-align:center;padding:10px;">Product Category <!--<a href="#" class="sort_icon"><img src="images/sort.png"></a>--></th>
						<th style="text-align:center;padding:10px;">Action</th>
						</tr>
					</thead>
					<tbody>

					@foreach($products as $product)

                      @if($product->product_image)
                        <?php $image_name= "storage/images/".$product->product_image; ?>
                      @else
                        <?php $image_name= "storage/images/noimage.jpg"; ?>   
                      @endif   

     					<tr >
							<td style="text-align:center;padding:10px;">
								<input type="checkbox" class="checkbox" name="checkbox[]" id="{{ $product->id }}" value="{{ $product->id }}" > <label class="css-label mandatory_checkbox_fildes" for="{{ $product->id }}"></label>
							</td>
							<td style="text-align:center;padding:10px;">{{ $product->product_name }}</td>
							<td style="text-align:center;padding:10px;"><img src="{{ $image_name }}" style="width:80px; height:auto;"/></td>
							<td style="text-align:center;padding:10px;">{{ $product->product_price }}</td>
							<td style="text-align:center;padding:10px;">{{ $product->category->category_name }}</td>
							<td>
								<div class="buttons" style="text-align:center;padding:10px;">
								  <a href="{{ route('single_delete_product',['id'=> $product->id]) }}" onclick="return confirm(' you want to delete?\n {{$product->product_name}} ');";  style="background-color:#fc5858;padding:7px;margin:5px;" >
								    		    <span class="glyphicon glyphicon-trash" style="color:white;"></span>
                                   </a>
								  
								   <a href="{{ route('edit_product',['id'=> $product->id]) }}" style="background-color:#7c943b;padding:7px;" >
								    <span class="glyphicon glyphicon-pencil" style="color:white;"></span>
                                   </a>
								  
								</div>								
							</td>
						</tr>

        			@endforeach	
					</tbody>
				</table>
			</div>
			
		{{ $products->links() }}
			

		</div>
	</div>		
  </div>
		 {{ Form::close() }}

@endsection