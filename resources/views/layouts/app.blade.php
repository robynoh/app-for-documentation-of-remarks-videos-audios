<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    
    <head>
        <title>Dashboard</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css')}}"></link>
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('assets/styles.css')}}" rel="stylesheet" media="screen">
        <link href="{{ asset('assets/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
      
        <link href="{{ asset('vendors/uniform.default.css')}}" rel="stylesheet" media="screen">
        <link href="{{ asset('vendors/chosen.min.css')}}" rel="stylesheet" media="screen">

        <link href="{{ asset('vendors/wysiwyg/bootstrap-wysihtml5.css')}}" rel="stylesheet" media="screen">

        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="{{ asset('vendors/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#" style="color:#000;font-size:14px;font-weight:bold"> DIGITAL DOCUMENTATION SYSTEM (DDS)</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                        
                      
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> 
								<i class="icon-user"></i> {{ Auth::user()->name }} 

                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                      
                                       
                                    </li>
                                </ul>
                               
                            </li>
                        </ul>
                        <ul class="nav">
                            
                           
                                    
                            
                       
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
              
            <div class="span3" id="sidebar" style="width:18%;margin-top:-20px;font-size:13px">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" >
                        
						<li>
                            <a href="/dashboard"><span class="badge badge-success pull-right"><?php //echo $member;?></span><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="/programs"><span class="badge badge-success pull-right"><?php //echo $member;?></span><i class="icon-chevron-right"></i> Meeting & Events Schedule</a>
                        </li>

                        

                        
						<li>
                            <a href="/all-speeches"><span class="badge badge-success pull-right"><?php //echo $helper;?></span><i class="icon-chevron-right"></i>Speech(s)</a>
                        </li>

                        <li>
                            <a href="/all-videos"><span class="badge badge-success pull-right"><?php //echo $helper;?></span><i class="icon-chevron-right"></i> All video(s)</a>
                        </li>
						
						<li>
                            <a href="/all-audios"><span class="badge badge-success pull-right"><?php //echo $feedback;?></span> <i class="icon-chevron-right"></i> Audio(s)</a>
                        </li>
						
						<li>
                            <a href="/achievements"><span class="badge badge-success pull-right"><?php //echo $feedback;?></span><i class="icon-chevron-right"></i>Achievement(s)</a>
                        </li>
						
						
                        <li id="more">
                        <a href="javascript:void(0);" onclick="showothers()">
                        <span class="badge badge-success pull-right"><?php //echo $feedback;?></span>
                        
                         View More  <span class="badge badge-success pull-right">>>></span></a>
                         
                         
                         </li>
						
						
					
						
						<li  id="others3" style="display:none">
                            <a href="/special-documents"><?php //echo $awards;?></span> <i class="icon-chevron-right"></i> Special Documents</a>
                        </li>
                        <li  id="others4" style="display:none">
                            <a href="/admin_login"><?php //echo $awards;?></span> <i class="icon-chevron-right"></i> Security Settings</a>
                        </li>
                        <li id="others" style="display:none">
                            <a href="/results"><span class="badge badge-success pull-right"><?php //echo $feedback;?></span><i class="icon-chevron-right"></i> Account(s)</a>
                        </li>
                        <li  id="others5" style="padding-left:15px;padding-top:15px; display:none">
                           
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
</a>
                        </form>
                            
                        
                        </li>
                        <li id="some" style="display:none">
                        <a href="javascript:void(0);" onclick="hideothers()">
                        <span class="badge badge-success pull-right"><?php //echo $feedback;?></span>
                        
                         Hide Some  <span class="badge badge-success pull-right"><<<</span></a>
                         
                         
                         </li>
						
						
                         <!--<li>
                            <a href="invoices"><span class="badge badge-success pull-right">731</span>Invoices</a>
                        </li>-->
                         
                         
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                      <!-- morris stacked chart -->
                   
                      @yield('content')
                    

                     <!-- wizard -->
                   
	            <!-- /wizard -->

                     <!-- validation -->
                 
                     <!-- /validation -->


                </div>
            </div>
			<br/><br/><br/><br/><br/><br/><br/>
            <hr>
            <footer>
                <p style="text-align:center"> Digital Documentation System</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <link href="{{ asset('vendors/datepicker.css')}}" rel="stylesheet" media="screen">
        <script src="{{ asset('vendors/jquery-1.9.1.js')}}"></script>
      
        <script src="{{ asset('vendors/jquery.uniform.min.js')}}"></script>
        <script src="{{ asset('vendors/chosen.jquery.min.js')}}"></script>
        <script src="{{ asset('vendors/bootstrap-datepicker.js')}}"></script>
		  <script src="{{ asset('vendors/jquery.knob.js')}}"></script>

          <script src="{{ asset('vendors/wysiwyg/wysihtml5-0.3.0.js')}}"></script>
        <script src="{{ asset('vendors/wysiwyg/bootstrap-wysihtml5.js')}}"></script>
        <script src="{{asset('vendors/ckeditor/ckeditor.js')}}"></script>
		<script src="{{ asset('vendors/ckeditor/adapters/jquery.js')}}"></script>

		<script type="text/javascript" src="{{ asset('vendors/tinymce/js/tinymce/tinymce.min.js')}}"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="{{ asset('vendors/datatables/js/jquery.dataTables.min.js')}}"></script>

	<script type="text/javascript" src="{{ asset('vendors/jquery-validation/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('assets/form-validation.js')}}"></script>
        <script>
        window.jQuery || document.write('<script src="../bower_components/jquery/dist/jquery.min.js"></script>')
        </script>
        <script src="{{asset('vendors/jQuery.print.js')}}"></script>
		
		
   
    



   
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
     


        <script src="{{ asset('assets/scripts.js') }}"></script>
        <script src="{{ asset('assets/DT_bootstrap.js') }}"></script>
       
       <script>


$(function() {
    tinymce.init({
		    selector: "#tinymce_full",
		    plugins: [
		        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		        "searchreplace wordcount visualblocks visualchars code fullscreen",
		        "insertdatetime media nonbreaking save table contextmenu directionality",
		        "emoticons template paste textcolor"
		    ],
		    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		    toolbar2: "print preview media | forecolor backcolor emoticons",
		    image_advtab: true,
		    templates: [
		        {title: 'Test template 1', content: 'Test 1'},
		        {title: 'Test template 2', content: 'Test 2'}
		    ]
		});



        });




 

       
    function showothers(){

 $('#others').show();
 $('#others2').show();
 $('#others2x').show();
 $('#others3').show();
 $('#others4').show();
 $('#others5').show();
 $('#more').hide();
 $('#some').show();

    }   

    function hideothers(){

$('#others').hide();
$('#others2').hide();
$('#others2x').hide();
$('#others3').hide();
$('#others4').hide();
$('#others5').hide();
$('#more').show();
$('#some').hide();

   }  


   jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        }); 
       </script>
    </body>

</html>