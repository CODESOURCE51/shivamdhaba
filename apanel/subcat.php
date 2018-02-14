<?php  error_reporting(0);

    require("../include/connection.php");

?>
                                    <?php 

									  $sql_cat=mysql_query("select * from sub_category where cat_id='".$_REQUEST['id']."'");

									  ?>


                                   

                                   <select id="subcat_id" name="subcat_id" class="rounded">

                  				   <option value="">Select Product Subcategory</option>

                    			<?php while($cat=mysql_fetch_array($sql_cat))

								{

								?>

                                   <option value="<?php echo $cat['id']; ?>"><?php echo $cat['sname']; ?></option>

                                  <?php } ?>

                    

                    

                  </select>
