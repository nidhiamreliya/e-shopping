<!-- products -->
<div class="products">
	<div class="container">
		<div class="products-grids">
			<div class="col-md-8 products-grid-left">
				<div class="products-grid-lft" id="products">
					
					<div class="row">
						<div class="text-center">
							<font color="#F65A5B">
							<ul class="pagination pagination-md">
								<a class="btn btn-block continue" id="view_more" val="1">View More</a>
			  				</ul>
			  			</div>
			  		</div>
				</div>
			</div>
			<div class="col-md-4 products-grid-right">
				<div class="w_sidebar">
					<div class="w_nav1">
						<a href="<?php echo site_url('catalog')?>"><h4>All</h4></a>
					</div>
					<section  class="sky-form">
						<h4>catogories</h4>
						<div class="row1 scroll-pane">
						</div>
					</section>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //products -->
<script type="text/javascript">
	$(document).ready(function(){

		$.ajax({
	            url:  "<?php echo base_url(); ?>" + "e_shopping/index.php/user_products/products",   
	            type: "POST",
	            data:{
	                page: $("#view_more").attr("val")
	            },

	            success: function(response) {
	                if (response) {
	                  	$("#products").prepend(response);
	                  	count = $("#view_more").attr("val");
	                  	count++;
	                  	$("#view_more").attr("val", count);
	                } else {
	                	alert(response.msg);
	                }
	            }
	        });

	    /*$("#view_more").click(function()
	        $.ajax({
	            url:  "<?php echo base_url(); ?>" + "e_shopping/index.php/user_products/products",   
	            type: "POST",
	            data:{
	                page: $(#view_more).attr("val");
	            },

	            success: function(response) {
	                if (response) {
	                  	$("#products").prepend(response);
	                  	count = $("#view_more").attr("val");
	                  	count++;
	                  	$("#view_more").attr("val", count);

	                } else {
	                	alert(response);
	                }
	            }
	        });
	    });*/
	});
</script>