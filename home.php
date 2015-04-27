
		<div class="container">
		    <div class="alert alert-success alert-dismissable" ng-show="success.length > 0">
				<i class="fa fa-check"></i>
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<b>Alert!</b>{{ success }}
			</div>
			<div class="row">
				<div class="col-md-6" ng-repeat="data in categories">
					<div class="elect_prodct">
						<div class="hm_prod_hed">
							<div class="hm_prod_text">{{ data.category_title }}</div>
							<div class="hm_prod_ero"></div>					
						</div>
						<div class="hm_prod_box" ng-init="product = getProductData(data.category_id)">
					        
							<div class="col-md-6" ng-repeat="dc in product.content">
	                            
								<div class="hm-product">
								    <a href="#/product-detail/{{ dc.product_id }}">
									<div class="hm-product_img">
										<img ng-src="admin/upload/{{mySplit(dc.product_image,0)}}">
									</div>
									<div class="hm-product_dtel">
										<p>{{ dc.product_title }}</p>
										<h3>{{ dc.product_price | currency}}</h3>
									</div>
									</a>
								</div>
							</div>
							
							
							
						</div>
					</div>
				</div>

			</div>
			
		</div>
		