<!DOCTYPE html>
<html>
<head>
@forelse ($rapports as $key => $rapport)
	<title>Rapport Numéro # {{ $rapport->RAP_NUM }}</title>
</head>
<body>
	<H1>Rapport Numéro # {{ $rapport->RAP_NUM }}</H1>
	<h2>Praticien : {{ $rapport->PRA_NOM }} {{ $rapport->PRA_PRENOM }}</h2>
	<strong>Date : {{$rapport->RAP_DATE }}</strong><br>
	<strong>Bilan : {{$rapport->RAP_BILAN }}</strong><br>
	<strong>Motif : {{$rapport->RAP_MOTIF }}</strong>
	
	
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	 @empty
 					<option>c'est vide</option>
      @endforelse
</body>
</html>