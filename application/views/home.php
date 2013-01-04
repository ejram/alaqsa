<!DOCTYPE html>
<html lang="en" dir="ltr" itemscope itemtype="http://schema.org/Article">
<head>
<meta charset="utf-8">
<title>Flexigrid 1.1 Implemented in CodeIgniter 2.1</title>
<link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/css/flexigrid.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/flexigrid.js"></script>
</head>
<body>

<h1>Flexigrid 1.1 Implementation on Codeigniter 2.10</h1>
<div class="centerBox"><a href="<?php echo site_url("/flexigrid/");?>">About</a> | <a href="<?php echo site_url("/flexigrid/demo");?>">Grid Demo</a> | <a href="<?php echo site_url("/flexigrid/search");?>">Search Demo</a> | <a href="<?php echo site_url("/flexigrid/example");?>">Documentation</a> | <a href="http://flexigrid.eyeviewdesign.com/<?php echo $download_file;?>">Download</a></div><h2>About:</h2>
<p>
- This is a demonstration of the <a href="http://flexigrid.info/" target="_blank">Flexigrid</a> javascript datagrid by <strong>Paulo Mariñas</strong> integrated with <strong>CodeIgniter 2.10 and Flexigrid 1.1</strong>. This demo and all the libraries are coded by <strong>Frederico Carvalho</strong>(frederico at eyeviewdesign.com). He created this libarary with Codeigniter 1.7.2. Unfortunatly the website <a href="http://flexigrid.eyeviewdesign.com/" target="_blank">flexigrid.eyeviewdesign.com</a> is not working now. This is a modified version of his code using flexigrid 1.1 and Codeigniter 2.1. Also we trying to make a  custom search with the flexigrid. Thanks for creating this great library.
</p>
<p style="text-align: right;">-- Ranjith Siji</p>
<h2>v0.36.1 Change log:</h2>
-Just rewriting the library with Codeigniter 2.1.0. And Used Flexigrid 1.1. No more Changes
<h2>v0.36 Change log:</h2>
- Added support for "json_encode" function from the JSON PHP Extension. <a href="<?php echo site_url("/flexigrid/example#s3");?>">Read more here</a><br/><br/>
- <a href="http://flexigrid.eyeviewdesign.com/<?php echo $download_file;?>" target="_blank">Click here to download <?php echo $version;?></a>
<h2>v0.35 Change log:</h2>
- Fixed helper bugs<br/><br/>
- Query's now built with Active Record (thanks to <a href="http://codeigniter.com/forums/member/43281/" target="_blank">daBayrus</a>)<br/><br/>
- Added "build_query" function to library for active record query build. Function "build_querys" is still present but deprecated. <a href="<?php echo site_url("/flexigrid/example#s2");?>">Read more here</a><br/><br/>
<h2>v0.3 Change log:</h2>
- Fixed some helper bugs<br/><br/>
- Removed "width" and "height" parameter and replaced it with an array where you can insert any FlexiGrid parameter you want. Read more about these changes <a href="<?php echo site_url("/flexigrid/example#s1");?>">here</a>.<br/><br/>
- The $buttons variable in the "build_grid_js" function is now the last parameter and optional<br/><br/>
<h2>Demo (v<?php echo $version;?>):</h2>
<p>
- <a href="<?php echo site_url("/flexigrid/demo");?>">Simple Grid Demo</a><br/>
- <a href="<?php echo site_url("/flexigrid/search");?>">Flexigrid with custom search forms</a>
</p>
<table id="flex1" style="display:none"></table>
<h2>Links:</h2>
<p>
- <a href="http://codeigniter.com/forums/viewthread/90208/" target="_blank">CodeIgniter Flexigrid lib discussion on CodeIgniter forum</a> <br/>
- <a href="http://flexigrid.info/" target="_blank">Flexigrid Home</a> <br/>
- <a href="http://code.google.com/p/flexigrid/" target="_blank">Flexigrid for jQuery</a> <br/>
- <a href="http://groups.google.com/group/flexigrid?hl=en" target="_blank">Flexigrid Discussion Google Groups</a> | <a href="http://codeigniter.com/forums/viewthread/75326" target="_blank">Flexigrid discussion on CodeIgniter forum (NOT USED ANYMORE)</a><br/>
- <a href="https://github.com/noiseunion/flexigrid" target="_blank">Fork of Paulo P. Marinas' FlexiGrid — noiseunion / flexigrid </a><br/>
- <a href="http://gembelzillonmendonk.wordpress.com/2010/06/28/flexigrid-and-codeigniter-with-advanced-searching-with-example/" target="_blank">Flexigrid and Codeigniter 1.7.2 with Advanced Searching by gembelzillonmendonk</a> <br/>

</p>
<h2>Download:</h2>
- <a href="http://flexigrid.eyeviewdesign.com/<?php echo $download_file;?>" target="_blank">Click here to download v<?php echo $version;?></a>
<h2>Install:</h2>
<p>
- Unzip to the CI directory. The example controler is flexigrid.php<br/>
- Activate CI Database Lib and URL helper in CI's AutoLoad config<br/>
- <a href="<?php echo site_url("/flexigrid/example");?>">Read documentation here</a>
</p>
<h2>CodeIgniter implementation by:</h2>
<p>
- <strong>Frederico Carvalho</strong>: <a href="mailto:frederico at eyeviewdesign dot com" target="_blank">frederico at eyeviewdesign dot com</a><br/>
- <strong>Ranjith Siji</strong> - <a href="http://smashingweb.ge6.org" target="_blank">SmashingWeb</a>
</p>
<h2>Thanks to:</h2>
- Paulo Mariñas for the excellent <a href="http://flexigrid.info/" target="_blank">Flexigrid</a>.<br/>
- Kevin Kietel for the <a href="http://sanderkorvemaker.nl/test/flexigrid/" target="_blank">PHP example</a>.
<h2>License:</h2>
- Same as Flexigrid's (MIT + GPL)
</body>
</html>
