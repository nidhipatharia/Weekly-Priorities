<!DOCTYPE html>

<html>
<head>
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">
<link rel="stylesheet" href="css/styles.css">

<!-- EXTERNAL STYLES -->
<link href="//cdn.cengage.com/static/sites/cengage/header-footer/1.4/css/cengage-header.css" rel="stylesheet" />
<link href="//cdn.cengage.com/static/sites/cengage/header-footer/1.4/css/cengage-footer.css" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

<!-- SELECT PLUGIN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- DATE PICKER -->
<link rel="stylesheet" href="//www.cengage.com/connect/vendor/datepicker/datepicker.css">

<!-- FONT-AWESOME-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" type="text/css">
</head>

<body>



</script>
<!-- EXTERANL JS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- JQUERY UI -->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<!-- TABLE SORTER -->
<script src="//www.cengage.com/connect/vendor/tablesorter.js"></script>


<!-- EXTERNAL BOOTSTRAP ============================================================ -->

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- BOOTSTRAP SELECT -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>


<script src="//cdn.cengage.com/libs/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="//cdn.cengage.com/static/sites/cengage/header-footer/1.4/js/loader.js"></script>
<script>
loader.init({
  callback:function(){
    loader.header().footer();
  }
});


jQuery(document).ready(function() {
// ALERT FADE OUT
	// AFTER 2 SECONDS, TAKES 2 SECONDS TO FADE OUT
	$( ".alert-success" ).delay(2000 ).fadeOut( 2000 );
	
	
});
</script>
<div class="container">

<br><br>
@yield('content')

</div>

</body>
</html>