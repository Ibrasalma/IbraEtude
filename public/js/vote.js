//on détecte la présence de la souris sur une étoile
$(".tde").mouseover(function(){

//Grâce à substring(), on récupère le numéro dans l'id de cette étoile et on la stocke dans une variable en ayant supprimé le préfixe "tde_", bonnes pratiques du HTML !
    var nbr = $(this).prop('id').substring(4);

//on impose la couleur jaune dans le fond transparent de cette étoile
    $(this).css( "backgroundColor", "#E0E001" );

//et en même temps, on met toutes les étoiles en-dessous de nbr en jaune.
  $( ".tde").slice(0, nbr).css( "backgroundColor", "#E0E001" );

//et toutes celles au-dessus de nbr en gris
  $( ".tde").slice(nbr).css( "backgroundColor", "#A1A1A1" );
 })

//et quand la souris s'en va, on annule le fond jaune sous les étoiles pour garder uniquement celui de #value 
$("#glob").mouseout(function(){
    $(".tde").css('backgroundColor', "" );
})

$(".tde").click(function () {
	var nombr = $(this).prop('id').substring(4);
	document.getElementById('note').value = nombr;
})
