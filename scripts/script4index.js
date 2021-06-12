var a=$("input#hidee");
	$("option#other").click(function(){
		a.show(500);
	});

	$("option#CD").click(function(){
		a.hide(500);
	});	
	$("form.Connexion").on("submit", function() {
		if($("input.password").val().length == 0) {
			$("div.form-group").addClass("has-error");
			$("div.Dangereux").html("<h4>Erreur !</h4>Champ(s) vide(s)").show("slow").delay(2000).hide("slow");
			return false;
		}
	});
	$("form.CreateAccount").on("submit", function() {
		if($("input#pseudo, input#pass, input#pass2").val().length == 0) {
			$("div.form-group").addClass("has-error");
			$("div.Dangereux3").html('<span class="glyphicon Remov glyphicon-remove form-controlfeedback"></span> Tous les champs doivent être remplis !').show("slow").delay(2000).hide("slow");
			return false;
		}
		if ($('input#pass').val() != $('input#pass2').val()) {
			$("div.form-group").addClass("has-error");
			$("div.Dangereux3").html('<span class="glyphicon Remov glyphicon-remove form-controlfeedback"></span> Les deux mots de passe ne correspondent pas !').show("slow").delay(2000).hide("slow");
			return false;
		}
	});
	$('a#create').click(function(){
		$('.div1, .div2, h2.tt').hide('slow');
		$('.div3, .div4, h2.tc').show('slow');
	});
	$('#Annuler').click(function(){
		$('.div3, .div4, h2.tc').hide('slow');
		$('.div1, .div2, h2.tt').show('slow');
	});