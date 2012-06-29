<?
$titulo_juego='Rompecabezas';
$mensaje_terminado='Juego superado!';
$icono_terminado='encastres/pulpo1.png';
$url_juego='puzzle.php';
$sufijo='-sombra'; // el sufijo en el nombre de las imgs de fondo
$imagen_formato='png'; // Case sensitive

$imagenes[0]='1a';
$imagenes[1]='1b';
$imagenes[2]='1c';
$imagenes[3]='2a';
$imagenes[4]='2b';
$imagenes[5]='2c';

$imagenes_target=$imagenes;
shuffle($imagenes_target);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>IT Sabotage [ PROTOTYPE ]</title>
<link rel="stylesheet" type="text/css" media="all" href="css/puzzle.css">
<link rel="stylesheet" href="js/themes/light/light.modal.css" type="text/css" media="screen" title="light" />
<script src="js/jquery-1.2.3.pack.js" type="text/javascript"></script>
<script src="js/jquery-1.2.4b.js" type="text/javascript"></script>
<script src="js/ui.core.js" type="text/javascript"></script>
<script src="js/ui.draggable.js" type="text/javascript"></script>
<script src="js/ui.droppable.js" type="text/javascript"></script>
<script src="js/ui.dialog.js" type="text/javascript"></script>
<script src="js/jquery.timer.js" type="text/javascript"></script>
<script src="js/jqModal.js" type="text/javascript"></script>


<script type="text/javascript">


	$(window).ready(function(){


		
		<? 
		  $i=0;
		  foreach($imagenes as $i => $imagen){	
			$i++;		
		?>
		$("#i-<?=$imagen?>").draggable({helper:'original', handle:'.drag'}); 
		
		$("#s-<?=$imagen?> > .sensible").droppable({
		 accept: "#i-<?=$imagen?>",
		 tolerance: 'intersect',
		 activeClass: 'droppable-active',
		 hoverClass: 'droppable-hover',
		 drop: function() { 
			$('#s-<?=$imagen?>').addClass('s-<?=$imagen?>');
		 	$('#s-<?=$imagen?>').addClass('encastrada');
			$('#i-<?=$imagen?>').remove();
			checkWin();

		 }
		 });	
		<? }?>

		function checkWin(){
            return true;
        }
/*
		function checkWin(){
			var w = $(".encastrada");
			//alert(w.length);
			// Congratulation message / Mensaje de felicitacion.
			if(w.length == 6){
				$('#canvasFinal').fadeIn();
				$.timer(700, function (timer) {					
				    $("#win").jqm().jqmShow();	
				    timer.stop();
				});
			}
		}
*/

	});

</script>
<style type="text/css">
<? foreach($imagenes_target as $i => $imagen){ ?>
.s-<?=$imagen?> {
	background-image:url(img/puzzle/saboteur/<?=$imagen?>.png);
	background-repeat:no-repeat;
	background-position:center center;
}
<? }?>
.drag{
	margin-left:20px;
	width:100px;
	height:151px;
    border: 0px dotted red;
}
.sensible{
	margin:20px;
	width:100px;
	height:151px;
	border:0px solid orange;
}
#canvas{
	width:261px;
	height:176px;
	background-color:#EEE;
	float:left;
}
#canvasFinal{
	width:261px;
	height:176px;
	background-image:url(img/puzzle/saboteur/completo.png);
	background-repeat:no-repeat;
	background-position:center center;
	float:left;
	position:absolute;
	display:none;
	z-index:9;
}

</style>

</head>

<body>

<div>
<div class="puzzle" style="width:660px;">
<h1><i><b>IT Sabotage</b></i> game prototype:</h1>
<!--
<small>(jQuery, CSS)</small>
-->	
    <div style="width:390px; height:450px; background-color:#FFF; float:left;">
		<? foreach($imagenes_target as $i => $imagen){ ?>
		<div class="s-<?=$imagen?> " id="i-<?=$imagen?>" style="width:143px; height:143px; position:absolute; top:<?=rand(50, 320);?>px; left:<?=rand(-10, 180);?>px;" >
		<div class="drag"></div>
		</div>
		<? }?>
    </div>

<!--
	<div id="canvas">
	<div id="canvasFinal"></div>
		<? 
		foreach($imagenes as $i => $imagen){ ?>
		<div class="droppableP" id="s-<?=$imagen?>">
		<div class="sensible"></div>
		</div>
		<? }?>
	</div>
    </div>


</div>
</div>


<div class="jqmWindow jqmClose" id="win">
<b>Puzzle superado! / Puzzle passed!</b>
<ul>
<li><a href="index.php" target="_self" title="Jugar otra vez / Play Again">Jugar otra vez! / Play Again!</a></li>
</ul>
</div>

</body>
</html>
