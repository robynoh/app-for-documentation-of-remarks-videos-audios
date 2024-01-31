@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">


                        
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:14px; color:#000"> School Sesson(s)</b></div>
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

								
								<form action="add_session"  class="form-horizontal" enctype="multipart/form-data" method="POST">
						
                            
                                {{ csrf_field() }}
  								
  								
  									<input type="text" name="session" data-required="1" class="span6 m-wrap" >
								<button name="add_session" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Add Session</button>
  								
  							
  							
							
							
					</form>
								
                                  
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
											
                                                <th width="20%">session ID</th>
                                                <th width="30%">School sessions</th>
												 
												<th width="30%"></th>
                                               
                                                
                                            </tr>
                                          
                                        </thead>
                                        <tbody>
                                         @foreach($sessions as $session)
                                            <tr class="gradeU">
                                             
                                                <td><b>{{ $session->session_id }}</b></td>
                                                <td>{{ $session->session }}</td>
												
											   
											 
												<td class="center"><div class="btn-group">
													
												<a  id="deleteUser{{ $session->session_id}}" data-userid="{{ $session->session_id }}" href="javascript:void(0)" onclick="showAlert({{ $session->session_id}});"><button class="btn btn-danger"><i class="icon-remove icon-white"></i></button></a></div></td>
                                           
										
												@endforeach
                                            </tr>
                                        </tbody>
                                    </table>
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