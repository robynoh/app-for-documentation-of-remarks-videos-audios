@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:14px; color:#000"> <?php echo  resultController::get_session($session); ?> <?php echo  resultController::get_school($school); ?> STUDENTS</b></div>
                            </div>
                            <div class="block-content collapse in">
							@if(session('success'))
<div class="alert alert-success">
{{session('success')}}
    </div>
@endif
							
                                <div class="span12">
								
								<a href="{{ url('students') }}"><button class="btn btn-primary"><i class="icon-chevron-left icon-white"></i> Go back</button></a>
                                  
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
											
                                                <th width="20%">Matric No.</th>
                                                <th width="30%">Name</th>
												
                                                <th width="10%">Level</th>
                                                <th width="30%">Department</th>
												<th width="30%">School</th>
												 <th width="30%">Edit</th>
												<th width="30%"></th>
                                               
                                                
                                            </tr>
                                          
                                        </thead>
                                        <tbody>
                                         @foreach($records as $row)
                                            <tr class="gradeU">
                                             
                                                <td><b>{{ $row->exam_no }}</b></td>
                                                <td>{{ $row->name }}</td>
												
                                                <td class="center">{{ $row->level }}</td>
                                             
                                               <td class="center">{{ $row->department }}</td>
											   
											    <td class="center">{{ $row->school }}</td>
                                                <td>
                                                <a  href="/edit_student/{{ $row->student_id }}" class="btn btn-success"><i class="icon-pencil icon-white"></i></a>
                                            </td>
											   
												<td class="center"><div class="btn-group">
													
												<a  id="deleteUser{{ $row->student_id}}" data-userid="{{ $row->student_id }}" href="javascript:void(0)" onclick="showAlert({{ $row->student_id}});"><button class="btn btn-danger"><i class="icon-remove icon-white"></i></button></a></div></td>
                                           
											@endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
 @endsection

<form action="" method="post" >
 <div id="myAlert" class="modal hide">

              
 

	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Are you sure?</h3>
											</div>
											<div class="modal-body">
												<p>Do you want to delete the record of this student? this process can not be undone</p>
												<input type="hidden", name="id" id="app_id">
											</div>
											<div class="modal-footer">
												<a data-dismiss="modal" class="btn btn-primary" href="javascript:void(0);" onclick="senddel();">Confirm</a>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>

                                        </div></form>
                                        


                                        
 <div id="myAlert2" class="modal hide" style="text-align:center">

              <form  action="{{route('update.student')}}" method="POST" >
 
     {{ method_field("PUT")}}
	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Student information</h3>
											</div>
											<div class="modal-body">

                                            <div class="control-group" style=";">
  								
  								<div class="controls" style="border-radius:10px;" >
<div style="width:100px;height:100px;display:block;margin-left:auto;margin-right: auto;">
  									
									<img id="blah" src="{{ asset('images/img2.png')}}" alt="logo" />
									
                                    <input name="file" type='file' onchange="readURL(this);" />
                                   
									<br/><br/>
  								</div></div>
								
                
                
                              </div>
                              


                                            
                                            <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Full Name</b><span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="name" name="name" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
                                  	<input type="hidden" id="studentid" name="studentid" class="span6 m-wrap" >
                                  
                                </div>
                              </div>


                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Exam No.</b><span class="required">*</span></label>
  								<div class="controls">
  									<input  type="text" id="exam_no" name="exam_no" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
  								</div>
                              </div>

                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>School</b><span class="required">*</span></label>
  								<div class="controls">
  									<select id="school" name="school"  onchange="showdepartmentFilter();" style="width:100%;height:30px"  required>
								
								<?php echo  resultController::pull_school(); ?>
								
								</select>
  								</div>
                              </div>
                              

                              <div class="control-group">
  								<label class="control-label" style="text-align:left">Department<span class="required">*</span></label>
  								<div class="controls">
  									
<select id="dept" name="department" style="width:100%;height:30px" required>
								
								
								</select>
  								</div>
                              </div>
                              

                              <div class="control-group">
  								<label class="control-label" style="text-align:left">Level <span class="required">*</span></label>
  								<div class="controls">
  									<select name="level" id="level"  class="input" style="width:100%;height:30px" required > 
                                   
				<option></option>
                				<?php  echo  resultController::pull_level(); ?>
								
								
                                	  
									</select>
  								</div>
  							</div>

                              <input type="hidden", name="id" id="app_id2">
                             
                              

                            
											</div>
											<div class="modal-footer">
												<button class="btn btn-primary" >Update</button>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>
 </form>
										</div>


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
	   
	 
	   
	   	
	function showAlert(photo){
    var id=photo;
    var userID=$('#deleteUser'+id).attr('data-userid');
    $('#app_id').val(userID); 
    $('#myAlert').modal('show'); 
  
   
}


function showAlertbox(photo){
    var id=photo;
    var examNumber="";
    var img="";
    var img='{{ asset('images/img2.png')}}';
    var userID=$('#deleteUser'+id).attr('data-userid');
    $('#app_id2').val(userID); 
    

      $.get('pullstudentdetail/'+id,function(records){
        examNumber=records.exam_no;
        img="";
        $("#studentid").val(id);
        $("#name").val(records.name);
        $("#exam_no").val(records.exam_no);
        $("#school").val(pullSchool(records.school_id));
        $("#dept").val(records.dept_id).change();
        $("#level").val(records.level_id).change();
      

        pullSchool(records.school_id);
         
  });

  
   
}

function senddel(){
    
    window.location="/student/delete/"+$('#app_id').val();
   
}


function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function pullSchool(schoolID){
        var schooId=schoolID;
        var output;

        $.get('pullschoolname/'+schooId,function(schoolname){

            output=schoolname.school;
            });

          return output;
        }
		
     </script>