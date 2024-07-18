<?php 
include('inc/header.php');
ob_start();

// session_start();

include('config/configs.php');
require_once __DIR__."/inc/inv.php";
$inventory = new invents();

?>
<style>
html,
body,
body>.container {
    height: 50%;
    width: 100%;

}
body>.container {
	display:flex;
	flex-direction:column;
	align-items:center;
	justify-content:flex;
}
#title{
	text-shadow:2px 2px 5px #000;
} 

</style>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/common.js"></script>


<?php include('inc/container1.php');?>

	<h1 class="text-center my-8 py-6 text-light" id="title">WELCOME TO PROCUREMENT AND SUPPLY </h1>	
	<div class="col-lg-8 col-md-10 col-sm-15 col-xs-18">
		<div class="card rounded-0 shadow">
			<div class="card-header1">
			<?php include("sections.php"); ?> 
				
				
			</div>
			<div class="card-body1">
				<div class="container-fluid">
				<form action="#.php" method="POST">
				<div class="row">
						<div class="col-sm-12 table-responsive">
						
							
							
							<table id="example2" class="table table-bordered table-striped">
							<a type="button"href=" index.php" class="btn btn-primary bg-gradient rounded-0 btn-sm"><i class="far fa-plus-square"></i> LOG IN</a>
								<thead><tr>
									
									<!-- //<th>IMAGE</th> -->
									<th>PART NO.</th>
									<th>PART NAME</th>
									<th>REGISTRATION CODE</th>
									<th>LOCATION</th>
									<th>REMAINING STOCK</th>
									<th> </th>
								
								</thead>
								<body>
								<tbody  id="searchresult">
								
								<?php
								
                                        $in = $inventory->setups();
                                        if($in)                                          
                                        {                                           
                                            foreach($in as $row)
                                            
                                                                                      
                                            {    
                                                ?>
                                                <tr>
													<!-- <td><?= $row['ID'] ?></td> -->
													<!-- <td><img   height="50" width="50"  src="./image/<?php echo $row['acce_image']; ?>"></td> -->
													<td><?= $row['setup_partnumber'] ?></td>
													<td><?= $row['setup_partname'] ?></td>
													
											
												
													<td><?= $row['setup_regcode'] ?></td>
											
													<td><?= $row['setup_location'] ?></td>
													<td><?= $row['setup_balance'] ?></td>
												
												
												
        
                                                

                                                    <td>
                                                    <form action="action.php" method="post">   
													<!-- <a type="button" class="btn btn-primary" href ="process.php?id=<?= $row['ID'] ?>"  id= "addBrand"> REQUEST</a> -->
                                                    </form>
													
                                                </tr>
												
                                                <?php   
                                            }                               
                                        }
                                        else{
                                            echo"No record Found!";

                                        }
                                        ?>
										
								
										

									</tbody>
									<script src="pas/plugins/jszip/jszip.min.js"></script>
									<script src="pas/plugins/pdfmake/pdfmake.min.js"></script>
									<script src="pas/plugins/pdfmake/vfs_fonts.js"></script>
									<script>
											$(function () {

												$("#example2").DataTable({
												"responsive": true, "lengthChange": true, "autoWidth": true	,       "paging": true,
												"buttons": [ "csv", "excel", "pdf", "print"]
												}).buttons().container().appendTo('#example2_wrapperl .col-md-6:eq(0)');

													$("#Soon").DataTable({
												"responsive": true, "lengthChange": false, "autoWidth": false,       "paging": true,
												"buttons": [ "csv", "excel", "pdf", "print"]
												}).buttons().container().appendTo('#Soon_wrapper .col-md-6:eq(0)');

											});



											</script>

								
								
                                            
                                                             
							</table>
							
						</div>
						<div class="form-group">


                                </div>
                                

								<script>
									$(document).ready(function(){
										$("#live_search12").on("keyup",function (){
											var input = $("#live_search12").val();
											//alert(input);
											if(input !== " "){
												$.ajax({
													url:"timers2.php",
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

   
			

			</div>
		</div>
       
        
	</div>	
	
					
	</div>		
<?php include('inc/footer.php');?>
<!-- Button trigger modal -->

<!-- Modal -->
