
<title>deMedallo.com | Videos, Desacargas y mas!!</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script src="js/jquery.easydropdown.js"></script>
<!--Animation-->
<script src="js/wow.min.js"></script>
<link href="css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>

<script type="text/javascript">
function validateYouTubeUrl(url){
	if (url != undefined || url != '') {
		var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
		var match = url.match(regExp);
		if (match && match[2].length == 11) {
			// Do anything for being valid
			// if need to change the url to embed url then use below line
			return match[2];
		}
		else {
			return null;
		}
	}
}

window.onload = function() {
	var myVar = setInterval(myTimer, 1000);

	function myTimer() {
		var anchors = document.getElementsByTagName("a");
		for (var i = 0; i < anchors.length; i++) {
			var n = validateYouTubeUrl(anchors[i].href);
			if(n != null){
				//anchors[i].href = "getvideo.php?videoid=" + n + "type=Download";
				
				url = "getvideo.php?videoid=" + n + "&type=Download<?php if(isset($_GET['q'])){ echo "&q={$_GET['q']}"; }; ?>";
				anchors[i].setAttribute("href", url);
				anchors[i].removeAttribute("data-cturl");
				anchors[i].removeAttribute("target");
			}
		}
	}

	function myStopFunction() {
		clearInterval(myVar);
	}
}
</script>