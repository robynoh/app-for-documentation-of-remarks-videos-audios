@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:14px; color:#000"> Student Download</b></div>
                            </div>
                            <div class="block-content collapse in">

							<a href="{{ route('add_student') }}"><button class="btn btn-warning"><i class="icon-plus icon-white"></i> Add Student(s)</button></a>
                            <a href="{{ route('download_student') }}"><button class="btn btn-info"><i class="icon-download icon-white"></i> Download Students</button></a>

                            <br/><br/>
                            
                            @if ($errors->any())

<div class="alert alert-warning">


<Ol>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</Ol>
</div>
@endif
							
							<form action="filterstudent"  class="form-horizontal" enctype="multipart/form-data" method="GET">
						
                            
                          
  								
  								
								
                            <select id="school" name="school"  onchange="showdepartmentFilter();" >
								<option value="" > Choose School</option>
								<?php echo  resultController::pull_school(); ?>
								
								</select>
								
								
								
								
								
								<select name="session">
								<option value=""> Choose session</option>
                               
                                <?php echo  resultController::pull_session(); ?>
								
								</select>
								
								
									<button name="show_result" class="btn btn-primary"  >
										<i class="icon-eye-open icon-white"></i> Show students</button>
  								
  							
							
							
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