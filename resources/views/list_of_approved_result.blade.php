@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:18px; color:#000"> Approve Result(s)</b></div>
                            </div>
                            <div class="block-content collapse in">
							
							
                                <div class="span12">

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
								<form method="POST"  action="regenerate"   >
						
                                {{ csrf_field() }} 
								
  							<button name="action" value="disapprove" class="btn btn-danger" ><i class="icon-remove icon-white"></i> Disapprove</button>
  								
  							
  						
							
							
					
								
                                  
								  <div class="table-toolbar">
                                     
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div>
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2" style="font-size:12px">
                                        <thead>
                                            <tr>
											
                                         <th></th>
                                                <th width="30%">Department</th>
												 
												<th width="30%">School</th>
                                                <th width="30%">level</th>
                                                <th width="30%">semester</th>
                                                <th width="30%">session</th>
                                               
                                                
                                            </tr>
                                          
                                        </thead>
                                        <tbody>
                                         <?php foreach($results as $row){
                                                                                 
										 ?>
                                            <tr class="gradeU">
                                            <td>
                                            <input type="hidden" name="session" value="<?php echo $row->session_id;?>" />
                                                <input type="hidden" name="semester" value="<?php echo $row->semester_id;?>" />
                                                <input type="hidden" name="level" value="<?php echo $row->level_id;?>" />
                                                <input type="hidden" name="school" value="<?php echo $row->school_id;?>" /> 
                                            
                                            <input type="checkbox" name="depts[]" value="<?php echo $row->dept_id;?>" /></td>
                                                 <td><?php echo $row->department;?></td>
                                                 <td><?php echo $row->school;?></td>
                                                 <td><?php echo $row->level;?></td>
                                                 <td><?php echo $row->semester;?></td>
                                                 <td><?php echo $row->session;?></td>
												
											   
									       
										 <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
									
									</form>
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