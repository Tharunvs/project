
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>{{ title }}<small>Preview</small>                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#employer-list"> User List</a></li>
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
                                <form role="form" method="post" name="myForm" ng-submit="submitForm(form)" novalidate> 
								
								        <div class="box-body">
                                        
										
										<div class="form-group">
                                            <label>User Name</label>

                                            <input type="text" class="form-control" name="user" ng-model="form.user" required>
										  <span style="color:red" ng-show="myForm.user.$dirty && myForm.user.$invalid">
										  <span ng-show="myForm.user.$error.required">Username is required.</span>
										  </span>
 									   </div>
										
										<div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" ng-model="form.email" required>
                                            <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
											<span ng-show="myForm.email.$error.required">Email is required.</span>
											<span ng-show="myForm.email.$error.email">Invalid email address.</span>
											</span>
										</div>
										
										<div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" ng-model="form.password" required>
                                             <span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
										  <span ng-show="myForm.password.$error.required">Password is required.</span>
										  </span>
										</div>
										
										<div class="form-group">
											<label for="phone">Phone</label>
											
											<input type="text" name="phone" class="form-control" ng-model="form.user_phone" ng-pattern="/^(\d{10,12})$/" required placeholder="Phone Number">
											 <span style="color:red" ng-show="myForm.phone.$dirty && myForm.phone.$invalid">
										  <span ng-show="myForm.phone.$error.required">Phone Number is required.</span>
										  <span ng-show="myForm.phone.$error.pattern">Invalid Phone Number.</span>
										  </span>
										</div>
										
                                        <div class="form-group">
                                            <label>Address</label>
											<textarea class="form-control" name="address" ng-model="form.address" required></textarea>
                                            <span style="color:red" ng-show="myForm.address.$dirty && myForm.address.$invalid">
										  <span ng-show="myForm.address.$error.required">Address is required.</span>
										  </span>
										</div>
                                        
                                        <div class="form-group">
											<label for="city">City</label>
											<input type="text" name="city" class="form-control" ng-model="form.user_city" ng-pattern="/^([a-zA-Z' ]+)$/" required placeholder="City">
											<span style="color:red" ng-show="myForm.city.$dirty && myForm.city.$invalid">
										  <span ng-show="myForm.city.$error.required">City Name is required.</span>
										  <span ng-show="myForm.city.$error.pattern">Invalid City Name.</span>
										  </span>
										</div>
										
										<div class="form-group">
											<label for="address">State</label>
											<input type="text" name="state" class="form-control" ng-model="form.user_state" ng-pattern="/^([a-zA-Z' ]+)$/" required placeholder="State">
											<span style="color:red" ng-show="myForm.state.$dirty && myForm.state.$invalid">
										  <span ng-show="myForm.state.$error.required">State is required.</span>
										  <span ng-show="myForm.state.$error.pattern">Invalid State Name.</span>
										  </span>
										</div>
										
										<div class="form-group">
											<label for="address">Zipcode</label>
											<input type="text" name="zipcode" class="form-control" ng-model="form.user_zipcode" ng-pattern="/^(\d{6}-\d{5}|\d{6})$/" required placeholder="Zipcode">
											<span style="color:red" ng-show="myForm.zipcode.$dirty && myForm.zipcode.$invalid">
										  <span ng-show="myForm.zipcode.$error.required">Address is required.</span>
										  <span ng-show="myForm.zipcode.$error.pattern">Invalid Zipcode.</span>
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
           