<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
<meta charset="utf-8">
<!-- Mobile viewport optimized: j.mp/bplateviewport -->
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="shortcut icon" href="img/favicon.ico"  type="image/x-icon" />

<title>Test mako Framework</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta charset="<?php echo MAKO_CHARSET; ?>">
<!-- CSS-->
<link rel="stylesheet" href="http://core.local:81/dev/mako/assets/css/normalize.css">
<link rel="stylesheet" href="http://core.local:81/dev/mako/assets/css/grid.css">
<link rel="stylesheet" href="http://core.local:81/dev/mako/assets/css/superfish.css">
<link rel="stylesheet" href="http://core.local:81/dev/mako/assets/css/flexslider.css" />
<link rel="stylesheet" href="http://core.local:81/dev/mako/assets/css/style.css">
<!-- end CSS-->
    
<!-- JS-->
<!-- grab jQuery from Google SDN , fallback on local, if offline -->
<script type="text/javascript" src="http://core.local:81/dev/mako/assets/js/libs/jquery-1.6.2.min.js"></script>
<!-- modernizr library for IE 6-8 -->
<!--[if lt IE 9]><script src="js/libs/modernizr-2.0.6.min.js"></script><![endif]-->

<!-- superfish menu by Joel Birch http://users.tpg.com.au/j_birch/plugins/superfish/ -->
<script type="text/javascript" src="http://core.local:81/dev/mako/assets/js/superfish/hoverIntent.js"></script>
<script type="text/javascript" src="http://core.local:81/dev/mako/assets/js/superfish/superfish.js"></script>

<!-- responsive select menu by Matt Kersley. Turns ul / ol into select box https://github.com/mattkersley/Responsive-Menu -->
<script type="text/javascript" src="http://core.local:81/dev/mako/assets/js/jquery.mobileselect.js"></script>

<!-- responsive FlexSlider slideshow by (C) http://flex.madebymufffin.com/ -->
<script src="http://core.local:81/dev/mako/assets/js/jquery.flexslider-min.js"></script>
<!-- end JS-->


<!-- columns demo style. DELETE IT! -->
<style type="text/css">
<!--

#columnsdemo .grid_1 h1,
#columnsdemo .grid_2 h1,
#columnsdemo .grid_3 h1,
#columnsdemo .grid_4 h1,
#columnsdemo .grid_5 h1,
#columnsdemo .grid_6 h1,
#columnsdemo .grid_7 h1,
#columnsdemo .grid_8 h1,
#columnsdemo .grid_9 h1,
#columnsdemo .grid_10 h1,
#columnsdemo .grid_11 h1,
#columnsdemo .grid_12 h1 {
border: solid 1px black;
		text-align: center;
		padding: 10px;
}
-->
</style>

</head>




<body onLoad="setTimeout(function() {window.scrollTo(0, 1)}, 100)" id="home">
<!-- header area -->
    <header>
		       
        <div id="banner">          
			<hgroup>
			  <h1>Aplikasi Mahasiswa</h1>
				<h2>Dengan MAKO Framework</h2>
			</hgroup>            
        </div>
        
        <nav id="topnav" role="navigation" class="clearfix">  
        	<ul class="sf-menu" id="mobileselect">
			<li class="current">
				<a href="http://core.local:81/dev/mako/example/index">Manajemen Mahasiswa</a>
			</li>	
			<li class="current">
				<a href="http://core.local:81/dev/mako/example/nilai">Manajemen Nilai</a>
			</li>
		</ul>     
		</nav><!-- #access -->

        
    </header><!-- end header -->
<div id="main" role="main">
		<div id="content" class="grid_8">
		<h2 id="title"> Manajemen Mahasiswa</h2>
		<a href="<?php echo URL::to('example/mhsAdd/');?>">Add</a>
		<table id="tabeldata">
		<thead><tr><th>No</th><th>Nim</th><th>Nama</th><th>Action</th></tr></thead>
		<tbody>
		<?php
		$n=1;
		foreach($data as $mhs)
		{
			echo "<tr><td>$n</td><td>$mhs->nim</td><td>$mhs->nama</td><td><a href='".URL::to('example/mhsUpdate/'.$mhs->nim)."'>edit</a> | <a href='".URL::to('example/mhsDelete/'.$mhs->nim)."'>delete</a></td></tr>";
		$n++;
		}
		//echo "<pre>";print_r($data);
		?>
		</tbody>
		</table>
		</div>
</div>
<footer>
	<div id="colophon" class="clearfix">
    	page rendered in <?php echo round(microtime(true) - MAKO_START, 4); ?> seconds | <?php echo MAKO_VERSION; ?>
    </div>
</footer>
    
<script type="text/javascript">

// Fireup the plugins
	$(document).ready(function(){
	// initialise menu
	jQuery('ul.sf-menu').superfish();
		
	// initialise  slideshow
	$('.flexslider').flexslider();

	//mobile select menu
	$('#mobileselect').mobileMenu({
		switchWidth: 480, // at what size to begin showing the select box
      	indentString: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'	 // how to indent the menu items in select box						  
											  });
		});

</script>


</body>

</html>