<?php get_header()?>

<script type="text/javascript">
jQuery(document).ready(function($) {
	jQuery(function() {
		jQuery('#dg-container').gallery();
	});
});
</script>
<section id="inicio">
	
    <div id="dg-container" class="dg-container">
        <div class="dg-wrapper">        
        	<?php $team = get_posts(array('post_type' => 'deportista' , 'numberposts' => -1 ))?>
            <?php $tg = count($team);?>
        	<?php foreach($team as $deportista):?>
            	<a href="<?php echo get_permalink($deportista->ID)?>"><?php echo get_the_post_thumbnail($deportista->ID , 'full' , array('class' => 'img-responsive'))?></a>
            <?php endforeach?>
        </div>
        <div id="hero">
        	<img src="<?php echo get_bloginfo('template_url')?>/images/tildead.png" class="img-responsive aligncenter" alt="">
            <div class="clear separator"></div>
            <div class="down" id="down">
            	<span class="fa fa-chevron-down fa-fw"></span>
            </div>
            <div class="clear separator"></div>
            <img src="<?php echo get_bloginfo('template_url')?>/images/need-ng.png" class="img-responsive aligncenter" alt="">
        </div>
        <nav>	
            <span class="dg-prev">&lt;</span>
            <span class="dg-next">&gt;</span>
        </nav>
	</div>
    
</section>

<div class="clear"></div>

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

<section id="desafio">
	<div class="container">
		<div class="row">
        	<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
            	<h2 class="megatitle">El<span>Desafío</span></h2>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores labore quae commodi id! Fugit in ducimus recusandae. Ullam, fuga, saepe voluptatem ducimus molestiae consequatur dolorem velit eligendi magnam omnis ipsa.</p>
                <p>Asperiores, impedit, minus, quis, voluptatem nam aliquam in commodi culpa dolorem officia eius doloribus iusto modi. Recusandae, quos, natus aperiam eligendi eum excepturi cumque molestias aut assumenda qui autem aspernatur.</p>
                
            </div>
        	<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
            	<div class="nrg-bar">
                	
                </div>
                <div class="globe">
                	<img src="<?php echo get_bloginfo('template_url')?>/images/thumb.png" alt="">
                	<span><?php echo $tm?></span>
                    dieron su like energía
                </div>
            </div>
        	<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"></div>
        </div>
	</div>
</section>

<section id="tuenergia">
	<div class="container">
		<div class="row">
        	<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 col-md-offset-8 col-lg-offset-8 col-sm-offset-6">
            	<h2 class="megatitle">Tu <span>energía</span><small>y la de todos</small></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur id corrupti sint hic nobis quod voluptatem voluptas pariatur incidunt totam. Excepturi impedit vero perspiciatis nulla sunt dolorum iusto veniam eligendi.</p>
                <p>Itaque, aliquid ad magnam dolor ab consectetur rem quo atque omnis quaerat odit unde modi aperiam laborum repudiandae laudantium quam ipsum accusamus. Recusandae, veritatis suscipit earum totam possimus fuga quod.</p>
                
                <div class="clear separator"></div>
                
                <a href="#" class="btn btn-primary gv-nrg btn-lg">Dar Energía</a>
                
            </div>
        </div>
	</div>
</section>

<section id="elfinal">
	<div class="container">
		<div class="row">
        	<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
        		<h2 class="megatitle">El <span>Final</span></h2>
            	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, minima, quae aliquam tempora cumque cum quo similique praesentium officiis ipsum perspiciatis quaerat dolore enim sint maxime dolores quisquam. Numquam, odio.</p>
            	<p>Veritatis, quod officia temporibus ut fuga. Illo, assumenda, vero suscipit nobis at voluptatem. Aperiam, quia, accusantium, ab pariatur suscipit voluptatum rerum quidem porro dignissimos minima impedit blanditiis dolores consequatur voluptatem!</p>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
            	<img src="<?php echo get_bloginfo('template_url')?>/images/plane.png" class="plane" alt="">
            </div>
        </div>
	</div>
</section>

<script>
jQuery(document).ready(function($) {
	jQuery('#productos').carouFredSel({
		responsive: true,
		width: '100%',
		scroll: 5,
		auto:false,
		prev: '#anteb',
		next: '#sgteb',
		height: 320,
		pagination: "#pager",
		 items: {
			//width: 200,
			//height: '50%',  //  optionally resize item-height
			visible: {
				min: 4,
				max: <?php echo $tg?>
			}
		} 
	});
});
</script>

<div id="store">
	<div class="container">
		<div class="row carrusel">
        <h3>Productos <span>destacados</span></h3>
			<ul id="productos">
                <?php $productos = get_posts(array('post_type' => 'productos' , 'numberposts' => 12 ))?>
                <?php $tp = count($productos);?>
                <?php foreach($productos as $producto):?>
                	<li class="col-md-3 col-lg-3 col-sm-4 col-xs-2 producto">
                    	<a href="<?php echo get_field('url',$producto->ID)?>" alt="Ver más información de <?php echo $producto->post_title?>"><?php echo get_the_post_thumbnail($producto->ID , 'producto' , array('class' => 'img-responsive aligncenter'))?></a>
                    	<h4><?php echo $producto->post_title?></h4>
                        <a href="<?php echo get_field('url',$producto->ID)?>" class="btn btn-primary gv-nrg">ver más</a>
                    </li>
                <?php endforeach;?>
                
            </ul>
            <div class="clear"></div>
            <div class="controls">
            	<div id="anteb" class="control"><span class="fa fa-chevron-left"></span></div>
                <div id="sgteb" class="control"><span class="fa fa-chevron-right"></span></div>
            </div>
        </div>
        <div class="clear"></div>
	</div>
</div>
<?php get_footer()?>