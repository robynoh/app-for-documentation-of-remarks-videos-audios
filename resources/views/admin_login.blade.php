@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:14px; color:#000">Admin Login List</b></div>
                            </div>
                            <div class="block-content collapse in">

                            
                                <div class="span12">

                                <a href="add_admin_account"><button class="btn btn-warning"><i class="icon-plus icon-white"></i> Add Account</button></a>

                            <br/><br/>
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
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2" style="font-size:12px">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Email</th>
                                         
                                                
                                              
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr class="gradeU">
                                            
                                                <td>{{ $user->name}}</td>
                                                <td>{{ $user->email}}</td>
                                              
                                                
                                               
												<td>	<a  id="deleteUser{{ $user->id}}" data-userid="{{ $user->id }}" href="javascript:void(0)" onclick="showAlert({{ $user->id}});"><button class="btn btn-danger"><i class="icon-remove icon-white"></i></button></a></div></td>
                                           </tr>
                                            
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
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
												
												<a class="btn" href="users">Okay</a>
											</div>

                                        </div></form>

                        </div>



                        <div id="myAlert2" class="modal hide" style="text-align:center">

              <form  action="" method="POST"  >
 
     {{ method_field("PUT")}}
	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3 style="font-size:14px;text-align:left">User information</h3>
											</div>
											<div class="modal-body">

                                          
                                            <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Full Name</b><span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="name" name="name" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
                                  	<input type="hidden" id="userid" name="userid" class="span6 m-wrap" >
                                  
                                </div>
                              </div>


                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Email</b><span class="required">*</span></label>
  								<div class="controls">
  									<input  type="text" id="email" name="email" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
  								</div>
                              </div>
                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Password</b><span class="required">*</span></label>
  								<div class="controls">
  									<input  type="text" id="pass" name="pass" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
  								</div>
                              </div>

                             
                              

                              <div class="control-group">
  									<div class="controls">
                                     
                                
                                <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Last time of update</b><span class="required">*</span></label>
  								<div class="controls">
  									<input  type="text" id="lupdate" name="lupdate" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" disabled>
  								</div>
                              </div>
                                 
  									
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
    
    window.location="/users/delete/"+$('#app_id').val();
   
}

function showAlertEdit(operand){
    var id=operand;
    var userID=$('#EditUser'+id).attr('data-userid');
    $('#app_id2').val(userID); 

    $.get('pulladmindetail/'+id,function(user){

        
        $("#userid").val(id);
        $("#name").val(user.name);
        $("#email").val(user.email);
        $("#pass").val(user.password);
        $("#lupdate").val(user.updated_at);

       
        
        $.get('decrypt/'+user.password,function(password){

        $("#pass").val(password);

});
        
       
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



    function changeacct(){
		
		var dept=$("#acct").val();
        
       
            $('#acctype_value').val(dept);
		
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

       var useridx=$("#userid").val();
       var namex= $("#name").val();
      var emailx= $("#email").val();
      var phonex= $("#phone").val();
      var acctypex= $('#acctype_value').val();
      var _token = $('input[name="_token"]').val();
      jQuery.ajax({
            url:'submituser',
                  method:'POST',
                  data: {
                    acctype:$('#acctype_value').val(),
                    email:$("#email").val(),
                    phone:$("#phone").val(),
                    name:$("#name").val(),
                    pass:$("#pass").val(),
                    user:$("#userid").val(),
                    _token:_token
                  },
                  success:function(result){
                    $('#myAlert2').modal('hide'); 
                    $('#success').modal('show'); 
                  }});


}
</script>