
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>{{ title }}</h1>
                   
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
                                <form role="form" method="post" name="myForm" ng-submit="changeForm(form)" novalidate> 
								
								        <div class="box-body">
                                        
										
										<div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" class="form-control" ng-model="form.email" required>
                                            <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
											<span ng-show="myForm.email.$error.required">Email is required.</span>
											<span ng-show="myForm.email.$error.email">Invalid email address.</span>
											</span>
										</div>
										
										<div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control" name="oldpassword" ng-model="form.oldpassword" required>
                                             <span style="color:red" ng-show="myForm.oldpassword.$dirty && myForm.oldpassword.$invalid">
										  <span ng-show="myForm.oldpassword.$error.required">Old Password is required.</span>
										  </span>
										</div>
										
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="newpassword" ng-model="form.newpassword" required>
                                             <span style="color:red" ng-show="myForm.newpassword.$dirty && myForm.newpassword.$invalid">
										  <span ng-show="myForm.newpassword.$error.required">New Password is required.</span>
										  </span>
										</div>
                                        
                 
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary" name="cat_button" value="" ng-disabled="myForm.$invalid">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                  
                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
           