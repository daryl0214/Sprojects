<?php 
ob_start();
session_start();
include('inc/header.php');
require_once __DIR__."/inc/inv.php";
$inventory = new invents();
?>
	
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/product.js"></script>
<script src="js/common.js"></script>
<?php include('inc/container.php');?>
<div class="container">		
		
	<?php include("menus.php"); ?> 	
	
	<div class="row">
			<div class="col-lg-12">
				<div class="card card-default rounded-0 shadow">
                    <div class="card-header">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="card-title">Product List</h3>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                                <button type="button" name="add" id="addProduct" class="btn btn-primary bg-gradient rounded-0 btn-sm"><i class="far fa-plus-square"></i> Add Product</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="productList" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th>ID</th>      
									<th>Part Number</th>	
									<th>Common Part Number</th>									
                                    <th>Product Name</th>
									<th>Product Model</th>
                                    <th>Revision Level</th>
                                    <th>Quantity Order</th>
                                    <th>Unit Price</th>
                                    <th>Car Model</th>
                                    <th>Harness Code</th>
                                    <th>Registration Code</th>
                                    <th>Conveyor Used</th>
                                    <th>Part Name</th>
                                    <th>Supplier Code</th>
                                    <th>Item Type</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="productModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <form method="post" id="productForm">
                                <input type="hidden" name="pid" id="pid" />
                                <input type="hidden" name="btn_action" id="btn_action" />


                                <div class="form-group">
                                    <label>Part Number</label>
                                    <input type="text" name="pas_partNum" id="pas_partNum" class="form-control rounded-0" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                                </div>
                                             
                                
                                <div class="form-group">
                                    <label>Common Part Number</label>
                                    <input type="text" name="pas_compartnum" id="pas_compartnum" class="form-control rounded-0" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                                </div>


                                <div class="form-group">
                                    <label>Select Part Name</label>
                                    <select name="pas_partName" id="pas_partName" class="form-select rounded-0" required>
                                        <option value="">Select Category</option>
                                        <option value="Link Type">Link Type</option>
                                        <option value="RB Checker">RB Checker</option>
                                        <option value="AirLeak Checker">AirLeak Checker</option>
                                    </select>
                                </div>




                                <!-- CONVEYORS -->
                                <div class="form-group">
                                    <label>Select Conveyor</label>
                                    <select name="pas_conveyor" id="pas_conveyor" class="form-select rounded-0" required>
                                    <option value="">Select Conveyor</option>
                                        <option value="Link Type">S81</option>
                                        <option value="Link Type">E03</option>
                                        <option value="Link Type">W05</option>
                                        <option value="Link Type">N72</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label>Supplier Code</label>
                                    <input type="text" name="pas_supcode" id="pas_supcode" class="form-control rounded-0" required />
                                </div>



                                <div class="form-group">
                                    <label>Unit Price</label>
                                    <input type="text" name="pas_unitprice" id="pas_unitprice" class="form-control rounded-0" required />
                                </div>

                                <!-- CAR MODEL -->
                                <div class="form-group">
                                    <label>Select Car Model </label>
                                    <select name="pas_carmodel" id="pas_carmodel" class="form-select rounded-0" required>
                                    <option value="">Select Car Model</option>
                                        <option value="Link Type">TOYOTA</option>
                                        <option value="Link Type">NISSAN</option>
                                        <option value="Link Type">HONDA</option>
                                      
                                    </select>
                                </div>

                                
                                <!-- CNTRL STICKER -->
                                <div class="form-group">
                                    <label>Select Fail Proofing Sticker </label>
                                    <select name="pas_clrsticker" id="pas_clrsticker" class="form-select rounded-0" required>
                                    <option value="">Select </option>
                                        <option value="Link Type">GREEN</option>
                                        <option value="Link Type">ORANGE</option>
                                      
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>standard stock</label>
                                    <input type="text" name="pas_standardstock" id="pas_standardstock" class="form-control rounded-0" required />
                                </div>

                                <div class="form-group">
                                    <label>Safety stock</label>
                                    <input type="text" name="pas_safetystock" id="pas_safetystock" class="form-control rounded-0" required />
                                </div>
                                
                                <div class="form-group">
                                    <label>Register Code</label>
                                    <input type="text" name="pas_RegCode" id="pas_RegCode" class="form-control rounded-0" required />
                                </div>

                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="pas_location" id="pas_location" class="form-control rounded-0" required />
                                </div>

                                <div class="form-group">
                                    <label>Order Number</label>
                                    <input type="text" name="pas_orderNum" id="pas_orderNum" class="form-control rounded-0" required />
                                </div>


                                <div class="form-group">
                                    <label>Quantity Order</label>
                                    <input type="text" name="pas_Quantity_order" id="pas_Quantity_order" class="form-control rounded-0" required />
                                </div>

                                <div class="form-group">
                                    <label>Remarks</label>
                                    <input type="text" name="pas_remarks" id="pas_remarks" class="form-control rounded-0" required />
                                </div>
                                <div class="form-group">
                                    <label>Harness Code</label>
                                    <input type="text" name="pas_harness_code" id="pas_harness_code" class="form-control rounded-0" required />
                                </div>
                                
                                <div class="form-group">
                                    <label>Over Stock</label>
                                    <input type="text" name="pas_overstock" id="pas_overstock" class="form-control rounded-0" required />
                                </div>



                            

                                <!-- <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea name="description" id="description" class="form-control rounded-0" rows="5" required></textarea>
                                </div> -->


                                <!-- <div class="form-group">
                                    <label>Unit Price</label>
                                    <div class="input-group">
                                        <input type="text" name="quantity" id="quantity" class="form-control rounded-0" required pattern="[+-]?([0-9]*[.])?[0-9]+" /> 
                                        <select name="unit" class="form-select rounded-0" id="unit" required>
                                            <option value="">Select Type</option>
                                            <option value="Link Type">Link Type</option>
                                            <option value="RB Checker">RB Checker</option>
                                            <option value="AirLeak Checker">AirLeak Checker</option>
                                            

                                        </select>
                                    </div>
                                </div> -->

                                <!-- <div class="form-group">
                                    <label>Supplier</label>
                                    <select name="supplierid" id="supplierid" class="form-select rounded-0" required>
                                        <option value="">Select Supplier</option>
                                        <option value="JAPAN">JAPAN</option>

                                    </select>
                                </div>
                            </form>
                        </div> -->
                        <div class="modal-footer">
                            <input type="submit" name="action" id="action" class="btn btn-primary rounded-0 btn-sm" value="ADD" form="productForm"/>
                            <button type="button" class="btn btn-default border rounded-0 btn-sm" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
            </div>
        </div>

        <div id="productViewModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-th-list"></i> Product Details</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <Div id="productDetails"></Div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	
</div>	
<?php include('inc/footer.php');?>