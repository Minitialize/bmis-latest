<!-- ========================= MODAL ======================= -->
            <div id="addModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Manage Clearance</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Clearance #:</label>
                                    <input name="txt_cnum" class="form-control input-sm" type="number" placeholder="Clearance #"/>
                                </div>
                                <div class="form-group">
                                    <label>Resident:</label>
                                    <select name="ddl_resident" class="select2 form-control input-sm" style="width:100%">
                                        <option selected="" disabled="">-- Select Resident -- </option>
                                        <?php
                                            $squery = mysqli_query($con,"SELECT r.id,r.lname,r.fname,r.mname from tblresident r where ((r.id not in (select personToComplain from tblblotter)) or (r.id in (select personToComplain from tblblotter where sStatus = 'Solved')) ) and lengthofstay >= 6");
                                            while ($row = mysqli_fetch_array($squery)){
                                                echo '
                                                    <option value="'.$row['id'].'">'.$row['lname'].', '.$row['fname'].' '.$row['mname'].'</option>    
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Findings:</label>
                                    <input name="txt_findings" class="form-control input-sm" type="text" placeholder="Findings"/>
                                </div>
                                <div class="form-group">
                                    <label>Purpose:</label>
                                    <input name="txt_purpose" class="form-control input-sm" type="text" placeholder="Purpose"/>
                                </div>
                                <div class="form-group">
                                    <label>OR Number:</label>
                                    <input name="txt_ornum" class="form-control input-sm" type="number" placeholder="OR Number"/>
                                </div>
                                <div class="form-group">
                                    <label>Amount:</label>
                                    <input name="txt_amount" class="form-control input-sm" type="number" placeholder="Amount"/>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_add" value="Add Clearance"/>
                    </div>
                </div>
              </div>
              </form>
            </div>

            <div id="addHouseholdModal" class ="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Manage Household</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input name="txt_zone" class="form-control input-sm" type="text" placeholder="Zone #"/>
                                </div>
                                <div class="form-group">
                                    <label>Middle Name:</label>
                                    <input name="txt_uname" class="form-control input-sm" id="username" type="text" placeholder="Username"/>
                                    <label id="user_msg" style="color:#CC0000;" ></label>
                                </div>
                                <div class="form-group">     <!-- not finished yet -->
                                    <label>Last Name:</label>
                                    <input name="txt_pass" class="form-control input-sm" type="password" placeholder="*******"/>
                                </div>
                                <div class="form-group">
                                    <label>Birth Date:</label>
                                    <input name="txt_fullname" class="form-control input-sm" id="username" type="date" placeholder="Birth Date"/>
                                </div>
                                <div class="form-group">
                                    <label>Relationship:</label>
                                    <input name="txt_bday" class="form-control input-sm" id="username" type="text" placeholder="Relationship"/>
                                </div>
                                <div class="form-group">
                                    <label>Occupation:</label>
                                    <input name="txt_addr" class="form-control input-sm" id="username" type="text" placeholder="Occupation"/>
                                </div>
                                <div class="form-group">
                                    <label>Status:</label>
                                    <input name="txt_bcontactno" class="form-control input-sm" id="username" type="text" placeholder="Status"/>
                                </div>
                            </div> <!-- up to here -->
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_add2" value="Add" id="btn_add2"/>
                    </div>
                </div>
              </div>
              </form>
            </div>