@extends('layouts.templates')
  

@section('title')
 
   Select Type

@endsection

@section('content')
 




   <div class="section content_section">
	<div class="container">
			<div class="mange_buttons" style='float:left;margin-left:35%;'>
		      
				<ul>
					<li><a href="{{ url('/categorylist') }}">Category</a></li>
				
					<li><a href="{{ url('/productlist') }}" style="margin-left:20%;">Product</a></li>
				</ul>
			</div>
					
	</div>		
  </div>
		 

@endsection