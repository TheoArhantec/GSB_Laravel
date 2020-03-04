@extends("layouts/app")

@section("title", "Liste Visiteurs")
@section("content")

<section id="card-caps">
                    <div class="row my-3">
                        <div class=" col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Liste des Visiteurs</h4>
 		<table id ="listeVisiteur" class="table zero-configuration dataTable" style="width:100%">
		
		<thead>
 
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Prénom</th>
				<th scope="col">Code Postal</th>
				<th scope="col">Adresse	</th>
				<th scope="col">Ville</th>
				<th scope="col">Secteur</th>
				<th scope="col">Nom Laboratoire</th>
				<th scope="col">Chef Vente</th>
			</tr>
		</thead>
		<tbody>
@foreach ($visiteurs as $key => $visiteur)

<tr>
				<td >{{ $visiteur->VIS_NOM }}</td>
				<td>{{ $visiteur->Vis_PRENOM }}</td>
				<td>{{	$visiteur->VIS_CP }}</td>
				<td>{{ $visiteur->VIS_ADRESSE }}</td>
				<td>{{ $visiteur->VIS_VILLE }}</td>
				<td>{{  $visiteur->SEC_CODE  }}</td>
				<td>{{  $visiteur->LAB_NOM }}</td>
				<td>{{  $visiteur->LAB_CHEFVENTE  }}</td>
			</tr>

 @endforeach
 
 	</tbody>
	</table>
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script>
                $(document).ready(function() {
                 $('#listeVisiteur').DataTable();
                 
                } );


                        
            </script>

@endsection
		