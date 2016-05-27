<!DOCTYPE html>
<html>
<head>
<title>Pendent Store</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pendent Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url("assets/fonts/css/font-awesome.min.css") ?>" rel="stylesheet">
<!-- js -->
<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.js"); ?>"></script>  
<script type="text/javascript" src="<?php echo base_url("assets/js/form_validation.js"); ?>"></script>  

<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url('assets/js/move-top.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/easing.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/cart_data.js')?>"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){   
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- start menu -->
<link href="<?php echo base_url('assets/css/megamenu.css')?>" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url('assets/js/megamenu.js')?>"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="<?php echo base_url('assets/js/menu_jquery.js')?>"></script>
<script src="<?php echo base_url('assets/js/simpleCart.min.js')?>"> </script>
<link href='http://fonts.googleapis.com/css?family=Monda:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- header -->
  
<!-- //header -->
<!-- top-header -->
<div class="top_bg">
    <div class="container">
        <div class="header_top-sec">
            <div class="top_right">
                <ul>
                    <li>Contact</li>|
                    <li><a href="<?php echo site_url('user/orders') ?>">Track Order</a></li>
                </ul>
            </div>
            <div class="top_left">
                <ul>
                <?php
                    if($this->session->userdata('user_id') !== FALSE)
                    {
                ?>
                        <li class="top_link"><a href="<?php echo site_url('user/orders') ?>"><?php echo $this->session->userdata('first_name');?></a></li>
                        <li>|</li>
                        <li class="top_link"><a href="<?php echo site_url('user_control/logout')?>">Log Out </a></li> 
                 <?php  
                    }
                    else
                    {
                ?>
                        <li class="top_link"><a href="<?php echo site_url('login')?>">Log In</a></li> 
                <?php
                    }
                ?>        
              </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- top-header -->
<!-- logo-cart -->
<div class="header_top">
    <div class="container">
        <div class="logo">
            <a href="<?php echo site_url() ?>">Pendent Store</a>       
        </div>
        <div class="header_right">
            <div class="cart box_1">
                <a href="<?php echo site_url('cart')?>">
                <h3> <div class="total">
                    (<span id="total_items"></span> items)</div>
                    <img src="<?php echo base_url('assets/images/cart1.png')?>" alt=""/></h3>
                </a>
                <div class="clearfix"> </div>
            </div>         
        </div>
        <div class="clearfix"></div>  
    </div>
</div>
<!-- //logo-cart -->
<!------>
<div class="mega_nav">
    <div class="container">
        <div class="menu_sec">
            <!-- start header menu -->
            <ul class="megamenu skyblue">
                <li class="<?php echo $this->uri->segment(1) == '' ? 'active grid' : '' ?>"><a class="color1" href="<?php echo site_url() ?>">Home</a></li>
                <li class="<?php echo $this->uri->segment(1) == 'catalog' ? 'active grid' : '' ?>"><a class="color1" href="<?php echo site_url('catalog')?>">category</a>
                    <div class="megapanel">
                        <div class="h_nav">
                            <ul>
                            <?php
                                if(!$category){
                                    echo 'No Data available';
                                } else {
                            ?>
                                <?php foreach ($category as $row):?>
                                    <li><a href="<?php echo site_url('catalog').'/'.$row->slug ?>"><?php echo $row->category_name ?></a></li>
                                <?php endforeach ?>
                            <?php
                                }
                            ?>
                            </ul> 
                        </div>              
                    </div>
                </li>       
            </ul> 
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        type: 'post',
        url: "<?php echo base_url(); ?>" + "e_shopping/index.php/cart/items_in_cart",
        data:{
            total_cart_items:"total"
        },
        dataType: 'JSON',
        success:function(response) {
            if(response.status){
                $('#total_items').html(response.msg);
            } else {
                $('#total_items').html(0);
            }
        }
    })
});

</script>