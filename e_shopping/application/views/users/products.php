<!-- products -->
	<div class="products">
		<div class="container">
			<div class="products-grids">
				<div class="col-md-8 products-grid-left">
					<div class="products-grid-lft">
						<?php foreach ($products as $row): ?>
							<div class="products-grd">
								<div class="p-one simpleCart_shelfItem prd">
									<a href="single.html">
										<img src="<?php echo base_url('assets/images/products').'/'.$row->product_img?>" alt="" class="img-responsive" />
										<div class="mask">
											<span>Quick View</span>
										</div>
									</a>
									<h4><?php echo $row->product_name ?></h4>
									<p><a class="item_add" href="#"><i></i> <span class=" item_price valsa"><?php echo $row->product_price ?><e class="fa fa-inr" aria-hidden="true"></e></span></a></p>
									<div class="pro-grd">
										
									</div>
								</div>	
							</div>
						<?php endforeach ?>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 products-grid-right">
					<div class="w_sidebar">
						<div class="w_nav1">
							<a><h4>All</h4></a>
						</div>
						<section  class="sky-form">
							<h4>catogories</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Necklaces</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ear Rings</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rings</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Wedding Rings</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Braceletes</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>assumenda est</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>tempore</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>soluta nobis</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>molestiae</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>repudiandae sint</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>nobis est</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>assumenda est</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>tempore</label>
								</div>
							</div>
						</section>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!-- //products -->