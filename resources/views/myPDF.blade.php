<!DOCTYPE html>
<html>
<head>
@forelse ($rapports as $key => $rapport)
	<title>Rapport Numéro # {{ $rapport->id }}</title>
</head>
<body>
	<H1>Rapport Numéro # {{ $rapport->id }}</H1>
	<h2>Praticien : {{ $rapport->praticien->PRA_NOM }} {{ $rapport->praticien->PRA_PRENOM }}</h2>
	<strong>Date : {{$rapport->RAP_DATE }}</strong><br>
	<strong>Bilan : {{$rapport->RAP_BILAN }}</strong><br>
	<strong>Motif : {{$rapport->RAP_MOTIF }}</strong>
	
	<br><br><br><br><br><br><br>

	<table>
    <thead>
        <tr>
            <th>Medicament</th>
			<th>Quantité</th>
        </tr>
    </thead>
    <tbody>
	@forelse($prescription as $medic)
        <tr>
            <td>{{ $medic->medicament->MED_NOMCOMMERCIAL }}</td>
            <td>{{ $medic->MEDICAMENT_QTE}}</td>
        </tr>
	@empty
	<li> Aucune prescription</li>
	@endforelse
    </tbody>
</table>






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