@extends('layouts.app')
@section('content')
<?php use Carbon\Carbon;   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:18px; color:#000"> {{ucfirst($infrastructure->title)}}</b></div>
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

<a  href="/investment"   class="btn btn-primary btn"><i class="icon-chevron-left icon-white"></i> All Programme</a>
			 


<form action="" class="form-horizontal"  method="POST">

{{ csrf_field() }}
{{ method_field("PUT")}}
<fieldset>
						
							
						<br/><br/>
							<div class="control-group">
  								<label class="control-label"><b>Project Code</b></label>
  								<div class="controls">
                                  <input id="code" name="code" type="text" data-required="1" class="span6 m-wrap" value="{{$infrastructure->code}}" />
  								
                                  <input id="id" name="id" type="hidden" data-required="1" class="span6 m-wrap" requred/>
  						</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Title</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="title" name="title" type="text" data-required="1" class="span6 m-wrap" value="{{$infrastructure->title}}" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Area of Project</b><span class="required">*</span></label>
  								<div class="controls">

                                  <select id="area" name="area" >
                                  <option>{{$infrastructure->project_area}}</option>
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
                                      <option>{{$infrastructure->project_status}}</option>
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
                                            <textarea id="description" name="description" class="input-xlarge textarea"  placeholder="Enter item description ..." style="width: 600px; height: 200px" required>{{$infrastructure->description}}</textarea>
                                          </div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Town</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="location" name="location" type="text" data-required="1" class="span6 m-wrap" value="{{$infrastructure->location}}" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>LGA</b><span class="required">*</span></label>
  								<div class="controls">
                                      <select id="lga" name="lga" required>
                                          <opion>{{$infrastructure->lga}}</option>
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
  									<input id="start" name="start" type="text" data-required="1" class="span6 m-wrap" value="{{$infrastructure->start_time}}" required/>
  								</div>
  							</div>


                              <div class="control-group">
  								<label class="control-label"><b>Proposed End Time</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="end" name="end" type="text" data-required="1" class="span6 m-wrap" value="{{$infrastructure->proposed_endtime}}" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Amount</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="amount" name="amount" type="text" data-required="1" class="span6 m-wrap" value="{{$infrastructure->amount}}" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Contractor</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="contractor" name="contractor" type="text" data-required="1" class="span6 m-wrap" value="{{$infrastructure->contractor}}" required/>
  								</div>
  							</div>

                              <div class="control-group">
  								<label class="control-label"><b>Partnership</b><span class="required">*</span></label>
  								<div class="controls">
  									<input id="partnership" name="partnership" type="text" data-required="1" class="span6 m-wrap" value="{{$infrastructure->partnership}}" required/>
  								</div>
  							</div>
  							
  							
  							<div class="control-group">
  								<label class="control-label"><b>Benefits</b><span class="required">*</span></label>
  								<div class="controls">
                                            <textarea id="benefits" name="benefits" class="input-xlarge textarea"  placeholder="Enter item description ..." style="width: 600px; height: 200px" required>{{$infrastructure->benefits}}</textarea>
                                          </div>
  							</div>
                           
							
							
							
							
							     <input type="hidden", name="id" id="app_id">
							
							
						<div class="modal-footer" style="text-align:center">
												<button class="btn btn-success">Save</button>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>
				
                                           
											</div>
										

                                        </div>
                                        </fieldset>
					</form>
                                    
                                   
                                    
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
												<p>Do you want to delete the record of this event? this process can not be undone</p>
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
 function showAlert(operation){
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


function showAlertEdit(operand){
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

    $('#myAlert3').modal('show'); 
  
   
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
    checkboxes = document.getElementsByName('speech[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}
</script>

