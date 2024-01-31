@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:14px; color:#000"> Dowload Student</b></div>
                            </div>
                            <div class="block-content collapse in">

							  <a href="/students"><button class="btn btn-primary"><i class="icon-chevron-left icon-white"></i> Go back</button></a>

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
							
							<form action="{{route('downloadstudent')}}"  class="form-horizontal" enctype="multipart/form-data" method="POST">
						
                            {{ csrf_field() }}
                          
  								
  								
								
                            <select id="school" name="school"  onchange="showdepartmentFilter();" required>
								<option value="" > Choose School</option>
								<?php echo  resultController::pull_school(); ?>
								
								</select>
								
								<select id="dept" name="department"  required>
								
								
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
									<button class="btn btn-success"  >
										<i class="icon-download icon-white"></i> Download</button>
  								
  							
							
							
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