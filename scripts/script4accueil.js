$(document).ready(function(){
	$('#toSubscribe').click(function(){
		$('div#infos').show('slow');
	});
	$('#toConsult').click(function(){
		$('div#infos2').show('slow');
	});
	$('#toAuthenticate').click(function(){
		$('div#infos3').show('slow');
	});

	$("form.authentify").on("submit", function() {
		if($("input.pass").val() != "<?php echo $_SESSION['pass']; ?>") {
			$("div.form-group").addClass("has-error");
			$("div.alert").html("<h4>Erreur !</h4>Mot de passe incorrect").show("slow").delay(4000).hide("slow");
			return false;
		}else{
			
		}
	});

	$("form.authentify2").on("submit", function() {
		if($("input.pass2").val() != "<?php echo $_SESSION['pass']; ?>") {
			$("div.form-group").addClass("has-error");
			$("div.alert").html("<h4>Erreur !</h4>Mot de passe incorrect").show("slow").delay(4000).hide("slow");
			return false;
		}else{
			
		}
	});
});