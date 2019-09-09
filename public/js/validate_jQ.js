
$(document).ready(function() {

$('#subtn').on("click",function(e){
    e.preventDefault();
  

 $("#frm_add_category").validate({
 	




  rules:{
 		firstname: "required",

 		lastname: "required",
 		
 		phone: {
 			     required: true,
    			 minlength: 10,
    			 maxlength: 10,
    			 digits: true

 		       },
 		
 		office: {
 			     required: true,
    			 digits: true
 		       },

 		
 		email: {
    			  required: true,
    			  email: true
   			   },
 		
 		password: {
 					required: true,
    				alphanumeric: true,
    				rangelength: [8,12]    				
 		},
 		
 		conf_password: {
    					 equalTo: "#pass"

      				   },
 		
 		category_name: {
 			   required: true,
 			   number: true

              },


 		gender: "required",
		
		"intrest[]": {
					required: true,
					minlength: 1
				   },
 		
 		abtyou: "required"
 	},

 	messages:{
 		firstname: "Please enter First Name",
 		
 		lastname: "Please enter Last Name",
 		
 		phone: {
 			     required: "Please enter Phone Number",

        		 minlength: "Please enter 10 digit Number Only",

				 maxlength: "Please enter 10 digit Number Only",

 				 number: "Please enter only number"
 		       },

 		office: {
 			      required: "Please enter Office No",
 				  digits: "Please enter only number"
				},

 		email: "Please enter valid Email Id",
 		
 		password: {
 					required: "Please enter Password",
 					rangelength: "Password range should be between 8 to 12 characters"
				  }, 

	
 		conf_password: "Password not Matching",
 		
 		category_name: {
 			   required: "Please select birthdate to enter Age",
 			   number: "Please select proper birthdate"
 			 },

     gender: "Please select gender",

 		"intrest[]":  "Please select atleast one",

 		abtyou: "Please enter details About You"

 	},




    errorPlacement: function(error, element) 
        {
            if ( element.is(":checkbox") ) 
            {
                error.insertAfter(".intresterror");
            }
            else 
            {  
                error.insertAfter( element );
            }

        },

  
 	submitHandler: function(form){
 		//form.submit();
 		alert("WELCOME!\nRegistration Successfull");
 		return false;
 		 		
 	}
 });
 });
});
 

