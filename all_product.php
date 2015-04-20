  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="futur_prodct_box">
          <div class="ftr-pro-hed">FEATURED PRODUCTS</div>
          <div class="ftr-pro-box">
            <div class="ftr-pro-inner">
              <div class="ftr-prod-img"> <img src="front_design/img/lapy.jpg"> </div>
              <div class="ftr-prod-text">
                <p>Sony Vaio E-Series</p>
                <h3>$28.99<span>$30.54</span></h3>
                <img src="front_design/img/start.jpg"> </div>
            </div>
            <div class="ftr-pro-inner">
              <div class="ftr-prod-img"> <img src="front_design/img/lapy.jpg"> </div>
              <div class="ftr-prod-text">
                <p>Sony Vaio E-Series</p>
                <h3>$28.99<span>$30.54</span></h3>
                <img src="front_design/img/start.jpg"> </div>
            </div>
            <div class="ftr-pro-inner">
              <div class="ftr-prod-img"> <img src="front_design/img/lapy.jpg"> </div>
              <div class="ftr-prod-text">
                <p>Sony Vaio E-Series</p>
                <h3>$28.99<span>$30.54</span></h3>
                <img src="front_design/img/start.jpg"> </div>
            </div>
            <div class="ftr-pro-inner">
              <div class="ftr-prod-img"> <img src="front_design/img/lapy.jpg"> </div>
              <div class="ftr-prod-text">
                <p>Sony Vaio E-Series</p>
                <h3>$28.99<span>$30.54</span></h3>
                <img src="front_design/img/start.jpg"> </div>
            </div>
            <div class="ftr-pro-inner">
              <div class="ftr-prod-img"> <img src="front_design/img/lapy.jpg"> </div>
              <div class="ftr-prod-text">
                <p>Sony Vaio E-Series</p>
                <h3>$28.99<span>$30.54</span></h3>
                <img src="front_design/img/start.jpg"> </div>
            </div>
          </div>
        </div>
        <div class="add_block">
          <div class="add_one"> <img src="front_design/img/Add-one.jpg"> </div>
          <div class="add_one"> <img src="front_design/img/Add-two.jpg"> </div>
        </div>
      </div>
      <div class="col-md-9" ng-init="getProductCat()">
	     
        <div class="usr_pro_all">
          <div class="usr_pro_hed">
            <div class="col-md-8">
              <div class="srch_bar">
                <div id="custom-search-input">
                  <div class="input-group col-md-12">
                    <input type="text" ng-model="search" ng-change="filter()" class="form-control input-lg" placeholder="Buscar" />
                    <span class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="button"> <i class="glyphicon glyphicon-search"></i> </button>
                    </span> </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="category_btn">
                <ul class="nav navbar-nav">
                  <li class="dropdown catgry_drop"> <a href="#" class="dropdown-toggle for_catogry" data-toggle="dropdown">CATEGORIES <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li ng-repeat="data in categories"><a href="#/product-category/{{data.category_id}}">{{ data.category_title }}</a></li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="usr_pro_dtl"></div>
        </div>
        <div class="row">
          <div ng-repeat="pro in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" class="col-md-4">
            <div class="user-product">
              <div class="usr-product_img"> <img ng-src="admin/upload/{{mySplit(pro.product_image,0)}}">
                <div class="tag_line">New</div>
              </div>
              <div class="user-product_dtel">
                <p>{{ pro.product_title }} - {{ pro.product_brand }}</p>
                <h3>${{ pro.product_price }}</h3>
                <img src="front_design/img/start.jpg"> </div>
                 
			  <div class="prod_demo_jump_btn">
                <div class="wish_list_box" ng-init="wish = isinwish(pro.product_id)">
                  <button ng-show="session_id" ng-class="wish.inwish.status ? 'wish_active' : ''" class="btn btn-info btn-small" ng-click="addWishlist(pro.product_id,session_id)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm-{{pro.product_id}}"> <i class="glyphicon  glyphicon-heart"></i> </button>
                  <button ng-hide="session_id" class="btn btn-info btn-small" type="button" data-toggle="modal" data-target=".bs-example-modal-sm-{{pro.product_id}}"> <i class="glyphicon  glyphicon-heart"></i> </button>
                
				</div>
                <div class="modal fade bs-example-modal-sm-{{pro.product_id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header for_added_msg">
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
					  <div>
                      <div ng-show="session_id">{{ message }}</div>
					  <div ng-hide="session_id">{{ session_id }}
					  <div class="col-md-12">
					   <form role="form" name="myForm" ng-submit="loginForm(form)" method="post" id="login-form" novalidate autocomplete="off">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" name="email" id="email" ng-model="form.email" required class="form-control" placeholder="somebody@example.com">
								<span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
								<span ng-show="myForm.email.$error.required">Email is required.</span>
								<span ng-show="myForm.email.$error.email">Invalid email address.</span>
								</span>
							</div>
							<div class="form-group">
								<label for="key" class="sr-only">Password</label>
								<input type="password" name="password" id="key" class="form-control" name="password" ng-model="form.password" required placeholder="Password">
								<span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
					  <span ng-show="myForm.password.$error.required">Password is required.</span>
					  </span>
							</div>
							
							<input type="submit" ng-disabled="myForm.$invalid" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
						</form>
  					</div></div>
					<div class="clearfix"></div>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="add_cart_box" ng-init="cart = isincart(pro.product_id)">
                  <button ng-show="session_id" ng-class="cart.incart.status ? 'wish_active' : ''" class="btn btn-info btn-small" ng-click="addcart(pro.product_id,session_id)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm_one-{{pro.product_id}}"> <i class="glyphicon glyphicon-shopping-cart "></i> </button>
				  <button ng-hide="session_id" class="btn btn-info btn-small" type="button" data-toggle="modal" data-target=".bs-example-modal-sm_one-{{pro.product_id}}"> <i class="glyphicon glyphicon-shopping-cart "></i> </button>
                </div>
                <div class="modal fade bs-example-modal-sm_one-{{pro.product_id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header for_added_msg">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
					  <div>
                      <div ng-show="session_id">{{ message }}</div>
					  <div ng-hide="session_id"> {{ session_id }}
					  <div class="col-md-12">
					    <form role="form" name="myForm" ng-submit="loginForm(form)" method="post" id="login-form" novalidate autocomplete="off">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" name="email" id="email" ng-model="form.email" required class="form-control" placeholder="somebody@example.com">
								<span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
								<span ng-show="myForm.email.$error.required">Email is required.</span>
								<span ng-show="myForm.email.$error.email">Invalid email address.</span>
								</span>
							</div>
							<div class="form-group">
								<label for="key" class="sr-only">Password</label>
								<input type="password" name="password" id="key" class="form-control" name="password" ng-model="form.password" required placeholder="Password">
								<span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
					  <span ng-show="myForm.password.$error.required">Password is required.</span>
					  </span>
							</div>
							
							<input type="submit" ng-disabled="myForm.$invalid" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
						</form>
  					</div>
					  </div>
					  <div class="clearfix"></div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
        </div>
        <div class="col-md-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>No Records Found</h4>
            </div>
        </div>
        <div class="col-md-12" style="text-align:center;" ng-show="filteredItems > 6">  

            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
            
            
        </div>
		
	  </div>
    </div>
  </div>
