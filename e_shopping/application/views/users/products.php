<!-- products -->
<div class="products">
	<div class="container">
		<div class="products-grids">
			<div class="col-md-8 products-grid-left">
				<div class="products-grid-lft">
				<?php
					if(!$products)
					{
						echo "Sorry no products available for this category";
					}
					else
					{
				?>
						<?php foreach ($products as $row): ?>
							<div class="products-grd">
								<div class="p-one simpleCart_shelfItem prd">
									<a href="<?php echo site_url('view'),'/'.$row->slug?>">
										<img src="<?php echo $row->product_img != null ? base_url('assets/images/products').'/'.$row->product_img : base_url('assets/images/products/default.jpg') ?>" alt="" class="img-responsive" />
										<div class="mask">
											<span>Quick View</span>
										</div>
										<h4><?php echo $row->product_name ?></h4>
									</a>
									<input type="hidden" id="quantity" value="1">
									<p data-id="<?php echo $row->product_id?>" class="additem">
										<i></i>
										<span class=" item_price valsa"><?php echo $row->product_price ?><e class="fa fa-inr" aria-hidden="true"></e></span>
									</p>
								</div>	
							</div>
						<?php endforeach ?>
				<?php 
					}
				?>
				</div>
			</div>
			<div class="col-md-4 products-grid-right">
				<div class="w_sidebar">
					<div class="w_nav1">
						<a href="<?php echo site_url('product')?>"><h4>All</h4></a>
					</div>
					<section  class="sky-form">
						<h4>catogories</h4>
						<div class="row1 scroll-pane">
						<?php foreach ($category as $row):?>
							<div class="col col-4">
								<?php if($row->slug == $this->uri->segment(2)): ?> 

										<label class="checkbox"><a href="<?php echo site_url('product').'/'.$row->slug ?>"><input type="checkbox" name="checkbox" checked=""><i></i><?php echo $row->category_name ?></a></label>

								<?php else : ?>
										<label class="checkbox"><a href="<?php echo site_url('product').'/'.$row->slug ?>"><input type="checkbox" name="checkbox"><i></i><?php echo $row->category_name ?></a></label>
								<?php endif ?>
							</div>
						<?php endforeach ?>
						</div>
					</section>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //products -->
