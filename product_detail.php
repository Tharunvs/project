
	
		<div class="item-container">	
			<div class="container" ng-init="productdetail()">	
			<div class="alert alert-success alert-dismissable" ng-show="message.length > 0">
				<i class="fa fa-ban"></i>
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">�</button>
				<b>Alert!</b>{{ message }}
			</div>
				<div class="col-md-4">
<div class="container">
        <div id="main_area">
                <!-- Slider -->
                <div class="row">
                    <div class="col-xs-12" id="slider">
                        <!-- Top part of the slider -->
                        <div class="row">
                            <div class="col-sm-12" id="carousel-bounding-box">
                                <div class="carousel slide" id="myCarousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div ng-repeat="im in explode(product.product_image)" class="item" ng-class="$index==0 ? 'active' : ''" data-slide-number="{{ $index }}">
                                        <img ng-src="admin/upload/{{im}}"></div>

                                       
                                    
                                       
                                    </div><!-- Carousel nav -->
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>                                       
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>                                       
                                    </a>                                
                                    </div>
                            </div>

                            

                            
                        </div>
                    </div>
                </div><!--/Slider-->

                <div class="row hidden-xs" id="slider-thumbs">
                        <!-- Bottom switcher of slider -->
                        <ul class="hide-bullets">
                            <li class="col-md-4" ng-repeat="img in explode(product.product_image)">
                                <a class="thumbnail" id="carousel-selector-{{ $index }}"><img ng-src="admin/upload/{{img}}"></a>
                            </li>

               
                            
                        </ul>                 
                </div>
        </div>
</div>
					
					
				</div>
					
				<div class="col-md-6">
					<div class="product-title">{{ product.product_title }}</div>
					<div class="product-desc">{{ product.product_brand }}</div>
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<div class="product-price">{{ product.product_price | currency }}</div>
					<div class="product-stock" ng-show="product.product_quantity > 0">In Stock</div>
					<div class="product-stock" ng-hide="product.product_quantity > 0">Out Of Stock</div>
					<hr>
					
					<div class="btn-group cart">
						<button type="button" ng-click="addcart(pro.product_id,session_id)" class="btn btn-success">
							Add to cart 
						</button>
					</div>
					<div class="btn-group wishlist">
						<button ng-click="addWishlist(pro.product_id,session_id)" type="button" class="btn btn-danger">
							Add to wishlist 
						</button>
					</div>
				</div>
			</div> 
		</div>
		<div class="container-fluid">		
			<div class="col-md-12 product-info">
					
				<div  class="tab-content">
						
					<div class="tab-pane fade in active" id="service-two">
						
						<section class="container">
								<h3>Description Of Product : {{ product.product_title }}</h3>
								<div class="col-md-12">
								  {{ product.product_desc }}
								</div>
						</section>
						
						<section class="container">
								
									<div class="col-md-8">
									<h3>Leave Comment About Product</h3>
    	<div class="well well-sm">
            
        
            <div class="row" id="post-review-box" >
                <div class="col-md-12">
                    <form role="form" name="myForm" ng-submit="reviewForm(form.comment,product.product_id)" method="post" id="review-form" novalidate >
                        
                        <textarea class="form-control animated" required cols="50" id="new-review" name="comment" ng-minlength="10" ng-model="form.comment" placeholder="Enter your review here..." rows="5"></textarea>
                        <span style="color:red" ng-show="myForm.comment.$dirty && myForm.comment.$invalid">
					  <span ng-show="myForm.comment.$error.required">Comment is required.</span>
					   <span ng-show="myForm.comment.$error.minlength">Please Enter more than 10 characters.</span>
					  </span>
						<div class="text-left">
						<div ng-init="rating = star.rating + 1"></div>

<div class="star-rating" star-rating rating-value="rating"

 data-max="10" on-rating-selected="rateFunction(rating,product.product_id)"></div>
						</div>
                        <div class="text-right">
                             
                            <button class="btn btn-success btn-lg" type="submit" ng-disabled="myForm.$invalid">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
         
		</div>
						</section>
						
					</div>
					
				</div>
				<hr>
			</div>
		</div>
<script>
	  jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        $('#carousel-text').html($('#slide-content-0').html());
 
        //Handles the carousel thumbnails
       $('[id^=carousel-selector-]').click( function(){
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });
 
 
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});

</script>