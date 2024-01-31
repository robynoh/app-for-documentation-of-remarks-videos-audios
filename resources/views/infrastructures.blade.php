@extends('layouts.app')
@section('content')
<?php use Carbon\Carbon;   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:18px; color:#000"> Infrastructures</b></div>
                            </div>
                            <div class="block-content collapse in">
							
							
                                <div class="span12">

                                @if ($errors->any())

<div class="alert alert-danger">


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
<form action="" method="POST">
{{ csrf_field() }}
<button type="submit"  class="btn btn-danger btn"><i class="icon-remove icon-white"></i> Remove</button>
<a  href="add_infra"   class="btn btn-success btn"><i class="icon-plus icon-white"></i> Add</a>
			 
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
                                            <tr >
											
                                               <th width="3%"><input id='selectall' name="" type="checkbox" onClick="selectAll(this,'color')" /></th>
                                                <th>List of Infrastructure</th>
												
                                             
                                               
                                                
                                            </tr>
                                          
                                        </thead>
                                        <tbody>
                                         @foreach($infrastructures as $infrastructure)
                                            <tr class="gradeU">
                                             
                                            <td><input name="infrastructure[]" type="checkbox" value="{{ $infrastructure->id}}"></td>
                                                <td><h4>{{$infrastructure->title}}</h4>
                                                <span style="font-size:12px;color:darkred;font-weight:bold;font-style:italic">   {{ ucfirst($infrastructure->project_area)}}</span><br/>

                                             <span style="font-size:14px">   {!!  ucfirst(substr($infrastructure->description,0,200)) !!}</span><br/><br/>

                                            <span style="color:forestgreen; font-size:12px"> 
                                            <span style="padding-right:20px">  
                                            <b style="color:black;">  {{ ucwords($infrastructure->project_status)}}</b>
</span>
<span style="padding-right:20px">

                                               <b style="color:grey;"> <i class="icon-calendar icon-black"></i></b> {{Carbon::parse($infrastructure->created_at)->format('M d, Y')}}
</span>



<span style="padding-right:50px">

                                               <b style="color:grey;"> <i class="icon-home icon-black"></i></b> {{ ucwords($infrastructure->location)}}
</span>


<span style="padding-right:20px">  
                                            <b style="color:grey;"> <i class="icon-road icon-black"></i></b>  {{ ucwords($infrastructure->lga)}}
</span>

<span style="padding-right:20px">  
                                            <b style="color:grey;"> <i class="icon-film icon-black"></i></b>  Photos ({{resultController::getinfrphotos($infrastructure->id)}})
</span>

<span style="float:right"><a href="/infrastructure/{{ $infrastructure->id}}" class="btn btn-primary"  ><i class="icon-eye-open icon-white"></i> View More</a></span>
</span>
<span style="float:right;padding-right:10px"><a  href="project-photos/{{$infrastructure->id}}" class="btn btn"><i class="icon-film icon-black"></i>Add Images</a>
                                            
                                            
                                            </span>
</span>
                                            </td>

                                          
												
                                                 
											   
												
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

</form>
                            <form action="" method="post" >
 <div id="myAlert" class="modal hide">

              
 

	
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Edit</h3>
											</div>
											<div class="modal-body">


                                          
{{ csrf_field() }}
{{ method_field("PUT")}}
<fieldset>
						
							
						<br/><br/>
							<div class="control-group">
  								<label class="control-label"><b>Project Code</b></label>
  								<div class="controls">
                                  <input id="code" name="code" type="text" data-required="1" class="span6 m-wrap" />
  								
                                  <input id="id" name="id" type="hidden" data-required="1" class="span6 m-wrap" requred/>
  						</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Title</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="title" name="title" type="text" data-required="1" class="span6 m-wrap" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Area of Project</b><span class="required">*</span></label>
  								<div class="controls">

                                  <select id="area" name="area" >
                                  <option></option>
<option>Health</option>
<option>Power</option>
<option>Agriculture</option>
<option>Transportation</option>
<option>Education</option>
<option>Tourism</option>
                                  </select>

                                	</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Project Status</b><span class="required">*</span></label>
  								<div class="controls">

                                  <select id="status" name="status" >
<option>Commissioned</option>
<option>Pending</option>
<option>Completed</option>
<option>Inherited</option>
<option>Education</option>
<option>Tourism</option>
<option>In Progress</option>
                                  </select>

                                	</div>
  							</div>
                            
  							<div class="control-group">
  								<label class="control-label"><b>Description</b><span class="required">*</span></label>
  								<div class="controls">
                                            <textarea id="description" name="description" class="input-xlarge textarea"  placeholder="Enter item description ..." style="width: 600px; height: 200px" required></textarea>
                                          </div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Town</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="location" name="location" type="text" data-required="1" class="span6 m-wrap" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>LGA</b><span class="required">*</span></label>
  								<div class="controls">
                                      <select id="lga" name="lga" required>
                                          <opion></option>
                                          <option>Yenagoa</option>
                                          <option>Southern Ijaw</option>
                                          <option>Ogbia</option>
                                          <option>Kolokuma/Opokuma</option>
                                          <option>Ekeremor</option>
                                          <option>Nembe</option>
                                          <option>Sagbama</option>

</select>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Start Time</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="start" name="start" type="text" data-required="1" class="span6 m-wrap" required/>
  								</div>
  							</div>


                              <div class="control-group">
  								<label class="control-label"><b>Proposed End Time</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="end" name="end" type="text" data-required="1" class="span6 m-wrap" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Amount</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="amount" name="amount" type="text" data-required="1" class="span6 m-wrap" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Contractor</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="contractor" name="contractor" type="text" data-required="1" class="span6 m-wrap" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Partnership</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="partnership" name="partnership" type="text" data-required="1" class="span6 m-wrap" required/>
  								</div>
  							</div>
  							
  							
  							<div class="control-group">
  								<label class="control-label"><b>Benefits</b><span class="required">*</span></label>
  								<div class="controls">
                                            <textarea id="benefits" name="benefits" class="input-xlarge textarea"  placeholder="Enter item description ..." style="width: 600px; height: 200px" required></textarea>
                                          </div>
  							</div>
                           
							
							
							
							
							     <input type="hidden", name="id" id="app_id">
							
							
						</fieldset>
				
                                           
											</div>
											<div class="modal-footer">
												<button class="btn btn-success">Save</button>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>

                                        </div></form>



                                        <form action="" method="post" >
 <div id="success" class="modal hide">

              
 

	 {{ csrf_field() }}
											
											<div class="modal-body" style="text-align:center">
                                            <img src="{{ asset('images/success.png')}}" alt="logo" />
												<h3>Event has been saved successfuly</h3>
												
											</div>
											<div class="modal-footer">
												
												<a class="btn" href="programs">Okay</a>
											</div>

                                        </div></form>

                        </div>


                        <div id="myAlert2" class="modal hide" style="text-align:center;padding:30px">

<form  action="{{route('update.student')}}" method="POST"  >

{{ method_field("PUT")}}
{{ csrf_field() }}
                              <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">&times;</button>
                                  <h3 style="font-size:14px;text-align:left">Events/Meetings</h3>
                              </div>
                              <div class="modal-body">

                            
                              <div class="control-group">
                    <label class="control-label" style="text-align:left"><b>Activity</b><span class="required">*</span></label>
                    <div class="controls">
                        <input type="text" id="activity" name="activity" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
                    
                    
                  </div>
                </div>


               

                <div class="control-group">
                    <label class="control-label" style="text-align:left"><b>Venue</b><span class="required">*</span></label>
                    <div class="controls">
                        <input  type="text" id="venue" name="venue" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
                    </div>
                </div>

               

                <div class="control-group">
                    <label class="control-label" style="text-align:left"><b>In Attendance</b><span class="required">*</span> <br/>Please separate officials in attendance with comma (,)</label>
                    <div class="controls">
                        <input  type="text" id="attend" name="attend" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
                    </div>
                </div>


                <div class="control-group" style="text-align:left">
                    <label class="control-label" style="text-align:left"><b>Time</b><span class="required">*</span></label>
                    <div class="controls">
                    <select id="time" name="time" class="chzn-select" style="width:20%;height:30px">
                              
                                <option>1:00</option>
                                <option>2:00</option>
                                <option>3:00</option>
                                <option>4:00</option>
                                <option>5:00</option>
                                <option>6:00</option>
                                <option>7:00</option>
                                <option>8:00</option>
                                <option>9:00</option>
                                <option>10:00</option>
                                <option>11:00</option>
                                <option>12:00</option>
                              </select>
                          

                              <select id="timezone" name="timezone" class="chzn-select" style="width:20%;height:30px">
                                
                                <option>AM</option>
                                <option>PM</option>
                                <option>NOON</option>
                               
                              </select>
                          
                          </div>
                </div>

              
              
             
                

               

         
               
                

              
                              </div>
                              <div class="modal-footer">
                                    <a href="javascript:void(0);" onclick="submitFields();" class="btn btn-primary" >Save</a>
                                  <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                              </div>
</form>
                          </div>




                        <div id="myAlert3" class="modal hide" style="text-align:center;padding:30px">

              <form  action="{{route('update.events')}}" method="POST"  >
 
     {{ method_field("PUT")}}
	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3 style="font-size:20px;text-align:left">Events / Meetings Edit</h3>
											</div>
											<div class="modal-body">

                                          
                                            <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Activity</b><span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="activity2" name="activity" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
                                      <input type="hidden" id="eventid" name="eventid" data-required="1" class="span6 m-wrap" style="width:100%;height:30px">
                                  
                                  
                                </div>
                              </div>


                             

                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>Venue</b><span class="required">*</span></label>
  								<div class="controls">
  									<input  type="text" id="venue2" name="venue" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
  								</div>
                              </div>

                              <div class="control-group">
  								<label class="control-label" style="text-align:left"><b>In Attendance</b><span class="required">*</span></label>
  								<div class="controls">
  									<input  type="text" id="attend2" name="attend" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
  								</div>
                              </div>
                             

                              <div class="control-group" style="text-align:left">
  								<label class="control-label" style="text-align:left"><b>Time</b><span class="required">*</span></label>
  								<div class="controls">
                                  <select id="time2" name="time" class="chzn-select" style="width:20%;height:30px">
                                            
                                              <option>1:00</option>
                                              <option>2:00</option>
                                              <option>3:00</option>
                                              <option>4:00</option>
                                              <option>5:00</option>
                                              <option>6:00</option>
                                              <option>7:00</option>
                                              <option>8:00</option>
                                              <option>9:00</option>
                                              <option>10:00</option>
                                              <option>11:00</option>
                                              <option>12:00</option>
                                            </select>
                                        

                                            <select id="timezone2" name="timezone" class="chzn-select" style="width:20%;height:30px">
                                              
                                              <option>AM</option>
                                              <option>PM</option>
                                              <option>NOON</option>
                                             
                                            </select>
                                        
                                        </div>
                              </div>

                            
                            
                           
                              

                              <input type="hidden", name="id" id="app_id2">

                       
                             
                              

                            
											</div>
											<div class="modal-footer">
                                              	<button  class="btn btn-primary" >Save</button>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>
 </form>
										</div>

                      
                        <!-- /block -->
                    </div>
 @endsection

 <script type="text/javascript">
 function showAlertx(operation){
    var id=operation;
    var userID=$('#deleteUser'+id).attr('data-userid');
    $('#app_id').val(userID); 
    $('#myAlert').modal('show'); 
  
   
}

function senddel(){
    
    window.location="/events/delete/"+$('#app_id').val();
   
}

function showAlertEdit2(operand){
    var id=operand;
    var userID=$('#EditUser'+id).attr('data-userid');
    $('#app_id2').val(userID); 

    $.get('pullscheduledetail/'+id,function(events){


        $("#eventid").val(id);
        $("#activity2").val(events.activity);
        $("#venue2").val(events.venue);
        $("#time2").val(events.time);
        $("#timezone2").val(events.timezone);
        $('#attend2').val(events.attend);
       
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

     
      var activity= $("#activity").val();
      var venue= $("#venue").val();
      var time= $("#time").val();
      var timezone= $('#timezone').val();
      var attend=  $('#attend').val();
      var _token = $('input[name="_token"]').val();
      jQuery.ajax({
            url:'submitschedule',
                  method: 'POST',
                  data: {
					activity:activity,venue:venue,time:time,timezone:timezone,attend:attend,_token:_token
                  },
                  
                 success:function(result){
                $('#myAlert2').modal('hide'); 
                $('#success').modal('show'); 

        
                  }
                });


}


function selectAll(source) {
    checkboxes = document.getElementsByName('infrastructure[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function showAlert(operand){
    var id=operand;
    var userID=$('#EditUser'+id).attr('data-userid');
    $('#app_id').val(userID); 

    $.get('pullinfrastructuredetail/'+id,function(events){


        $("#id").val(id);
        $("#title").val(events.title);
        $("#area").val(events.project_area);
        $("#status").val(events.project_status);
        $("#code").val(events.code);
        $("#description").text(events.description);
        $("#lga").val(events.lga);
        $("#location").val(events.town);
        $('#start').val(events.start_time);
        $('#end').val(events.proposed_endtime);
        $('#amount').val(events.amount);
        $('#contractor').val(events.contractor);
        $('#partnership').val(events.partnership);
        $('#benefits').html(events.benefits);
       
    });

    $('#myAlert').modal('show'); 
  
   
}
</script>

