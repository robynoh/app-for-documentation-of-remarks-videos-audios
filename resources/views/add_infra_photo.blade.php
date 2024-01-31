@extends('layouts.app')
@section('content')
<?php use Carbon\Carbon;   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="font-size:15px; color:#000"> Project Photos</b></div>
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
<br/>
<b style="font-size:18px">{{$title}}</b><br/><br/>

{!!  ucfirst(substr($description,0,200)) !!}...


<br/>
<br/>
<div style="font-weight:bold;font-size:18px;color:#090"> Photos	</div>	<br/>

<div style="float:right;padding-right:20px"> Total Photos <b>{{$photos->count()}}</b></div>

<a href="javascript:void(0)" onclick="showAudioAlertPhoto();" class="btn btn-primary"><i class="icon-plus icon-white"></i> Add Photo</a><br/><br/>		

<?php if($photos->count()<1){?>
<div class="alert alert-info">
		
										 Upload photos of events/meeting here by clicking on the  add photo button above.
									</div>
                                    <?php }?>


                                    
                                    <div class="block-content collapse in">
                                <div class="row-fluid padd-bottom">
                                @foreach($photos as $photo)
                                <div class="span3">
                                      <a href="javascript:void(0)" id="deleteUser{{ $photo->id}}" data-userid="{{$photo->id}}" href="javascript:void(0)" onclick="showInfraPhotoBox({{ $photo->id}});" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="{{$photo->img}}">
                                      </a>
                                  </div>
                                  @endforeach


</div>

</div>

                                 
                                   
                                  
                            

                                    
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


                        <div id="myAlert2" class="modal hide" style="text-align:center;padding:30px;">

<form  action="{{route('add.transcribe')}}" method="POST"  >

{{ csrf_field() }}
                              <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">&times;</button>
                                  <h3 style="font-size:20px;text-align:left">Add Transcribe</h3>
                              </div>
                              <div class="modal-body">

                            
                              <div class="control-group">
                                         
                                          <div class="controls">
                                        <input id="eventid" name="eventid" type="hidden" value="" />
		                               <textarea name="content" id="tinymce_full" style="width:100%; height:600px"></textarea>
		                            </div>
                                        </div>


               

               

               



                

              
              
             
                

               

         
               
                

              
                              </div>
                              <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Save</button>
                                  <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                              </div>
</form>
                          </div>



                         


                          <div id="myAlert4" class="modal hide" style="text-align:center;padding:30px;">

<form  action="/addaudio/" method="POST" enctype="multipart/form-data" >

{{ csrf_field() }}
                              <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">&times;</button>
                                  <h3 style="font-size:20px;text-align:left">Add Audio</h3>
                              </div>
                              <div class="modal-body">

                              <div class="alert alert-info">	
										Please upload the audio that corresponds with the transcribed speech you posted
									</div>    

                            
                              <div class="control-group">
                                           <div class="controls">
                                            <input class="input-file uniform_on" name="file" id="fileInput" type="file">
                                          </div>
                                        </div>

               

               

               



                

              
              
             
                

               

         
               
                

              
                              </div>
                              <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Upload Now</button>
                                  <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                              </div>
</form>
                          </div>




                          <div id="myAlert5" class="modal hide" style="text-align:center;padding:30px;">

<form  action="/addinfraphoto/{{$id}}" method="POST" enctype="multipart/form-data" >

{{ csrf_field() }}
                              <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">&times;</button>
                                  <h3 style="font-size:20px;text-align:left">Add Photo</h3>
                              </div>
                              <div class="modal-body">

                              

                              <div class="alert alert-info">	
										Please upload photos of selected infrastructure
									</div>   
                                    
                                    
                                    <div class="control-group">
                                           <div class="controls">
                                           <input type="hidden" id="caption" name="id" data-required="1" class="span6 m-wrap" value="{{$id}}">
                    
                                          </div>
                                        </div>

                            
                              <div class="control-group">

                              <label class="control-label" style="text-align:left"><b>Photo</b><span class="required">*</span></label>
  								
                                           <div class="controls" style="text-align:left">
                                            <input class="input-file uniform_on" name="file" id="fileInput" type="file" required>
                                          </div>
                                        </div>

                              </div>
                              <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" >Upload</button>
                                  <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                              </div>
</form>
                          </div>



                          <div id="videoAlert" class="modal hide" style="text-align:center;padding:30px;">

<form  action="/addvideo/" method="POST" enctype="multipart/form-data" >

{{ csrf_field() }}
                              <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">&times;</button>
                                  <h3 style="font-size:20px;text-align:left">Add Youtube HTML Embed Code</h3>
                              </div>
                              <div class="modal-body">

                                    
                                    <div class="control-group">
                                    <label class="control-label" style="text-align:left"><b>Enter embed code</b><span class="required">*</span></label>
  								
                                           <div class="controls">
                                           <input type="text" id="caption" name="embed" data-required="1" class="span6 m-wrap" style="width:100%;height:30px" required>
                    
                                          </div>
</div>

                              </div>
                              <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" >Save</button>
                                  <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                              </div>
</form>
                          </div>



                          <div id="addFileAlert" class="modal hide" style="text-align:center;padding:30px;">

<form  action="/addfile/" method="POST" enctype="multipart/form-data" >

{{ csrf_field() }}
                              <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">&times;</button>
                                  <h3 style="font-size:20px;text-align:left">Upload file format of speech</h3>
                              </div>
                              <div class="modal-body">

                                    
                                    <div class="control-group">
                                   						
                                           <div class="controls">
                                           <input type="hidden" id="eventid" name="eventid" data-required="1" class="span6 m-wrap" value=""  style="width:100%;height:30px" required>
                    
                                          </div>

                                          <div class="controls" style="text-align:left">
                                            <input class="input-file uniform_on" name="file" id="fileInput" type="file" required>
                                          </div>
</div>

                              </div>
                              <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" >Save</button>
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



                                        <form action="" method="post" >
 <div id="myAlertDelete" class="modal hide">

              
 

	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Are you sure?</h3>
											</div>
											<div class="modal-body">
												<p>Do you want to delete this speech? this process can not be undone</p>
												<input type="hidden", name="id" id="app_id">
											</div>
											<div class="modal-footer">
												<a data-dismiss="modal" class="btn btn-danger" href="javascript:void(0);" onclick="senddelspeech();">Confirm</a>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>

                                        </div></form>



                                        <form action="" method="post" >
 <div id="fileDelete" class="modal hide">

              
 

	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Are you sure?</h3>
											</div>
											<div class="modal-body">
												<p>Do you want to delete the file format of this speech? this process can not be undone</p>
												<input type="hidden", name="id" id="app_idfile">
											</div>
											<div class="modal-footer">
												<a data-dismiss="modal" class="btn btn-danger" href="javascript:void(0);" onclick="senddelfile();">Confirm</a>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>

                                        </div></form>


                                        <form action="" method="post" >
 <div id="myAlertDeleteAudio" class="modal hide">

              
 

	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Are you sure?</h3>
											</div>
											<div class="modal-body">
												<p>Do you want to delete this Audio? this process can not be undone</p>
												<input type="hidden", name="id" id="app_id">
											</div>
											<div class="modal-footer">
												<a data-dismiss="modal" class="btn btn-danger" href="javascript:void(0);" onclick="senddelaudio();">Confirm</a>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>

                                        </div></form>



                                        <form action="" method="post" >
 <div id="myAlertDeleteVideo" class="modal hide">

              
 

	 {{ csrf_field() }}
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Are you sure?</h3>
											</div>
											<div class="modal-body">
												<p>Do you want to delete this Video embed code? this process can not be undone</p>
												<input type="hidden", name="id" id="app_idvideo">
											</div>
											<div class="modal-footer">
												<a data-dismiss="modal" class="btn btn-danger" href="javascript:void(0);" onclick="senddelvideo();">Confirm</a>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>

                                        </div></form>



                      
                        <!-- /block -->
                    </div>


                    <form action="" method="post" >
                
                <div id="delete-confirmation-modal3" class="modal hide">

              
 

	 {{ csrf_field() }}
											
											<div class="modal-body">
                                            <img id="imgsrc" alt="interface optin image" class="rounded-md" src="" width="100%">
                          
                                          	</div>
                                              <div class="modal-header">
                                           <span id="title" style="font-weight:bold;font-size:14px"></span>
                                           <input type="hidden", name="id" id="app_idphoto">
										
											</div>
											<div class="modal-footer">
												<a data-dismiss="modal" class="btn btn-danger" href="javascript:void(0);" onclick=" senddelinfraphoto();">Delete</a>
												<a data-dismiss="modal" class="btn" href="#">Cancel</a>
											</div>

                                        </div>
                </form>


 @endsection

 <script type="text/javascript">




 function showAlertDelete(operation){
    var id=operation;
    var userID=$('#deleteUser'+id).attr('data-userid');
    $('#app_id').val(userID); 
    $('#myAlertDelete').modal('show'); 
  
   
}

function showAudioAlertDelete(operation){
    var id=operation;
    var userID=$('#deleteUser'+id).attr('data-userid');
    $('#app_id').val(userID); 
    $('#myAlertDeleteAudio').modal('show'); 
  
   
}

function showVideoDeleteAlert(operation){
    var id=operation;
    var userID=$('#deleteUser'+id).attr('data-userid');
    $('#app_idvideo').val(userID); 
    $('#myAlertDeleteVideo').modal('show'); 
  
   
}


function showFileDelete(operation){
    var id=operation;
    var userID=$('#deleteUser'+id).attr('data-userid');
    $('#app_idfile').val(userID); 
    $('#fileDelete').modal('show'); 
  
   
}

function senddelspeech(){
    
    window.location="/speech/delete/"+$('#app_id').val();
   
}

function senddelfile(){
    
    window.location="/file/delete/"+$('#app_idfile').val();
   
}

function senddelvideo(){
    
    window.location="/video/delete/"+$('#app_idvideo').val();
   
}

function senddelinfraphoto(){

       
window.location="/infraphoto/delete/"+$('#app_idphoto').val();
 

}

function senddelaudio(){
    
    window.location="/audio/delete/"+$('#app_id').val();
   
}

function showAlertEdit2(){
  
    $('#myAlert2').modal('show'); 
  
   
}


function showVideoAlert(){
  
    $('#videoAlert').modal('show'); 
  
   
}

function showViewAlert(){
  
  $('#myAlertview').modal('show'); 

 
}

function showAudioAlert(){
  
  $('#myAlert4').modal('show'); 

 
}

function showInfraPhotoBox(id){
    var interfaceid=id;
    var userID=$('#deleteUser'+interfaceid).attr('data-userid');
    $('#app_idphoto').val(userID); 

    $.get('/photo/pullinfraphotodetail/'+interfaceid,function(detail){
     $('#imgsrc').attr('src', detail.img)
      

});

   $('#delete-confirmation-modal3').modal('show'); 

}



function showFileAlert(){
  
  $('#addFileAlert').modal('show'); 

 
}

function showAudioAlertPhoto(){
  
  $('#myAlert5').modal('show'); 

 
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

    function addtranscribe(){

   var content= tinymce.get("tinymce_full").getContent();
   var eventid= $("#eventid").val();
   var _token = $('input[name="_token"]').val();

   jQuery.ajax({

            url:'addtranscribe',
            method: 'POST',
            data: {
					content:tinymce.get("tinymce_full").getContent(),eventid:$("#eventid").val(),_token:$('input[name="_token"]').val()
                  },
                  
                 success:function(result){ 
                     alert(result);
               // $('#myAlert2').modal('hide'); 
                //$('#success').modal('show'); 

       
                  }
                });






                
}

</script>

