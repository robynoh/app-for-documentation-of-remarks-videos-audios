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
								<div style="font-weight:bold;font-size:14px;padding-bottom:20px">Result for Student(s) in the school of <?php echo resultController::pullschoolnamevalue($school);?>,  <?php echo resultController::pulllevelname($level);?>,  <?php echo resultController::pullsemestername($semester);?>,  <?php echo resultController::pullsessionnamevalue($session);?> session </div>
								
								<form method="POST"  action="{{route('result_approve')}}"   >
						
                                {{ csrf_field() }} 
								<button name="action" value="approve" class="btn btn-primary" ><i class="icon-check icon-white"></i> Approve</button>
  								
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
											
                                                <th width="5%"></th>
                                                <th width="30%">Department</th>
												 
												<th width="30%">Status</th>
                                               
                                                
                                            </tr>
                                          
                                        </thead>
                                        <tbody>
                                         <?php foreach($department as $row){
                                                                                 
										 if(resultController::checkifresults($row->dept_id,$semester,$session,$level)>0){?>
                                            <tr class="gradeU">
                                             
                                                <td><input type="checkbox" name="depts[]" value="<?php echo $row->dept_id;?>" /></td>
                                                <td><?php echo $row->department;?></td>
												
											   
											    <td class="center">
                                                <input type="hidden" name="session" value="<?php echo $session;?>" />
                                                <input type="hidden" name="semester" value="<?php echo $semester;?>" />
                                                <input type="hidden" name="level" value="<?php echo $level;?>" />
                                                <input type="hidden" name="school" value="<?php echo $school;?>" />
                                                <?php echo resultController::approvestatus($row->dept_id,$semester,$session,$level,$school); ?></td>
                                           
										 <?php } }?>
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