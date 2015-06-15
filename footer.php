<footer>
	<div class="container">
    	<div class="row">
        	
            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
				<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'footer-nav' , 'theme_location' => 'secondary' ) ); ?>
                <div class="clear"></div>
                <small>
                	Deportes Sparta Limitada, <br> 
					© derechos reservados. SV II – 2013
                </small>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 hidden-xs hidden-sm middel">
            	<img src="<?php echo get_bloginfo('template_url')?>/images/logo-footer.png" alt="">
                <div class="clear separator"></div>
                <img src="<?php echo get_bloginfo('template_url')?>/images/footsportman.png" alt="">
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            	<div class="socials">
                	<h2>Síguenos en:</h2>
                    <ul>
                    	<li><a href="<?php echo get_field('facebook' , 'options')?>"><div class="fb"><span class="fa fa-facebook fa-fw"></span></div> /spartachile</a></li>
                    	<li><a href="<?php echo get_field('twitter' , 'options')?>"><div class="tw"><span class="fa fa-twitter fa-fw"></span></div> /SpartaChile</a></li>
                    </ul>
                </div>
            </div>
            
            
        </div>
    </div>
</footer>

</body>
<?php wp_footer()?>
</html>