<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if(is_home()){?>
	<title><?php wp_title();?></title>
<?php }else{?>
	<title><?php wp_title();?></title>
<?php }?>

<meta name="viewport" content="width=device-width, initial-scale=0.75 , minimum-scale=1.0 ,  maximum-scale=1.0">

<meta property="fb:app_id" content="1659876854231643" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>?ver=3.8.1" />
<link href='http://fonts.googleapis.com/css?family=Raleway:700,900,400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Fonts -->

<!--Otros -->
<?php call_scripts()?>
<?php wp_head()?>

<!-- scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<?php if(is_home()){?>
<script>
// You can avoid the document.ready if you put the script at the bottom of the page
$(document).ready(function() {
  // Bind to the click of all links with a #hash in the href
  $('#menu-navegacion a[href^="#"]').click(function(e) {
    // Prevent the jump and the #hash from appearing on the address bar
    e.preventDefault();
    // Scroll the window, stop any previous animation, stop on user manual scroll
    // Check https://github.com/flesler/jquery.scrollTo for more customizability
    $(window).stop(true).scrollTo(this.hash, {duration:1000, interrupt:true});
  });
});
</script>
<?php }?>

<script>
jQuery(window).load(function() {
	jQuery("#loader-wrapper").fadeOut("slow");
	jQuery('.hngbr .filler').delay(2000).addClass('fll');
	jQuery('.hngbrx .filler').delay(2000).addClass('fll');
	
	<?php if(is_singular()){?>
	jQuery('.barr  .filled').delay(2000).addClass('fll');
	jQuery('.total').delay(2000).addClass('up');
	<?php }?>
	
})
</script>

<!-- RRSS Shares -->
<?php /* ?>
<script>
    window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>
<?php  */?>
<?php if(!is_single()){?>

<script>/* (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.2&appId=1659876854231643";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk')); */</script>
<?php }?>

<?php if(is_single() || is_page(24)  || is_page(78)){?>
<script type="text/javascript">
Shadowbox.init();
</script>

<script>
	function statusChangeCallback(response) {
    //console.log('statusChangeCallback');
    //console.log(response);
	
    if (response.status === 'connected') {
      //testAPI();
	  modalUpper();
	  
	  FB.api('/me/picture?redirect=false&width=300&height=300&type=large', function(data) {
		  //console.log(data.data);
		  //var dataForm = document.getElementById('user-foto-fb');
		  Cookies.set('userpic', data.data.url);
		  //var welcomeBlock = document.getElementById('pgimage');
		  //welcomeBlock.setAttribute('src' , data.data.url);
		  //dataForm.setAttribute('value' , data.data.url);
	  });
	  
	  jQuery('#status').css('background-color', '#129dd9');
	  
    } else if (response.status === 'not_authorized') {
		jQuery('#status').css('background-color', '#d9534f');
		
		Cookies.remove('energizer');
		Cookies.remove('inscrito');
		Cookies.remove('userpic');
		
    } else {
      jQuery('#status').css('background-color', '#f0ad4e');
	  
	  Cookies.remove('energizer');
	  Cookies.remove('inscrito');
	  Cookies.remove('userpic');
	  
    }
  }
  
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
  FB.init({
    appId      : 1659876854231643,
	status     : true, // check login status
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.3' // use version 2.2
  });
	
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

};

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_ES/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
	
	
	
  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('meh').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
  	
	
function modalUpper() {
	jQuery('#fblogger').removeAttr('onclick').removeAttr('onlogin');
	jQuery('#status').css('background-color', '#5cb85c');
	jQuery('#fblogger img').attr('src' , '<?php bloginfo('template_directory')?>/images/darenergiabig-cl.png'); 
	<?php if($_COOKIE['inscrito'] != 'si'){?>
	jQuery('#fblogger').attr('data-target' , '#modal-step-1');
	<?php }else{?>
	jQuery('#fblogger').attr('data-target' , '#modal-step-2');
	<?php }?>
}


function pasoDos(){
	jQuery('#fblogger').attr('data-target' , '#modal-step-2');
	jQuery('#modal-step-1').delay(3000).modal('hide');
	jQuery('#modal-step-2').modal('show');
};

function pasoTres(){
	jQuery('#fblogger').attr('data-target' , '#modal-step-3');
	jQuery('#modal-step-2').modal('hide');
	jQuery('#modal-step-3').modal('show');
};
	
<?php $im = get_post_thumbnail_id('24');?>
<?php $ima = wp_get_attachment_image_src($im , 'full');?>
function pasoCuatro(){
	jQuery('#fb-root').addClass('toggled');
	var picture = '<?php echo $ima[0]?>' ;
	FB.ui({
		 method: 'feed',
		 href: '<?php echo bloginfo('url')?>',
		 picture : picture,
		 name : '<?php echo get_the_title(24)?>',
		 <?php $pshare = get_post(24);?>
		 description: '<div class="mts mbm _58ov">bold.</div><?php echo $pshare->post_excerpt?>', 
		 }, function(response){
			 if (response && !response.error_code) {
			  jQuery('#fb-root').removeClass('toggled');
			  window.location.replace("<?php echo get_page_link(24)?>?sm=<?php echo $post->ID?>");
			} else {
			  jQuery('#fb-root').removeClass('toggled');
			}
		});
};
	
</script>


<?php }?>

</head>

<body <?php body_class()?>>

<div id="fb-root"></div>
<div id="top"></div>
<div id="loader-wrapper">
    <div id="loader"></div>
</div>

<div id="status" class="navbar-fixed-top"></div>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
      	<div class="row">
      	
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand logo" href="<?php bloginfo('url')?>"><img src="<?php bloginfo('template_directory')?>/images/logo.png" class="img-responsive" width="205px;" alt="" /></a>
            </div>
            <div class="navbar-collapse collapse">
              <?php if(is_home()){?>
              	<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'nav navbar-nav navbar-right' , 'theme_location' => 'primary' ) ); ?>
              <?php }else{?>
              	<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'nav navbar-nav navbar-right' , 'theme_location' => 'third' ) ); ?>
              <?php }?>
            	<div class="clear"></div> 
            </div><!--/.nav-collapse -->
                        
      	</div>
      </div>
</div>