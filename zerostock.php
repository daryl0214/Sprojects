<?php 
ob_start();
// session_start();
include('inc/header.php');
include('config/configs.php');
require_once __DIR__."/inc/inv.php";
$inventory = new invents();

?>
	
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/product.js"></script>
<script src="js/common.js"></script>
<script src="js/modcon.js"></script>

<?php include('inc/container.php');?>

<div class=".container-xl">		

		
	<?php include("menus.php"); ?> 	
	

                                <div class="form-group">
                                    <input type="show" class="form-control" id="live_search1"  autocomplete="OFF" placeholder="Type here...">

                                </div>
                                <div id="searchresult"></div>

                                <script>
                                    $(document).ready(function(){
                                        $("#live_search1").keyup(function (){
                                            var input = $("#live_search1").val();
                                            //alert(input);
                                            if(input !== " "){
                                                $.ajax({
                                                    url:"zero.php",
                                                    method:"POST",
                                                    data:{input:input},
                                                    success:function(data){
                                                        $("#searchresult").html(data);
                                                    }                                                              
                                                });
                                            }else{
                                                    $("#searchresult").css("display","none");
                                                }

                                            });

                                        });    
                                            
                                </script>                 
<?php include('inc/footer.php');?>