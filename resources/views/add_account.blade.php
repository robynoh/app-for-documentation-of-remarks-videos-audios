@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:14px; color:#000">New User</b></div>
                            </div>
                            <div class="block-content collapse in">

							
							@if ($errors->any())

							<div class="alert alert-warning">
    
   
        <Ol>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </Ol>
    </div>
@endif


@if(session('success'))
<div class="alert alert-success">
{{session('success')}}
    </div>
@endif



                                <div class="span12">
					<!-- BEGIN FORM-->
					<form action="" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data" method="post">
						<fieldset>
							
						{{ csrf_field() }}
  							<div class="control-group">
  								<label class="control-label">Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="name" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
  							
  							
  							<div class="control-group">
  								<label class="control-label">Email<span class="required">*</span></label>
  								<div class="controls">
  									<input name="email" type="text" class="span6 m-wrap"/>
  								</div>
  							</div>
                            <div class="control-group">
  								<label class="control-label">Password<span class="required">*</span></label>
  								<div class="controls">
  									<input name="password" type="text" class="span6 m-wrap"/>
  								</div>
  							</div>
  							
  							<div class="control-group">
  								<label class="control-label">Confirm Password<span class="required">*</span></label>
  								<div class="controls">
  									<input name="cpassword" type="text" class="span6 m-wrap"/>
  								</div>
  							</div>
                            <div class="control-group">
  								<label class="control-label">Choose account type<span class="required">*</span></label>
  								<div class="controls">
  									<select class="span6 m-wrap" id="opt" name="acctype"><option>select account type</option>
                                    <option>User</option>
                                    <option>admin</option>
  									
  									</select>
  								</div>
  							</div>
  							<div class="form-actions">
  								<button type="submit" name="create" class="btn btn-primary">Add account</button>
  								<a href="users" class="btn">Cancel</a>
  							</div>
						</fieldset>
					</form>
					<!-- END FORM-->
				</div>
			    </div>
			</div>
                     	<!-- /block -->
		    </div>
 @endsection
 
 <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script type="text/javascript">

function showdepartmentFilter(){
		
		var school=$("#school").val();
		var _token = $('input[name="_token"]').val();


	
        jQuery.ajax({
            url:'filterdepartment',
                  method: 'POST',
                  data: {
					school:$("#school").val(),_token:_token
                  },
                  success:function(result){

		            $('#dept').html(result)
                  }});

		
	}
	   
	 
	   
	   	

     </script>