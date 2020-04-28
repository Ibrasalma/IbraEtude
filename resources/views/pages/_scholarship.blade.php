
<?php 

	$bourse= App\Models\Bourse::paginate(5);
	$degree = new App\Http\Controllers\Controller();
    $categorie = $degree->enumerer('bourses','categorie');

?>
@include('bourses._content')
<div class="text-center">
	<a href="{{ route('bourses.liste') }}" class="btn btn-success">Voir toutes les bourses</a>
</div>
