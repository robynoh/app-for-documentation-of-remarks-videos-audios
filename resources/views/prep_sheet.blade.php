@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">


                        
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:14px; color:#000"> Result Preparation </b></div>
                            </div>

                           
                            <div class="block-content collapse in">
							
							
                                <div class="span12">


								
								<div style="font-size:18px;font-weight:bold">Spreadsheet for {{ resultController::pulldepartmentnamevalue($department)}}
                                
                                {{ resultController::pulllevelname($level)}}  {{ resultController::pullsemestername($semester)}}
                                {{ resultController::get_session($session)}} created
                            </div>

                            <br/>
							Follow the process bellow to compute other parameters required by clicking the buttons bellow accordingly
							<br/><br/>
                                  
								 <form method="POST" action="resultprocess">
                                 {{ csrf_field() }}
                                  
                            <table  width="100%">
						<tr>
						<td width="40%">
                            <input type="hidden" name="semester" value="<?php echo $semester; ?>"/>
                            <input type="hidden" name="session" value="<?php echo $session; ?>"/>
                            <input type="hidden" name="level" value="<?php echo $level; ?>"/>
                            <input type="hidden" name="department" value="<?php echo $department; ?>"/>
                            <input type="hidden" name="school" value="<?php echo $school; ?>"/>
                        
                        <button name="action" value="gp" class="btn btn-primary" style="width:400px;text-align:left" ><i class="icon-pencil icon-white" ></i> Compute Grade point <?php if($tpcountgp->count()>0){ ?> <img src="{{ asset('images/suc.png')}}" width="20px"  style="float:right" /><?php }?></button>
  								</td>
								<td></td>
						
						</tr>
						
						<tr>
						<td><button name="action" value="tgp" class="btn btn-primary"  style="width:400px;text-align:left"<?php if($tpcountgp->count()<1){ ?> disabled <?php  }?>><i class="icon-pencil icon-white"></i> Compute Total Grade point <?php  if($tpcounttgp->count()>0){ ?><img src="{{ asset('images/suc.png')}}" width="20px" style="float:right"  /><?php  }?></button>
  								</td>
								<td></td>
						
						</tr>
						
						<tr>
						<td><button name="action" value="ugpp" class="btn btn-primary"  style="width:400px;text-align:left" <?php  if($tpcounttgp->count()<1){ ?> disabled <?php  }?>><i class="icon-pencil icon-white"></i> Compute Units and Grade point Product <?php  if($tpcounttupp->count()>0){ ?><img src="{{ asset('images/suc.png')}}" width="20px" style="float:right"  /><?php }?></button>
  								</td>
								<td></td>
						
						</tr>
						
						<tr>
						<td><button name="action" value="gpa" class="btn btn-primary" style="width:400px;text-align:left" <?php if($tpcountgp->count()<1|| $tpcounttgp->count()<1|| $tpcounttupp->count()<1){ ?> disabled <?php }?>><i class="icon-pencil icon-white"></i> Compute GPA <?php if($tpcountgpa->count()>0){ ?><img src="{{ asset('images/suc.png')}}" width="20px" style="float:right"  /><?php }?></button>
  								</td>
								<td></td>
						
						</tr>
						
						
						
						
						</table>

                        <br/>
							<?php if($tpcountgpa->count()>0){ ?>

							<a href="/resultsboard/<?php echo $session; ?>/<?php echo $department;?>/<?php echo $semester;?>/<?php echo $level; ?>/<?php echo $school;?>">Click here to view result sheet</a>
  								
							<?php }?>
                                 </form>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                        <!-- /block -->


                        <form action="" method="post" >
 <div id="myAlert" class="modal hide">

              
 

	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Are you sure?</h3>
											</div>
											<div class="modal-body">
												<p>Do you want to delete the record of this session? this process can not be undone</p>
												<input type="hidden", name="id" id="app_id">
											</div>
											<div class="modal-footer">
												<a data-dismiss="modal" class="btn btn-danger" href="javascript:void(0);" onclick="senddel();">Confirm</a>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>

                                        </div></form>
                    </div>
 @endsection

 <script type="text/javascript">
 function showAlert(operation){
    var id=operation;
    var userID=$('#deleteUser'+id).attr('data-userid');
    $('#app_id').val(userID); 
    $('#myAlert').modal('show'); 
  
   
}

function senddel(){
    
    window.location="/session/delete/"+$('#app_id').val();
   
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