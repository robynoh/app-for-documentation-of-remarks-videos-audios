@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                         <!-- block -->
						 
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:18px; color:#000">Edit student</b></div>
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
					<form action="/update_student" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data" method="POST">
						<fieldset>
						{{ method_field("PUT")}}
	 {{ csrf_field() }}
							

						<div class="control-group">
  								
								  <div class="controls" style="border-radius:10px">
								  
<div style="width:100px;height:100px">
  									<?php if($passport==""){?>
									<img id="blah" src="{{asset('images/img2.png')}}" alt="logo"><?php  }else{?><img id="blah" src="/student_passports/<?php echo $passport->img;?>" alt="logo">
									
									<?php } ?><br/> 

									
  								</div></div>
								
                  
                
							  </div>
							  
							  <div class="control-group">
  								<label class="control-label"><span class="required">*</span></label>
  								<div class="controls">
								  <input name="file" type='file' onchange="readURL(this);" />
  								</div>
  							</div>
							
				
                            
  							<div class="control-group">
  								<label class="control-label">Full Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="name" data-required="1" class="span6 m-wrap" value="{{$student->name}}" required>
								  	<input type="hidden" id="studentid" name="studentid" class="span6 m-wrap" value="{{$student->student_id}}" >
                                  
								</div>
  							</div>
							  
							  <div class="control-group">
  								<label class="control-label">Matric/Reg<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="exam_no" data-required="1" class="span6 m-wrap" value="{{$student->exam_no}}"  required>	</div>
  							</div>
							
							  <div class="control-group">
  								<label class="control-label">School<span class="required">*</span></label>
  								<div class="controls">
  									<select id="school" name="school"  onchange="showdepartmentFilter();" required>
								<option value="<?php echo  $student->school_id; ?>"><?php echo  $student->school; ?> </option>
								<?php echo  resultController::pull_school(); ?>
								
								</select>
  								</div>
  							</div>


                              <div class="control-group">
  								<label class="control-label">Department<span class="required">*</span></label>
  								<div class="controls">
  									
<select id="dept" name="department"  required>
	<option value="<?php echo  $student->dept_id; ?>"><?php echo  $student->department; ?></option>
								
								
								</select>
  								</div>
  							</div>
                           
							
  							
							<div class="control-group">
  								<label class="control-label">Level <span class="required">*</span></label>
  								<div class="controls">
  									<select name="level" id=""  class="input" required > 
                                   
									  <option value="<?php echo  $student->level_id; ?>"><?php echo  $student->level; ?></option>
                				<?php  echo  resultController::pull_level(); ?>
								
								
                                	  
									</select>
  								</div>
  							</div>
                           
  							
  							
  							<div class="form-actions">
  								<button type="submit" name="add" class="btn btn-primary">Update</button><br/><br/>
  							
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
            url:'/filterdepartment',
                  method: 'POST',
                  data: {
					school:$("#school").val(),_token:_token
                  },
                  success:function(result){

		            $('#dept').html(result)
                  }});

		
	}
	   
	 
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }  
	   	

     </script>