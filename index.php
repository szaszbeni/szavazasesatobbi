<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<style>
	*{
		margin:0;
		font-family:Verdara;
	}
	div#menu{
		background-color:#666;
		text-align: center;
		color: #FFF;
		padding:4px;
	}
	div#menu a{
		display:inline-block;
		width:120px;
		color: #CCC;
		text-decoration:none;
	}
		div#menu a:hover{
		color: #FFF;
	}
	div#tartalom{
		margin:18px 48px;
	}
	</style>
	<body>
		<div id='menu'>
			[<a href='./'>Kezdölap</a> |
			<a href='./?p=holvagyunk'>Elérhetőség</a> |
			<a href='./?p=vendekkonyv'>Vendékkönyv</a> |
			<a href='./?p=szavazas'>Szavazás</a> |
			<a href='./?p=galeria'>Képgaléria</a>]
		</div>
		
		<div id='tartalom'>
<?php
	if(isset($_GET['p'])) $p = $_GET['p'];
	else  $p="";
	if($p=="") print"<h1>Akciok, aktualisok</h1>";else
	if($p=="holvagyunk") include("elerhetoseg.php");else
	if($p=="vendekkonyv") print"<h1>Vendékkönyv</h1>";else
	if($p=="szavazas") include("szavazas.php");else
	if($p=="galeria") print"<h1>Képgaléria</h1>";else
	print"<h1>404 - A manoba</h1>"
?>
		</div>
		<hr>
<?php
	$filename = date("Ymd").".txt";

	if (!file_exists($filename)) {
		$fp = fopen($filename ,"w");
		fwrite($fp, "0");
		fclose( $fp );
	}
	$fp = fopen($filename ,"r");
	$n = fread($fp, filesize($filename));
	fclose( $fp );



if (!isset($_SESSION['porno'])) {
	$n++;
	$fp = fopen($filename ,"w");
	fwrite($fp, $n);
	fclose( $fp );
	$_SESSION['porno'] = "grupen";
}
	

	print"Az oldalt eddig $n latogato latta." ;
?>
	</body>
</html>