<?php get_header()?>

<div class="liner">
    <section id="inicio" class="da-games">
        <div class="container">
            <div class="row">
                
      
                <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                	<img src="<?php bloginfo('template_directory')?>/images/da-games.png" class="img-responsive" alt="">
                </div>
                                
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    
                    <div class="sm-head">
                    	
                        <?php $ti = explode(' ',$post->post_title) ?>
                        <h1><?php echo $ti[0]; echo ' <span>'.$ti[1].'</span>';?></h1>
                       
                    </div>
                    
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
                    
                </div>
                
            </div>
        </div>
    </section>
</div>

<div class="clear"></div>
<?php //team ?>
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
				<?php foreach($team as $deportista):?>
                <?php $dc++?>
                
                <li class="col-md-20 sportman" style="height:200px">
                    <h4><?php echo $deportista->post_title?></h4>
                    <div class="clear"></div>
                    <?php /* ?>
                    <div class="bar bar-ver izq">
                        
                        <?php 
                        $sm = getPostViews($deportista->ID);
                        $percent = round(( $sm * 165)/ $tm , 1); 
                        
                        ?>
                        <?php //$barra = 100*$percent?>
                        <div class="barra" style="height:<?php echo $percent?>px; margin-top:<?php echo 165-$percent;?>px"></div>
                    </div>
                    <?php  */?>
                    <div class="infod">
                        
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

<?php $bgtd =  wp_get_attachment_image_src( get_field('background-foot') , 'full')?>
<section id="tildead" class="da-g" style=" background-image:url(<?php echo $bgtd[0]?>)">
	<div class="container">
		<div class="row">
        	<div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">
            	
            	<img src="<?php bloginfo('template_directory')?>/images/panam.png" alt="">
            </div>
            <div class="col-md-7 col-lg-7 col-sm-6 col-xs-12">
            	<a href="http://www.toronto2015.org/es/0/horario" target="_blank" class="btn btn-primary pull-right gv-nrg">Horario y calendario</a> 
                <a href="" data-toggle="modal" data-target="#paises" class="btn btn-primary pull-right gv-nrg">Países participantes</a>
            </div>
        	
        </div>
        <div class="clear separator"></div>
        <div class="row">
			<?php echo apply_filters('the_content' , get_field('footer_text'))?>
        </div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="paises" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body">
        <h2>Países <span>participantes</span></h2>
        <div class="row">
        <?php $paises = get_field('paises')?>
        <?php foreach($paises as $pais):?>
        	
            <?php $bandera =  wp_get_attachment_image_src( $pais['bandera'] , 'full')?>
            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-4">
            	<img src="<?php echo $bandera[0]?>" alt="<?php echo $pais['pais']?>">
                <span><?php echo $pais['pais']?></span>
                <div class="miniseparator"></div>
            </div>
            
        <?php endforeach?>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>

<?php echo get_template_part('productos')?>

<!--
<a href="<?php echo get_page_link(24)?>/?sm=<?php echo $post->ID?>" class="btn btn-success btn-lg">#</a>
<h1>Energía total<?php echo getPostViews(24)?></h1>
<h1>Energía individuo<?php echo getPostViews($post->ID)?> </h1>
 -->
<?php get_footer()?>