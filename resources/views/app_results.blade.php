@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:18px; color:#000"> Result Approval</b></div>
                            </div>
                            <div class="block-content collapse in">
							
							<form action="app_results2"  class="form-horizontal" enctype="multipart/form-data" method="POST">
						
                            {{ csrf_field() }}
  							
  								
  								
								
								<select name="school" required>
								<option> Choose School</option>
								<?php echo  resultController::pull_school(); ?>
								</select>
								
								
								
								<select name="level" required>
								<option value=""> Choose Level</option>
								<?php echo  resultController::pull_level(); ?>
								
								</select>
								
								<select name="session" required>
								<option value=""> Choose session</option>
								<?php echo  resultController::pull_session(); ?>
								
								</select>
								<br/><br/>
								<select name="semester" style="width:17%" required>
								<option value=""> Choose semester</option>
								<?php echo  resultController::pull_semester(); ?>
								
								</select>
								
									<button class="btn btn-primary"  ><i class="icon-chevron-right icon-white"></i> Continue</button>
  								
  							
  							
							
							
					</form>
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