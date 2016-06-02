<!-- products -->
<div class="products">
	<div class="container">
		<div class="products-grids">
			<div class="col-md-8 products-grid-left">
				<div class="products-grid-lft" id="products">
				</div>
				<div class="row">
						<div class="text-center">
							<font color="#F65A5B">
							<ul class="pagination pagination-md">
								<a class="btn btn-block continue" id="view_more" val="1" max="<?php echo $links ?>">View More</a>
			  					<img id="loading" src="<?php echo base_url('assets/images').'/pg.gif'?>"/>
			  				</ul>
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
						<?php if(!$category): ?>
								<span>sorry no data available</span>
						<?php else: ?>
							<?php foreach ($category as $row):?>
								<div class="col col-4">
									<?php if($row->slug == $this->uri->segment(2)): ?> 
											<label class="checkbox"><a href="<?php echo site_url('catalog').'/'.$row->slug ?>"><input type="checkbox" name="checkbox" checked=""><i></i><?php echo $row->category_name ?></a></label>

									<?php else : ?>
											<label class="checkbox"><a href="<?php echo site_url('catalog').'/'.$row->slug ?>"><input type="checkbox" name="checkbox"><i></i><?php echo $row->category_name ?></a></label>
									<?php endif ?>
								</div>
							<?php endforeach ?>
						<?php endif ?>
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
		$('#loading').show();
		$("#view_more").hide();
		$.ajax({
            url:  "<?php echo base_url(); ?>" + "e_shopping/index.php/user_products/products",   
            type: "POST",
            data:{
                page: 1
            },
            success: function(response) {
                if (response) {
                	$('#loading').hide();
                	$("#view_more").show();
                  	$("#products").prepend(response);
                  	count = $("#view_more").attr("val");
                  	count++;
                  	if(count > $("#view_more").attr("max"))
                  	{
                  		$("#view_more").remove();
                  	} else {
                  		$("#view_more").attr("val", count);
                  	}
            	}
            }
        });

	    $("#view_more").click(function(){
	    	$("#view_more").hide();
	    	$('#loading').show();
	        $.ajax({
	            url:  "<?php echo base_url(); ?>" + "e_shopping/index.php/user_products/products",   
	            type: "POST",
	            data:{
	                page: $("#view_more").attr("val")
	            },

	            success: function(response) {
	                if (response) {
	                	$('#loading').hide();
				    	$("#view_more").show();
	                  	$("#products").append(response);
	                  	count = $("#view_more").attr("val");
	                  	count++;
	                  	if(count > $("#view_more").attr("max"))
	                  	{
	                  		$("#view_more").remove();
	                  	} else {
	                  		$("#view_more").attr("val", count);
	                  	}
	                }
	            }
	        });
	    });
	});
</script>