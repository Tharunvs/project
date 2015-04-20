
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Edit User Information                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#user-list"> User List</a></li>
                        <li class="active"> User</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
						
						
                        <div class="col-md-12">
						
						
						<div class="box-body">
						
								
                                    <div class="alert alert-danger alert-dismissable" ng-show="error.length > 0">
                                        <i class="fa fa-ban"></i>
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <b>Alert!</b>{{ error }}
                                    </div>
                                   
                                    <div class="alert alert-success alert-dismissable" ng-show="success.length > 0">
                                        <i class="fa fa-check"></i>
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <b>Alert!</b>{{ success }}
                                    </div>
									
                                </div>
								
								
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div><!-- /.box-header -->
								
                                <!-- form start -->
                                <form role="form" method="post" name="myForm" ng-submit="updateForm(form)" novalidate> 
								
								        <div class="box-body">
                                        
										<div class="form-group">
                                            <label>Full Name</label>
											<input type="hidden" name="user_id" ng-model="form.user_id" />
                                            <input type="text" class="form-control" name="user" ng-model="form.user_name" required>
										  <span style="color:red" ng-show="myForm.user.$dirty && myForm.user.$invalid">
										  <span ng-show="myForm.user.$error.required">Username is required.</span>
										  </span>
 									   </div>
										<div class="form-group">
                                            <label>Nick Name</label>
                                            <input type="text" class="form-control" name="nickname" ng-model="form.user_nickname" required>
                                            <span style="color:red" ng-show="myForm.nickname.$dirty && myForm.nickname.$invalid">
										  <span ng-show="myForm.nickname.$error.required">Nickname is required.</span>
										  </span>
										</div>
										<div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" ng-model="form.user_email" required>
                                            <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
											<span ng-show="myForm.email.$error.required">Email is required.</span>
											<span ng-show="myForm.email.$error.email">Invalid email address.</span>
											</span>
										</div>
										
										
										
                                        <div class="form-group">
                                            <label>Address</label>
											<textarea class="form-control" name="address" ng-model="form.user_address" required></textarea>
                                            <span style="color:red" ng-show="myForm.address.$dirty && myForm.address.$invalid">
										  <span ng-show="myForm.address.$error.required">Address is required.</span>
										  </span>
										</div>
                                        
                                        <div class="form-group">
                                            <label>Gender</label>
											<select class="form-control" name="gender" ng-model="form.user_gender">
                                                <option value="M" >Male</option>
                                                <option value="F" >Female</option>
                                            </select>
										</div>
										

                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary"  ng-disabled="myForm.$invalid">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                  
                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
           