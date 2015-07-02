<?php get_header()?>

<?php if($_GET['sm']){?>
<?php setPostViews($post->ID);?>
<?php setPostViews($_GET['sm']);?>

<script>
	jQuery(document).ready(function($) {
		Cookies.set('energized', 'si');
		var url = '<?php echo get_permalink($_GET['sm'])?>';
		setTimeout(function() {
		  window.location.href = url;
		}, 5000);
	});
</script>

<?php }?>

<?php $tm = getPostViews($post->ID)?>
<?php $meta = get_field('meta' , 'options');?>

<div class="underbar navbar-fixed-top hidden-md hidden-lg hidden-sm">
	<div class="container">
		<div class="row">
        	<div class="col-md-5 col-lg-5 col-sm-6 col-xs-12 col-md-offset7 col-lg-offset-7 col-sm-offset-6 ngholder smalled">
            
            	<div class="col-xs-4 col-esp">
                	Energía <span>Team Chile</span>
                    <div class="clear"></div>
                    <span class="fa fa-thumbs-o-up fa-fw"></span> <?php echo $tm;?> de <strong><?php echo $meta;?></strong> 
                </div>
            	<div class="col-xs-8 col-esp">
                	<div class="hngbr">
                    	<div class="filler"></div>
                    </div>
                </div>
            	<style>
                	<?php $fill_h = round(($tm * 245 ) / $meta , 1)?>
					<?php $filled = round(($tm * 397 ) / $meta , 1)?>
                
					
					.hngbr .filler.fll{ width:<?php echo $fill_h.'px;'?>; transition:all 1s ease-in}
					.barr  .filled.fll{ height:<?php echo $filled.'px;'?>; transition:all 1s ease-in}
                </style>
            </div>
        </div>
	</div>
</div>

<div id="finale">
    <section id="inicio">
        <div class="container">
            <div class="row">
            
            	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 col-md-offset-3 col-lg-offset-3 col-sm-offset-3">
                	<div class="user-pic"><img src="<?php echo $_COOKIE['userpic']?>" alt="" class="img-responsive"></div>
                	<h1>Gracias <span><?php echo $_COOKIE['energizer']?> por dar tu energía</span></h1>
                    <div class="clear separator"></div>
                    
                    
                        
                        <style>
                            <?php $filled = round(($tm * 397 ) / $meta , 1)?>
                            .barr  .filled.fll{ height:<?php echo $filled.'px;'?>; transition:all 1s ease-in}
                            .total.up{ bottom:<?php echo $filled-25 .'px;'?>; transition: all .8s ease-in }
                        </style>
                        <div class="col-md-2 col-lg-2 col-sm-2 hidden-xs col-esp totalizer">
                              <div class="total">
                                <span class="fa fa-thumbs-o-up fa-fw"></span> <?php echo $tm;?>
                              </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-2 hidden-xs col-esp">
                              <div class="barr">
                                  <div class="filled"></div>
                              </div>
                        </div>
                    
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12 thnkz">
                    
                    	<img src="<?php echo get_bloginfo('template_url')?>/images/plane.png" class="img-responsive" alt="">
                       	Ya estás participando por los pasajes para tí + 1 amigo a alentar al TEAM Chile a los juegos Panamericanos de Canadá Toronto 2015
                        <div class="clear separator"></div>
                   		<small>Serás redirigido automáticamente en 5 segundos</small>
                    </div>
            	</div>
            	
                
                
			</div>
		</div>
	</section>
</div>
<div class="clear"></div>

<?php get_footer()?>