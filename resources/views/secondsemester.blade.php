@extends('layouts.app')
@section('content')
<?php  

use \App\Http\Controllers\resultController;

?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:18px; color:#000">Second Semester Result(s)</b></div>
                            </div>
                            <div class="block-content collapse in">
							
							
                                <div class="span12">
								<form action="" method="POST">
								<a href="{{ url()->previous() }}" class="btn btn-success"><i class="icon-chevron-left icon-white"></i> Go Back</a>
								<a href="javascript:void(0);" onclick="exportTableToExcel()" class="btn btn-danger"><i class="icon-download icon-white"></i> Download sheet</a>
								
							
								
								
								
								</form>
								<br/><br/>
								
								
								<br/>
									  <div class="table-toolbar">
                                     
                                     
                                   </div>
                                     <div id="dvData" style="overflow-x: scroll; overflow-y:hidden;width:100%">
                                        
                                     <span style="color:#090;font-size:13px">Result(s) for the school of <?php  echo resultController::pullschoolnamevalue($schoolx); ?>, department of <?php echo resultController::pulldepartmentnamevalue($departmentx); ?>, <?php echo resultController::pulllevelname($levelx); ?>,<?php echo resultController::pullsessionnamevalue($sessionx); ?> session</span>
								 <br/><br/>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="" style="font-size:12px">
                                        <thead>
                                            <tr>
											
                                                <th width="20%">Name</th>
												<th width="20%">Exam No.</th>
												<th width="20%">TU</th>
												
												<th width="20%">TP</th>
												<th width="20%">GPA</th>
												<th width="20%">CGPA</th>
                                                
                                                <?php foreach($coursesx as $row1){?>
                                                <th  width="10%"><span class=""><?php echo $row1->code;?>(<span style="color:#006699"><?php echo $row1->unit;?></span>)</span></th>
                                                
												<?php }?>
												 
                                               <th width="5%">TU</th>
											   <th width="5%">TP</th>
											    <th width="5%">GPA</th>
                                                
                                            </tr>
                                          
                                        </thead>
                                        <tbody>
                                         <?php 
										 
$students->chunk(100, function($students)use($schoolx, $levelx, $departmentx, $semesterx, $sessionx, $coursesx){
                                         
                                             
                                       
    foreach($students as $row){
    
      

   if(resultController::recordfilter($schoolx,$levelx,$departmentx,$semesterx,$row->exam_no,$sessionx)>0){	
    ?>

										
                                            <tr class="gradeU">
                                             
                                                 <td><b><?php  echo $row->name; ?></b></td>
												 <td><b><?php  echo $row->exam_no; ?></b></td>
												<td><?php echo resultController::pulltotalUnitBackLog($row->exam_no,$levelx,$sessionx,$semesterx,$schoolx,$departmentx); ?></td>
												<td><?php echo resultController::pulltotalPointBackLog($row->exam_no,$levelx,$sessionx,$semesterx,$schoolx,$departmentx); ?></td>
												<td><?php echo resultController::pullstudentGPABackLog($row->exam_no,$levelx,$sessionx,$semesterx,$schoolx,$departmentx); ?></td>
												<td><?php echo  resultController::pullCGPA($row->exam_no,$sessionx); ?></td>
												
                                                
												<?php 
												
												
                                                foreach($coursesx as $course){?>
                                                    <td class="center"><?php echo resultController::displayScores($row->exam_no,$course->code,$levelx,$sessionx,$semesterx,$departmentx); ?></td> 
                                                     <?php }?>
                                                     
                                                  <td><?php echo resultController::pulltotalUnit($row->exam_no,$levelx,$sessionx,$semesterx,$schoolx,$departmentx); ?></td>
                                                     <td><?php echo resultController::pulltotalPoint($row->exam_no,$levelx,$sessionx,$semesterx,$schoolx,$departmentx); ?></td>
                                                    <td><?php echo resultController::pullstudentGPA($row->exam_no,$levelx,$sessionx,$semesterx,$schoolx,$departmentx); ?></td>
                                               <?php }}  });?>
												
												
                                            </tr>
                                        </tbody>
                                    </table>
									</div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
 @endsection

 <script type="text/javascript">


function exportTableToExcel(){
            
            window.open('data:application/vnd.ms-excel,' +  encodeURIComponent($('#dvData').html()));
              
          e.preventDefault();
              
              
              
      
  }



 function showAlert(operation){
    var id=operation;
    var userID=$('#deleteUser'+id).attr('data-userid');
    $('#app_id').val(userID); 
    $('#myAlert').modal('show'); 
  
   
}

function senddel(){
    
    window.location="/course/delete/"+$('#app_id').val();
   
}

function showAlertEdit(operand){
    var id=operand;
    var userID=$('#EditUser'+id).attr('data-userid');
    $('#app_id2').val(userID); 

    $.get('pullstaffdetail/'+id,function(staff){


        $("#staffid").val(id);
        $("#name").val(staff.name);
        $("#phone").val(staff.phone);
        $("#email").val(staff.email);
        $('#dept-value').val(staff.department);
        $('#school-value').val(staff.school);
       
    });

    $('#myAlert2').modal('show'); 
  
   
}


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

                    $.get('pullschoolname/'+school,function(schoolname){

                        $('#school-value').val(schoolname.school);
});

		            $('#dept').html(result)
                  }});

		
    }



    function changedept(){
		
		var dept=$("#dept").val();
        
        $.get('pulldepartmentname/'+dept,function(deptname){
            $('#dept-value').val(deptname.department);
});
		
    }
    
    function pullSchool(schoolID){
        var schooId=schoolID;
        var output;

        $.get('pullschoolname/'+schooId,function(schoolname){

            return schoolname.school;
            });

         
        }


        function pullschooldept() {
            var school=$("#school").val();
          


	
        jQuery.ajax({
            url:'filterdepartment',
                  method: 'POST',
                  data: {
					school:$("#school").val()
                  },
                  success:function(result){

                     $('#dept').html(result)
                  }});

        }
      
function submitFields(){

       var staffid=$("#staffid").val();
       var namex= $("#name").val();
      var phonex= $("#phone").val();
      var emailx= $("#email").val();
      var deptx= $('#dept-value').val();
      var schoolx=  $('#school-value').val();
      var _token = $('input[name="_token"]').val();
      jQuery.ajax({
            url:'submitupdate',
                  method: 'POST',
                  data: {
					school:schoolx,dept:deptx,email:emailx,phone:phonex,name:namex,staff:staffid,_token:_token
                  },
                  
                  success:function(result){
                    $('#myAlert2').modal('hide'); 
                    $('#success').modal('show'); 
                  }});


}
</script>