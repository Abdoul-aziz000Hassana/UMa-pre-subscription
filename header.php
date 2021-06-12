<style>
	div.navbar-fixed-top {
		background: #337ab7;
	}

	.connected1.gif.couleurParDefo ul span.glyphicon{
		font-size: 15px;
	}
	
	form input.input-xs{
		border: 2px solid black
	}
	.ENSM{
		font-family: comic sans ms;
	}
	img.connected1{
		margin-left: 100px;
	}
</style>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="scripts/autosuggest.js"></script>
<script src="jquery.js"></script>

<div class="row couleurParDefo navbar-fixed-top">
	<div class="col-xs-1"><img src="images/mortarboard.png" width="52px"></div>
	<div class="col-xs-8 ">
		<span class="ENSM"><font size="6px" color="white"><?php if(isset($title)){ echo $title; } ?></font></span>
		<font size="5px" color="white">
			<?php 

				echo "\t \t \t".'<font size="3px" color="white" ><img src="images/Spinner-3.gif" style="border-radius:50%" class="connected1" width="20px"> ';
				echo $_SESSION['name']." - Connecté(e) depuis ".$_SESSION['time']."</font>";
			?>				
			</span>
		</font>
	</div>
	<div class="col-xs-3">
		<form class="Search navbar-form pull-right" method="GET" action="rechercher.php">
			<input type="search" class="form-control" style="width:150px" class="input-xs form-control" name='q' placeholder="Recherche" onkeyup="showAutosuggest(this.value)">
			<button type="submit" class="btn btn-success btn-sm">
			<span class="glyphicon glyphicon-search"></span> 
			Chercher</button>
		</form>	

<script>
	
$('form.Search').on('submit', function(){
	
});

</script>

	</div>
</div>