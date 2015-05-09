
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>{{ title }}<small>Preview</small>                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#product"> Product List</a></li>
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
                            <div class="box box-primary" ng-init="edit()">
                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div><!-- /.box-header -->
								
                                <!-- form start -->
                                <form role="form" method="post" name="myForm" ng-submit="submitForm(form)" enctype="multipart/form-data" novalidate> 
								
								        <div class="box-body">
                                        
										
										<div class="form-group">
                                            <label>Product Title</label>
											<input type="hidden" name="product_id" ng-model="form.product_id" />
                                            <input type="hidden" name="old_images" ng-model="form.old_image" />
                                            
											<input type="text" class="form-control" name="product_title" ng-model="form.product_title" required>
										  <span style="color:red" ng-show="myForm.product_title.$dirty && myForm.product_title.$invalid">
										  <span ng-show="myForm.product_title.$error.required">Product Title is required.</span>
										  </span>
 									   </div>
										<div class="form-group">
                                            <label>Brand</label>
                                            <input type="text" class="form-control" name="product_brand" ng-model="form.product_brand" required>
                                            <span style="color:red" ng-show="myForm.product_brand.$dirty && myForm.product_brand.$invalid">
										  <span ng-show="myForm.product_brand.$error.required">Brand Name is required.</span>
										  </span>
										</div>
										<div class="form-group">
                                            <label>Price</label>
                                            <input type="number" min="1"  name="product_price" class="form-control" ng-model="form.product_price" required>
                                            <span style="color:red" ng-show="myForm.product_price.$dirty && myForm.product_price.$invalid">
											<span ng-show="myForm.product_price.$error.required">Product Price is required.</span>
											<span ng-show="myForm.product_price.$error.min">Product Price should be more than 0.</span>
											
											</span>
										</div>
										
										<div class="form-group">
                                            <label>Available Product</label>
                                            <input type="number" name="product_quantity" min="1" class="form-control" ng-model="form.product_quantity" required>
                                            <span style="color:red" ng-show="myForm.product_quantity.$dirty && myForm.product_quantity.$invalid">
											<span ng-show="myForm.product_quantity.$error.required">Product Quantity is required.</span>
											<span ng-show="myForm.product_quantity.$error.min">Product Quantity should be more than 0.</span>
											
											</span>
										</div>
										
										
										<div class="form-group">
                                            <label>Images</label>
				
                                            <input type="file" name="product_image[]" ng-model="form.product_image" ng-file-select="onFileSelect($files)" multiple>
										    <span class="" ng-show="upsuccess.length > 0">Successfully uploaded :<b> {{ upsuccess }} </b></span><br />
											<span class="" ng-show="uperror.length > 0">Not uploaded : {{ uperror }}</span>
									
										    <img ng-repeat="img in imgs" style="height:50px;width:50px;margin:3px;" ng-src="upload/{{ img }}"/>
												
										</div>
										
										
										
                                        <div class="form-group">
                                            <label>Product Description</label>
											<textarea class="form-control" name="product_desc" ng-model="form.product_desc" required></textarea>
                                            <span style="color:red" ng-show="myForm.product_desc.$dirty && myForm.product_desc.$invalid">
										  <span ng-show="myForm.product_desc.$error.required">Product Description is required.</span>
										  </span>
										  
										</div>
                                        
                                        <div class="form-group">
                                            <label>Product Category</label>
											
											<select class="form-control" name="product_category" ng-model="form.product_category" required>
											  <option ng-repeat="obj in catoption" value="{{obj.category_id}}">{{obj.category_title}}</option>
											</select>
											<span style="color:red" ng-show="myForm.product_category.$dirty && myForm.product_category.$invalid">
										  <span ng-show="myForm.product_category.$error.required">Product Category is required.</span>
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
           