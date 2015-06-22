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

<script>
jQuery(window).load(function() {
	jQuery("#loader-wrapper").fadeOut("slow");
	jQuery('.hngbr .filler').delay(2000).addClass('fll');
	
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

<?php if(is_single() || is_page(24)){?>
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
		  console.log(data.data);
		  //var dataForm = document.getElementById('user-foto-fb');
		  Cookies.set('userpic', data.data.url);
		  //var welcomeBlock = document.getElementById('pgimage');
		  //welcomeBlock.setAttribute('src' , data.data.url);
		  //dataForm.setAttribute('value' , data.data.url);
	  });
	  
	  function postToFeed(title, desc, url, image) {
		  
		  
		  FB.ui(
		  {
			method: 'feed',link: 'https://facebook.com/ipchile', picture: image,name: title,description: desc
		  },
		  // callback
		  function(response) {
			if (response && !response.error_code) {
			  alert('Posting completed.');
			} else {
			  alert('Error while posting.');
			}
		  }
		);
		  
	  }
	  
	  var fbShareBtn = document.querySelector('.fb_share');
	  fbShareBtn.addEventListener('click', function(e) {
		  e.preventDefault();
		  var title = fbShareBtn.getAttribute('data-title'),
			  desc = fbShareBtn.getAttribute('data-desc'),
			  url = fbShareBtn.getAttribute('href'),
			  image = fbShareBtn.getAttribute('data-image');
		  postToFeed(title, desc, url, image);
	  
		  return false;
	  });
	  
	  jQuery('#status').css('background-color', '#5cb85c');
	  
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
  
  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
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
	
	
  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.
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
		console.log('ya estás dentro');
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
		console.log('ya estamos inscritos, ahora a leer');
		jQuery('#fblogger').attr('data-target' , '#modal-step-2');
		jQuery('#modal-step-1').modal('hide');
		jQuery('#modal-step-2').modal('show');
		
		
	};
	
	function pasoTres(){
		console.log('ya estamos inscritos, ahora a leer');
		jQuery('#fblogger').attr('data-target' , '#modal-step-3');
		jQuery('#modal-step-2').modal('hide');
		jQuery('#modal-step-3').modal('show');
	};
	
	function sHare(){
		<?php $im = get_post_thumbnail_id('24');?>
		<?php $ima = wp_get_attachment_image_src($im , 'full');?>
		var picture = '<?php echo $ima[0]?>' ;
		FB.ui(
			 {
			 method: 'feed',
			 href: '<?php echo bloginfo('url')?>',
			 picture : picture,
			 name : '<?php echo get_the_title(24)?>',
			 <?php $pshare = get_post(24);?>
			 description: '<?php echo $pshare->post_excerpt?>', 
			 }, function(response){
				 
				 alert('hola!');
				 
				 });	
	}

</script>


<?php }?>

</head>

<body <?php body_class()?>>

<div id="fb-root"></div>

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
              <a class="navbar-brand logo" href="<?php bloginfo('url')?>"><img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="" /></a>
            </div>
            <div class="navbar-collapse collapse">
              
              <?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'nav navbar-nav navbar-right' , 'theme_location' => 'primary' ) ); ?>
            	<div class="clear"></div> 
            </div><!--/.nav-collapse -->
                        
      	</div>
      </div>
</div>