<?php  error_reporting(0);

    require("../include/connection.php");

?>

                                 <select id="subcat_id" name="subcat_id" class="rounded">
                  				   <option value="">Select Product Subcategory</option>
                                   <option value="<?php echo $cat['id']; ?>"><?php echo $cat['sname']; ?></option>
                 				 </select>
