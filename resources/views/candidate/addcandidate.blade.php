@extends('layouts.teacher')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1>Add Candidate</h1>
          		</div>
          		<div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              	<li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}">Home</a></li>
		              	<li class="breadcrumb-item active">Add candidate</li>
		            </ol>
          		</div>
        	</div>
      	</div><!-- /.container-fluid -->
    </section>

    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<!-- left column -->
          		<div class="col-md-12">
            		<div class="card card-primary">
		              	<div class="card-header">
		                	<h3 class="card-title">Candidate</h3>
		              	</div>
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
			            <form method="POST" action="{{ route('insertcandidate') }}" enctype="multipart/form-data" id="myform"  role="form">
    		 				{{ csrf_field() }}
			      
			                <div class="card-body">
			                  	<div class="form-group">
			                    	<label for="exampleInputFirstName1">First Name</label>
			                    	<input type="text" class="form-control first_name" name="first_name" id="exampleInputFirstName1" placeholder="Enter First Name">
			                  	</div>
			                  	<div class="form-group">
			                    	<label for="exampleInputLastName1">Last Name</label>
			                    	<input type="text" name="last_name" class="form-control last_name" id="exampleInputLastName1" placeholder="Enter Last Name">
			                  	</div>
			                  	<div class="form-group">
			                    	<label for="exampleInputEmail1">Email address</label>
			                    	<input type="email" name="email" class="form-control email" id="exampleInputEmail1" placeholder="Enter email">
			                  	</div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Assign Class</label>
                                     <select name="assign_class" class="form-control">
                                        <option value="">Please Select</option>
                                         <?php foreach ($get_classSection as $key => $value) { ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $value->class_name.' '.$value->section_name ?></option>
                                        <?php } ?>                                         
                                     </select>   
                                </div>

			                  	<div class="form-group">
			                    	<label for="exampleInputPassword1">Password</label>
			                    	<input type="password" name="password" class="form-control password" id="exampleInputPassword1" placeholder="Password">
			                  	</div>

			                  	<div class="form-group">
			                    	<label for="exampleInputConfirmPassword1">Confirm Password</label>
			                    	<input type="password" name="confirmpassword" class="form-control confirmpassword" id="exampleInputConfirmPassword1" placeholder="Password">
			                  	</div>
			                  	<div class="form-group">
			                    	<label for="exampleInputFile">File input</label>
			                    	<div class="input-group">
			                      		<div class="custom-file">
			                        		<input type="file" name="image" class="custom-file-input image" id="exampleInputFile">
			                        		<label class="custom-file-label" for="exampleInputFile">Choose file</label>
			                      		</div>
			                      		
			                    	</div>
			                  	</div>
				                
			                </div>
			                <div class="card-footer">
			                  	<button type="submit" class="btn btn-primary">Submit</button>
			                </div>
			            </form>
            		</div>
				</div>
     		</div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/additional-methods.min.js') }}"></script>

<script type="text/javascript">

$(function() {
	$("#myform").validate({
    // Specify validation rules register
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },
            confirmpassword: {
                equalTo: "#exampleInputPassword1"
            },
            image: {
		      	required: true,
		      	accept: "image/*"
		    },
        },
        messages: {
        	first_name: {
                required: 'Please insert First Name ',
            },
            last_name: {
                required: 'Please insert Last Name ',
            },
            email: {
                required: 'Please insert email ',
                email: 'Please insert proper email id ',
            },
            password: {
                required: 'Please insert password ',
            },
            confirmpassword: {
                equalTo: "Password and confirm password doesnot match",
            },
            image: {
                required: "Please upload only image",
            },
            
       	},
        submitHandler: function(form) {
        	form.submit();
        }
    });
});

</script>
@endsection