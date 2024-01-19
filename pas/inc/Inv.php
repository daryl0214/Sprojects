<?php
class invents {
    private $host  = 'localhost';
    private $user  = 'root';
    private $password   = '';
    private $database  = 'db_parts';   
    private $productTable = 'tbl_inventory_system';
    private $dbConnect = false;
    public function __construct(){
            if(!$this->dbConnect){ 
                $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
                if($conn->connect_error){
                    die("Error failed to connect to MySQL: " . $conn->connect_error);
                }else{
                    $this->dbConnect = $conn;
                }
            }
    }

    private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;   
        
    }

    
    public function addProduct() {		
        $sqlInsert = "
            INSERT INTO ".$this->productTable."( pas_partNum, pas_compartnum, pas_partName , pas_supcode , pas_unitprice, pas_carmodel, pas_clrsticker, pas_standardstock, pas_safetystock, pas_RegCode, pas_location, pas_orderNum, pas_Quantity_order, pas_remarks, pas_harness_code, pas_conveyor, pas_overstock) 
            VALUES ('".$_POST["pas_partNum"]."', '".$_POST['pas_compartnum']."', '".$_POST['pas_partName']."', '".$_POST['pas_supcode']."', '".$_POST['pas_unitprice']."', '".$_POST['pas_carmodel']."', '".$_POST['pas_clrsticker']."', '".$_POST['pas_standardstock']."', '".$_POST['pas_safetystock']."',
            '".$_POST['pas_RegCode']."', '".$_POST['pas_location']."', '".$_POST['pas_orderNum']."', '".$_POST['pas_Quantity_order']."', '".$_POST['pas_remarks']."', '".$_POST['pas_harness_code']."', '".$_POST['pas_conveyor']."', '".$_POST['pas_overstock']."')";		
        mysqli_query($this->dbConnect, $sqlInsert);
        echo 'New Product Added';
    }   


    

    // Product management 
	public function getProductList(){				
		$sqlQuery = "SELECT * FROM ".$this->productTable.
		$result = mysqli_query($this->dbConnect, $sqlQuery);
        echo($result);
		$numRows = mysqli_num_rows($result);
        echo($result);
		$productData = array();	
		while( $product = mysqli_fetch_assoc($result) ) {					
            $productRow = array();
            $productRow[] = $product['pas_partNum'];
            $productRow[] = $product['pas_compartnum'];
            $productRow[] = $product['pas_partName '];
            $productRow[] = $product['pas_supcode '];	
            $productRow[] = $product['pas_unitprice'];			
            $productRow[] = $product["pas_carmodel"];
            $productRow[] = $product['pas_standardstock'];
            $productRow[] = $product['pas_safetystock'];
            $productRow[] = $product['pas_RegCode'];
            $productRow[] = $product['pas_location'];
            $productRow[] = $product['pas_orderNum'];
            $productRow[] = $product['pas_Quantity_order'];
            $productRow[] = $product['pas_remarks'];
            $productRow[] = $product['pas_harness_code'];
            $productRow[] = '<div class="btn-group btn-group-sm"><button type="button" name="view" id="'.$product["pid"].'" class="btn btn-light bg-gradient border text-dark btn-sm rounded-0  view" title="View"><i class="fa fa-eye"></i></button><button type="button" name="update" id="'.$product["pid"].'" class="btn btn-primary btn-sm rounded-0  update" title="Update"><i class="fa fa-edit"></i></button><button type="button" name="delete" id="'.$product["pid"].'" class="btn btn-danger btn-sm rounded-0  delete" data-status="'.$product["status"].'" title="Delete"><i class="fa fa-trash"></i></button></div>';
            $productRow[] = $product['pas_conveyor'];
            $productRow[] = $product['pas_overstock'];
            $productData[] = $productRow;

        
                        
        }
        $outputData = array(
            "draw"    			=> 	intval($_POST["draw"]),
            "recordsTotal"  	=>  $numRows,
            "recordsFiltered" 	=> 	$numRows,
            "data"    			=> 	$productData
        );
        echo json_encode($outputData);

        echo($result);
    }
   


    public function getProductDetails(){
		$sqlQuery = " SELECT * FROM ".$this->productTable;
		$result = mysqli_query($this->dbConnect, $sqlQuery);			
		while( $product = mysqli_fetch_assoc($result)) {
            $output['pas_partNum'] = $product['pas_partNum'];
            $output['pas_compartnum'] = $product['pas_compartnum'];
            $output['pas_partName '] = $product['pas_partName '];
            $output['pas_supcode '] = $product['pas_supcode '];	
            $output['pas_unitprice'] = $product['pas_unitprice'];			
            $output["pas_carmodel"] = $product["pas_carmodel"];
            $output['pas_standardstock'] = $product['pas_standardstock'];
            $output['pas_safetystock'] = $product['pas_safetystock'];
            $output['pas_RegCode'] = $product['pas_RegCode'];
            $output['pas_location'] = $product['pas_location'];
            $output['pas_orderNum'] = $product['pas_orderNum'];
            $output['pas_Quantity_order'] = $product['pas_Quantity_order'];
            $output['pas_remarks'] = $product['pas_remarks'];
            $output['pas_harness_code'] = $product['pas_harness_code'];
            $output['pas_conveyor'] = $product['pas_conveyor'];
            $output['pas_overstock'] = $product['pas_overstock'];
		}
		echo json_encode($output);
    }

}

            
   
    

 ?>