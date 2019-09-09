
@extends('layouts.templates')
  

@section('title')
 
  Create Product
@endsection

@section('content')




     <div class="section content_section">
	<div class="container">
		<div class="filable_form_container">
			<div class="form_container_block">
       

         {{ Form::open(array('id'=>'frm_add_product', 'data-parsley-validate', 'url'=>route('insert_product') ,'method'=>'post', 'enctype'=>'multipart/form-data')) }}



				<ul>
					<li class="fileds">
						<div class="name_fileds">
							<label>Product Name<span style="color:red">*</span></label>
							<input name="product_name" type="text" value={{old('product_name')}}> 

						 <p style='color:red;font-size:16px;'>{{ $errors->first('product_name') }}</p>	
						</div>
					</li>
					<li class="fileds">
						<div class="name_fileds">
							<label>Product Price<span style="color:red">*</span></label>
							<input name="product_price" type="text" value={{old('product_price') }}>
							 <p style='color:red;font-size:16px;'>{{ $errors->first('product_price') }}</p> 
						</div>
					</li>
					<li class="fileds">
						<div class="upload_fileds">
							<label>Upload Image</label>

							<input id="product_image" name="product_image" type="file" placeholder="Choose File" class="mandatory_fildes" value={{old('product_image') }}>
							 <p style='color:red;font-size:16px;'>{{ $errors->first('product_image') }}</p>
						</div>						
					</li>
					<li class="fileds">
						<div class="name_fileds">
							<label>Select Category<span style="color:red">*</span></label>
							
							<select name="category" class="form-control" style="width:350px;" onchange="category_value(this)">
              <option value=''>Select</option>

            @foreach($categories as $category)
                <option value="{{ $category->id}}" {{old("category") == $category->id ? "selected" :"" }}>{{ $category->category_name }}</option>
			@endforeach				          
			
							</select>
							 <p style='color:red;font-size:16px;'>{{ $errors->first('category') }}</p>
						</div>
					</li>
				</ul>
				<div class="next_btn_block">
					<div class="next_btn">
					<button type="submit" class="submitbt" name="submit">Submit   <span><img src="images/small_triangle.png" alt="small_triangle"> </button> 
					</div>
				</div>
					
		{{ Form::close() }}
	
			</div>
		</div>
	</div>		
  </div>
 

  <script src="{{ asset('css/parsleycss.css') }}"></script>
  <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
 

@endsection