<?php get_header()?>

<div class="liner">
    <section id="inicio">
        <div class="container">
            <div class="row">
                
                <?php $acciones = get_field('acciones')?>
                <?php $accion_1 = wp_get_attachment_image_src( $acciones[0]['accion'] , 'acciones')?>
                <div class="col-md-5 col-lg-5 col-sm-4 col-xs-12">
                    <img src="<?php echo $accion_1[0]?>" class="img-responsive" alt="">
                </div>
                
                <div class="col-md-7 col-lg-7 col-sm-8 col-xs-12">
                    
                    <div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
                    
                    <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
                        <h1><?php echo $post->post_title?></h1>
                        <h2><?php //echo '';?> <?php ?></h2>
                        <?php echo apply_filters('the_content' , $post->post_content)?>
                        <h3>Galería</h3>
                        
                        <div class="galeria">
                            <?php $galeria = get_field('galeria')?>
                            <?php foreach($galeria as $image):?>
                                <div class="col-md-2 col-lg-2 col-xs-4 col-sm-3 col-esp">
                                    <a href="<?php echo $image['url']?>" rel="Shadowbox['Galería']"><img src="<?php echo $image['sizes']['thumbnail']?>" class="img-responsive" alt=""></a>
                                </div>
                            <?php endforeach?>
                        </div>
                        <div class="clear separator"></div>
                        <div class="darenergiabig">
                        	<a href="" data-toggle="modal" data-target="#darenergia"><img src="<?php bloginfo('template_directory')?>/images/darenergiabig.png" alt=""></a>
                        </div>
                        
                    </div>
                    
                    
                    
                </div>
                
            </div>
        </div>
    </section>
</div>


<div class="clear"></div>

<?php $team = get_posts(array('post_type' => 'deportista' , 'numberposts' => -1 ))?>
<?php $tg = count($team);?>
<script>
jQuery(document).ready(function($) {
	jQuery('.carro').carouFredSel({
		responsive: true,
		width: '100%',
		scroll: 5,
		auto:false,
		prev: '#ante',
		next: '#sgte',
		pagination: "#pager",
		 items: {
			//width: 200,
			//height: '50%',  //  optionally resize item-height
			visible: {
				min: 5,
				max: <?php echo $tg?>
			}
		} 
	});
});
</script>

<section id="energy-bars">
	<div class="container">
    	<div class="row carrusel">
            
            <ul class="carro">
            	
                <?php $dc = 0;?>
                <?php $tm = getPostViews(24);?>
				<?php foreach($team as $deportista):?>
                <?php $dc++?>
                
                <li class="col-md-20 sportman">
                    <h4><?php echo $deportista->post_title?></h4>
                    <div class="clear"></div>
                    <div class="bar bar-ver izq">
                        
                        <?php 
                        $sm = getPostViews($deportista->ID);
                        $percent = round(( $sm * 165)/ $tm , 1); 
                        
                        ?>
                        <?php //$barra = 100*$percent?>
                        <div class="barra" style="height:<?php echo $percent?>px; margin-top:<?php echo 165-$percent;?>px"></div>
                    </div>
                    <div class="der infod">
                        
                        <?php echo get_the_post_thumbnail($deportista->ID , 'mini' , array('class' => 'img-responsive aligncenter'))?>
                        <div style="text-align:center">
                            <a href="<?php echo get_permalink($deportista->ID)?>"><span id="nrg-<?php echo $deportista->post_name?>" class="btn-primary btn btn-sm gv-nrg">Dar Energía</span></a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    
                    
                </li>
                <?php endforeach;?>
                
            </ul>
        	<div class="clear"></div>
            <div class="controls">
            	<div id="ante" class="control"><span class="fa fa-chevron-left"></span></div>
                <div id="sgte" class="control"><span class="fa fa-chevron-right"></span></div>
            </div>
        </div>
    </div>
</section>

<div class="clear"></div>

<section id="tildead">
	<div class="container">
		<div class="row">
        
        	
        
        </div>
	</div>
</section>

<a href="<?php echo get_page_link(24)?>/?sm=<?php echo $post->ID?>" class="btn btn-success btn-lg">#</a>


<h1>Energía total<?php echo getPostViews(24)?></h1>
<h1>Energía individuo<?php echo getPostViews($post->ID)?> </h1>


<?php get_footer()?>