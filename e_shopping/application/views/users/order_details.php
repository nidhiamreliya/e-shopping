<div class="container">
	<div class="check">	 
		<div class="col-md-6 col-md-offset-3 cart-total">
			<p class="text-success">
			<?php 
				if($this->session->flashdata('successful'))
				{
					echo $this->session->flashdata('successful');
				}
			?>
			</p>
			<?php 
				if($order == null)
				{
					echo "Currently not any order placed in your account.";
				}
				else
				{
					foreach ($order as $row) {
			?>
					<div class="price-details">
					<ul class="total_price">
						<li class="last_price"><h2>Order Details</h2></li>
						<div class="clearfix"></div>
						<li class="last_price">Order no:</li>
						<li class="last_price"><b><?php echo $row->order_no ?></b></li><br/>
						<li class="last_price">Order Date:</li>
						<li class="last_price"><b><?php echo $row->order_date ?></b></li><br/>
						<li class="last_price">Total amount:</li>
						<li class="last_price"><b><?php echo $row->amount ?></b></li><br/>
						<li class="last_price">Shipping address:</li>
						<li class="last_price"><b><?php echo $row->shipping_address ?></b></li>
					</ul>
						<div class="clearfix"></div>			 
					</div>	
					<br/><br/>
					<span>Delivery status:</span>
					<span class="total1">  
					<?php 
						if(! $row->delivery_date)
						{
							echo "  not delivered";
						}
						else
						{
							echo $row->status . " on " . $row->delivery_date;
						}
					?></span>
					<div class="clearfix"></div>
			<?php
					} 
				}
			?>
		</div>
	</div>
</div>
