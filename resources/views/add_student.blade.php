@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                         <!-- block -->
						 
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:14px; color:#000">Add New Student</b></div>
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
					<form action="{{route('poststudent')}}" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data" method="POST">
						<fieldset>
							
							
						{{ csrf_field() }}
                            
  							<div class="control-group">
  								<label class="control-label">Full Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="name" data-required="1" class="span6 m-wrap" required>
  								</div>
  							</div>
  							
							
							  <div class="control-group">
  								<label class="control-label">School<span class="required">*</span></label>
  								<div class="controls">
  									<select id="school" name="school"  onchange="showdepartmentFilter();" required>
								<option value="" > Choose School</option>
								<?php echo  resultController::pull_school(); ?>
								
								</select>
  								</div>
  							</div>


                              <div class="control-group">
  								<label class="control-label">Department<span class="required">*</span></label>
  								<div class="controls">
  									
<select id="dept" name="department"  required>
								
								
								</select>
  								</div>
  							</div>
                           
							
  							<div class="control-group">
  								<label class="control-label">Matric/Reg<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="exam_no" data-required="1" class="span6 m-wrap" required>	</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Level <span class="required">*</span></label>
  								<div class="controls">
  									<select name="level" id=""  class="input" required > 
                                   
				
                				<?php  echo  resultController::pull_level(); ?>
								
								
                                	  
									</select>
  								</div>
  							</div>
                            <div class="control-group">
  								<label class="control-label">Session<span class="required">*</span></label>
  								<div class="controls">
  									<select name="session" class="input"  required> 
                                   
				
                				<option value="" > Choose Session</option>
								<?php  echo  resultController::pull_session(); ?>
                                                        	  
                                	  
									</select>
  								</div>
  							</div>
  							
  							
  							<div class="form-actions">
  								<button type="submit" name="add" class="btn btn-primary">Add Student</button><br/><br/>
  								<span style="color:#ff0000">*</span><a href="bulk_upload_student">Bulk upload student(Csv)</a>
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