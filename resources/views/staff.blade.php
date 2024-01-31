@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:14px; color:#000"> Report</b></div>
                            </div>
                            <div class="block-content collapse in">
							
							
                                <div class="span12">

                                @if(session('success'))
<div class="alert alert-success">
{{session('success')}}
    </div>
@endif
							    
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
											
                                               
                                                <th width="30%">Name</th>
												
                                                <th width="10%">phone</th>
                                                <th width="30%">school</th>
												<th width="30%">department</th>
												 <th width="30%">email</th>
												 <th width="30%">edit</th>
                                                <th width="30%">Delete</th>
                                               
                                                
                                            </tr>
                                          
                                        </thead>
                                        <tbody>
                                         @foreach($staffs as $staff)
                                            <tr class="gradeU">
                                             
                                        
                                                <td>{{$staff->name}}</td>
												
                                                <td class="center">{{$staff->phone}}</td>
                                             
                                               <td class="center">{{$staff->school}}</td>
											   
											    <td class="center">{{$staff->department}}</td>
                                                <td class="center">{{$staff->email}}</td>
                                                <td>	<a  id="editUser{{ $staff->staff_id}}" data-userid="{{ $staff->staff_id }}" href="javascript:void(0)" onclick="showAlertEdit({{ $staff->staff_id}});"><button class="btn btn-success"><i class="icon-pencil icon-white"></i></button></a></div></td>
                                           </td>
												<td>	<a  id="deleteUser{{ $staff->staff_id}}" data-userid="{{ $staff->staff_id }}" href="javascript:void(0)" onclick="showAlert({{ $staff->staff_id}});"><button class="btn btn-danger"><i class="icon-remove icon-white"></i></button></a></div></td>
                                           </td>
											   
											   
												
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <form action="" method="post" >
 <div id="myAlert" class="modal hide">

              
 

	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Are you sure?</h3>
											</div>
											<div class="modal-body">
												<p>Do you want to delete the record of this staff? this process can not be undone</p>
												<input type="hidden", name="id" id="app_id">
											</div>
											<div class="modal-footer">
												<a data-dismiss="modal" class="btn btn-danger" href="javascript:void(0);" onclick="senddel();">Confirm</a>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>

                                        </div></form>



                                        <form action="" method="post" >
 <div id="success" class="modal hide">

              
 

	 {{ csrf_field() }}
											
											<div class="modal-body" style="text-align:center">
                                            <img src="{{ asset('images/success.png')}}" alt="logo" />
												<h3>Record updated succesfuly</h3>
												
											</div>
											<div class="modal-footer">
												
												<a class="btn" href="staffs">Okay</a>
											</div>

                                        </div></form>

                        </div>



                        <div id="myAlert2" class="modal hide" style="text-align:center">

              <form  action="{{route('update.student')}}" method="POST"  >
 
     {{ method_field("PUT")}}
	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3 style="font-size:14px;text-align:left">Staff information</h3>
											</div>
											<div class="modal-body">

                                          
                                            <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Full Name</b><span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="name" name="name" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
                                  	<input type="hidden" id="staffid" name="studentid" class="span6 m-wrap" >
                                  
                                </div>
                              </div>


                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Phone No.</b><span class="required">*</span></label>
  								<div class="controls">
  									<input  type="text" id="phone" name="phone" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
  								</div>
                              </div>

                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Email</b><span class="required">*</span></label>
  								<div class="controls">
  									<input  type="text" id="email" name="email" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
  								</div>
                              </div>

                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>School</b><span class="required">*</span></label>
  								<div class="controls">
                                      <table><tr><td> <input disabled  type="text" id="school-value" name="school-value" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
  								</td><td><select id="school" name="school"  onchange="showdepartmentFilter();" style="width:100%;height:30px"  required>
								<option>Change school</option>
								<?php echo  resultController::pull_school(); ?>
								
								</select></td></tr></table>
                                 
  									
  								</div>
                              </div>
                              

                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Department</b><span class="required">*</span></label>
  								<div class="controls">
                                      <table>
                                          <tr>
                                              <td>
                                              <input disabled  type="text" id="dept-value" name="dept-value" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
  							
</td>
<td>
  									
<select id="dept" name="department"onchange="changedept();"  style="width:100%;height:30px" required>
<option></option>
								
                                </select>
</td>
                                          </tr>
                                      </table>
  								</div>
                              </div>
                              

                             

                              <input type="hidden", name="id" id="app_id2">
                             
                              

                            
											</div>
											<div class="modal-footer">
                                              	<a href="javascript:void(0);" onclick="submitFields();" class="btn btn-primary" >Save</a>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>
 </form>
										</div>

                      
                        <!-- /block -->
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
    
    window.location="/staff/delete/"+$('#app_id').val();
   
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