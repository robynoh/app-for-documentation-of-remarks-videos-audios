@extends('layouts.app')
@section('content')
<?php   use \App\Http\Controllers\resultController; ?>
<div class="row-fluid">
                        <!-- block -->
                         <!-- jQuery knobs -->
                         <div class="row-fluid">
                        <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h5>Welcome! {{ ucwords(Auth::user()->name) }}</h5>
                        	To navigate through the documentation system use the tabs at the left side</div>
                        	
                    	</div>
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b style="color:#000">Dashboard</b></div>
                                <div class="pull-right"><span class="badge badge-warning">View More</span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
							<img src="images/banner.png" />
                                
                            </div>
                        </div>
                        <!-- /block -->
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