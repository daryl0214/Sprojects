<?php 
ob_start();
include('inc/header.php');
require_once __DIR__."/inc/inv.php";
include('config/configs.php');

?>

	
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/product.js"></script>
<script src="js/common.js"></script>

<?php include('inc/container.php');?>
<?php include('message.php');?>


<?php include("menus.php"); ?> 	

	
	<div class="row">
			<div class="col-lg-12">
				<div class="card card-default rounded-0 shadow">
                    <div class="card-header">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="card-title">Transaction</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                            <a  href= "acce.php" class="btn btn-primary btn-sm rounded-0"></i> GO BACK</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">                    
                        <div class="row"><div class="col-sm-9 table">
                            <table id="orderList" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th><h3>PART NO.<h3></th>
                                    <th><h3>PART NAME<h3></th> 
                                    <th><h3>CLASSIFICATION<h3> </th>
                                     

                                    <th><h3>SUPPLIER<h3></th>
                                    <th><h3>REGISTRATION CODE<h3></th> 
                                    <th><h3>LOCATION<h3></th>
                                    <th><h3>BALANCE<h3></th> 
                                    <th><h3>ACTION<h3></th> 
                                 

                                </thead></tr>
                                <tbody>
                                <?php 
                                													

                                
                                                                       
                                    if(isset($_GET['id']))
                                       
                                    {
                                        $gettingid = validateInput($db->conn, $_GET['id']);
                                        $inventory = new invents;
                                        $result = $inventory->acce($gettingid);

                                     
                                       //echo [$result];     
                                        
                                        if($result)
                                        {
                                            ?>
                                                 
                                            
                                                     <td> <h4><input name="acce_partnumber" readOnly id="acce_partnumber" value=<?=$result['acce_partnumber'] ?>><h4> </input> </td>  
                                                
                                               
                                                    <td> <h4> <input name="acce_partname" readOnly id="acce_partname" value=<?=$result['acce_partname'] ?>><h4> </input> </td>  
                                           
                                                    <td>  <h4> <input name="supplertype" readOnly id="supplertype" value=<?=$result['supplertype'] ?>> <h4></input> </td>  
                                                     
                                            
                                                    <td>  <h4> <input name="acce_supplier" readOnly id="acce_supplier" value=<?=$result['acce_supplier'] ?>> <h4></input> </td>  
                                            


                                          
                                                    <td><h4> <input name="acce_regcode" readOnly id="acce_regcode" value=<?=$result['acce_regcode'] ?>> <h4></input> </td>  
                                          
                                                    <td><h4> <input name="acce_location" readOnly id="acce_location" value=<?=$result['acce_location'] ?>><h4> </input> </td>  
                                                    <td><h4> <input name="acce_balance" readOnly id="acce_balance" value=<?=$result['acce_balance'] ?>><h4> </input> </td> 

                                                    <td><button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" title="IN"> <i class="fa fa-download" ></i>TRANSACTION</button>

                                                    
                                                                                                                                                                                              
                                            <?php

                                        }
                                        else{
                                            echo"<h4>NO RECORD FOUND<h4>";
                                        }
                                    }
                                    else{
                                        echo "<h4>SOMETHING WENT WRONG</h4>";
                                        
                                        
                                    }
                                    //echo "Today is " . date("Y/m/d") . "<br>";
                                    ?>
                                </tbody>
                            </table>

                                

                            <button type="button" class="btn btn-primary" id="live_search_button">History</button>
                                
                                    <input type="hidden" class="form-control" id="live_search" value="<?=$result['acce_partnumber'] ?>" autocomplete="off" placeholder="Type here...">

                               
                                <div id="searchresult"></div>

                                <script>
                                    $(document).ready(function(){
                                        $("#live_search_button").click(function (){
                                            var input = $("#live_search").val();
                                            //alert(input);
                                            if(input !== " "){
                                                $.ajax({
                                                    url:"timers5.php",
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
                                            </script>
                                           

                                </thead></tr>
                                </div></table>
                        </div></div>
                    </div>
                
		</div> </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">TRANSACTION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                            
            <div class="form-group">
            <form action="bravo1.php" method="POST">
                <input type="hidden" name="pid" id="pid" />
                <input type="hidden" name="btn_action" id="btn_action" />

                <?php                                                            
                if(isset($_GET['id']))     
                {
                    $gettingid = validateInput($db->conn, $_GET['id']);
                    $inventory = new invents;
                    $result = $inventory->acce($gettingid);
                    if($result)
                    {
                        ?>
                    <td> <h4><input type= "hidden" name="acce_partnumber" readOnly id="acce_partnumber" value=<?=$result['acce_partnumber'] ?>><h4> </input> </td> 
                    <td><input type= "hidden" name="id" readOnly id="id" value=<?=$result['ID'] ?>> </input>  </td>
                    <span> <input type="hidden" name="acce_balance" readOnly id="acce_balance" value=<?=$result['acce_balance'] ?>> </input> </span> 
                    <div class="form-group">
                        <label>FULL NAME</label>
                        <input type="text" name="acce_fname" id="acce_fname" class="form-control rounded-0"  />
                    </div>

                    <div class="form-group">
                        <label>RECEIVED QUANTITY</label>
                        <input type="number" name="acce_rcvdqty" id="acce_rcvdqty" value='0' class="form-control rounded-0"  />
                        
                    </div>
                    <div class="form-group">
                        <label>QUANTITY & ORDER NUMBER</label>
                        <input type="input" name="acce_ordernumber" id="acce_ordernumber" class="form-control rounded-0"  />
                        
                    </div>

                   
                        <?php

                    }
                    else{
                        echo"<h4>NO RECORD FOUND<h4>";
                    }
                    }
                    else{
                    echo "<h4>SOMETHING WENT WRONG</h4>";
                    }
                    ?>
        
           
			</div>
            
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="addtran" id="addtran" class="btn btn-primary ">SUBMIT </button>	
			</div>
			</div>
		</div>
		</div>
