
@extends('layouts.templates')
  

@section('title')
 
  Edit Category
@endsection

@section('content')
   <div class="section content_section">
	<div class="container">
		<div class="filable_form_container">
			<div class="form_container_block">
				<ul>
					<li class="fileds">
						<div class="name_fileds">
					
        
        

                 

         {{ Form::open(array('id'=>'frm_edit_category', 'data-parsley-validate','url'=>route('update_category',[$category->id]), 'method'=>'post')) }}
			
            
				{!! Form::Label('CategoryName', 'Category Name', ['class'=>'required']) !!}


    		 {!! Form::text('category_name', $category->category_name ,['placeholder'=>'Enter Category Name', 'id'=>'category_name', 'data-parsley-required data-parsley-pattern="^[a-zA-Z]+$"']) !!}
         

                @foreach($errors->all() as $error)
                 <p style='color:red;font-size:16px;'>{{$error}}</p>
                @endforeach


 
					       <span id='error_msg' style="color:red;font-family: Arial bold;font-size:18px;"></span>
						</div>
					</li>

				</ul>
				<div class="next_btn_block">
					<div class="next_btn">

				 <button type="submit" name="submit" class="submitbt">Submit   <span><img src="images/small_triangle.png" alt="small_triangle"> </button> 
					<!--	Submit  <span><img src="images/small_triangle.png" alt="small_triangle"> </span>
					-->	

		 {{ Form::close() }}




					
					</div>
				</div>
			</div>
		</div>
	</div>		
  </div>

  <script src="{{ asset('css/parsleycss.css') }}"></script>
  <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
  <script type="text/javascript">

</script>


@endsection