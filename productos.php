<?php $productos = get_posts(array('post_type' => 'productos' , 'numberposts' => 12 ))?>
<?php $tg = count($productos);?>
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