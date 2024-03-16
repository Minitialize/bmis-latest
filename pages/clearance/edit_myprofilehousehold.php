<!DOCTYPE html>
<html>

    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
    ob_start();
    include('../head_css.php'); ?>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        HOUSEHOLD INFORMATION
                    </h1>
                    
                </section>

                <div class="box"> 
                        
                        <h3>Profile</h3>
    
    <?php
    if (isset($_SESSION['popup_msg_member'])) {
       echo $_SESSION['popup_msg_member'];
       unset($_SESSION['popup_msg_member']);
    }
    $household_uk = $_GET['ID'];
    $squery = mysqli_query($con, "SELECT * FROM tbl_resident_house_member WHERE household_uk = '$household_uk'") or die('Error: ' . mysqli_error($con));
    
    // $squery = mysqli_query($con, "SELECT * FROM tbl_resident_new as table1  
    // inner join tbl_resident_house_member as table2 on table1.household_member_uk = table2.household_uk  
    // ") or die('Error: ' . mysqli_error($con));
    
     if(mysqli_num_rows($squery) > 0)
            {
                echo '<h4>Found household member: '.mysqli_num_rows($squery).'</h4>';
    
                $x = 1;
                
                while($row = mysqli_fetch_array($squery))
                {
    ?>
                                     <div class="row" style = "padding-top:10px; margin:10px; border: 2px solid gray; border-radius:10px;">
                                            <div class="col-md-4">
                                            <label for="Address">First name</label> 
                                            <input type="text" name = "u_address"  value = "<?= $row['f_name'] ?>" class="form-control" id="Address" readonly>
                                            </div>
    
                                            <div class="col-md-4">
                                            <label for="Address">Middle name</label> 
                                            <input type="text" name = "u_address"  value = "<?= $row['m_name'] ?>"  class="form-control" id="Address" readonly>
                                            </div>
                                            <div class="col-md-4">
                                            <label for="Address">Last name</label> 
                                            <input type="text" name = "u_address"  value = "<?= $row['l_name'] ?>"  class="form-control" id="Address" readonly>
                                            </div>
    
                                            <div class="form-group col-md-4">
                                            <label for="Birthdate">Birthdate</label>
                                            <input type="text" name = "birthdate"  value = "<?= $row['hmemberb_date'] ?>"  class="form-control" id="Birthdate" readonly>
                                            </div>
    
                                            <div class="form-group col-md-4">
                                            <label for="hmember_occupation">Relationship</label>
                                            <input type="text" name = "hmember_occupation" class="form-control"  value = "<?= $row['hmember_relationship'] ?>"id="hmember_occupation" readonly>
                                            </div>
    
                                            <div class="form-group col-md-4">
                                            <label for="hmember_occupation">Occupation</label>
                                            <input type="text" name = "hmember_occupation"   value = "<?= $row['hmember_occupation'] ?>" class="form-control" id="hmember_occupation"readonly>
                                            </div>
    
                                            <div class="form-group col-md-6">
    
                                                <button type="button" data-toggle="modal" data-target="#myModal_editmember<?= $row['household_id'] ?>" class = "btn btn-block btn-primary">EDIT</button>
    
                                            </div>
    
                                            <div class="form-group col-md-6">
    
                                            <button type="button" data-toggle="modal" data-target="#myModa_deletemember<?= $row['household_id'] ?>" class = "btn btn-block btn-danger">DELETE</button>
    
                                            </div>
                                     </div>
    
    
    <!-- modal -->
    
    

    
    <form action="edit_member.php" method="post">
    <div class="modal fade" id="myModal_editmember<?= $row['household_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Member</h4>
          </div>
          <div class="modal-body">
            
                            <div class="row">
                            <input type="hidden" name = "household_id"  value = "<?= $row['household_id'] ?>" class="form-control" id="Address" readonly>
                            <input type="hidden" name = "household_uk"  value = "<?= $household_uk ?>" class="form-control" id="Address" readonly>
    
                            
    
    
                                            <div class="col-md-4">
                                            <label for="f_name">First name</label> 
                                            <input type="text" name = "f_name"  value = "<?= $row['f_name'] ?>" class="form-control" id="f_name" >
                                            </div>
    
                                            <div class="col-md-4">
                                            <label for="m_name">Middle name</label> 
                                            <input type="text" name = "m_name"  value = "<?= $row['m_name'] ?>"  class="form-control" id="m_name" >
                                            </div>
                                            <div class="col-md-4">
                                            <label for="l_name">Last name</label> 
                                            <input type="text" name = "l_name"  value = "<?= $row['l_name'] ?>"  class="form-control" id="l_name" >
                                            </div>
    
                                            <div class="form-group col-md-4">
                                            <label for="hmemberb_date">Birthdate</label>
                                            <input type="date" name = "hmemberb_date"  value = "<?= $row['hmemberb_date'] ?>"  class="form-control" id="hmemberb_date" >
                                            </div>
    
                                            <div class="form-group col-md-4">
                                            <label for="hmember_relationship">Relationship</label>
                                            <input type="text" name = "hmember_relationship" class="form-control"  value = "<?= $row['hmember_relationship'] ?>"id="hmember_relationship" >
                                            </div>
    
                                            <div class="form-group col-md-4">
                                            <label for="hmember_occupation">Occupation</label>
                                            <input type="text" name = "hmember_occupation"   value = "<?= $row['hmember_occupation'] ?>" class="form-control" id="hmember_occupation">
                                            </div>
                        </div>
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" name  ="updatemember" class="btn btn-primary">Save changes and Update</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <!-- modal end -->
    
    
    
    <!-- Modal -->
    <form action="edit_member.php" method="post">
    
    <div class="modal fade" id="myModa_deletemember<?= $row['household_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        
          <div class="modal-body">
    
                        <h3 class = "text-center"> Are you sure you want to delete <?= $row['f_name'] ?> <?= $row['m_name'] ?> <?= $row['l_name'] ?>?</h3>
    
                            <div class="row">
                            <input type="hidden" name = "household_id"  value = "<?= $row['household_id'] ?>" class="form-control" id="Address" readonly>
                            <input type="hidden" name = "household_uk"  value = "<?= $household_uk ?>" class="form-control" id="Address" readonly>
    
                            
    
    
                                            <div class="col-md-4">
                                            <input type="hidden" name = "f_name"  value = "<?= $row['f_name'] ?>" class="form-control" id="f_name" >
                                            </div>
    
                                            <div class="col-md-4">
                                            <input type="hidden" name = "m_name"  value = "<?= $row['m_name'] ?>"  class="form-control" id="m_name" >
                                            </div>
                                            <div class="col-md-4">
                                            <input type="hidden" name = "l_name"  value = "<?= $row['l_name'] ?>"  class="form-control" id="l_name" >
                                            </div>
    
    
                                             <div class="col-md-6">
                                            <button type="button" class="btn btn-block btn-default" data-dismiss="modal">No</button>
                                            </div>
                                             <div class="col-md-6">
                                             <button type="submit" name  ="deletemember" class="btn btn-block btn-danger">Yes</button>
                                             </div>
                        </div>
    
          </div>
         
        </div>
      </div>
    </div>
    
    </form>
    
    
    
    
    
                                     <?php
                }
    
            }else{
    
                echo '<h3 class = "text-center">No household member found!</h3>';
    
            }
    
    ?>
    
                        </div>         
    



                
                <?php }
        
        include "../footer.php"; ?>
    </body>
</html>

