@extends("layouts/app")
@section("title","Liste Practicien")
@section("content")
<section id="card-caps">
                    <div class="row my-3">
                        <div class=" col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Liste des Practiciens</h4>
 		<table id ="listePrac" class="table zero-configuration dataTable" style="width:100%">
		<thead>
 
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Prénom</th>
				<th scope="col">Adresse</th>
				<th scope="col">Ville</th>
				<th scope="col">Proffesion</th>
				<th scope="col">Lieu D'excercice</th>
			</tr>
		</thead>
		<tbody>
			
			@for ($i = 0; $i < count($praticiens); $i++)
			<tr>
				<td>{{ $praticiens[$i]['PRA_NOM'] }}</td>
				<td>{{ $praticiens[$i]['PRA_PRENOM'] }}</td>
				<td>{{ $praticiens[$i]['PRA_ADRESSE'] }}</td>
				<td>{{ $praticiens[$i]['PRA_VILLE'] }}</td>
				<td>{{ $praticiens[$i]['type_praticien']['TYP_LIBELLE'] }}</td>
				<td>{{  $praticiens[$i]['type_praticien']['TYP_LIEU']  }}</td>
			</tr>
			@endfor
		
		
					</tbody>
	</table>
</div>
</section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script>
                $(document).ready(function() {
                 $('#listePrac').DataTable({
		  dom: 'Bfrtip',
        buttons: [
            'print'
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        }
    } );
} );
                 
          

                        
            </script>
				
				
			

<div class="row my-3">
    <div class=" col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">RECHERCHE AVANCÉE</h4>
	   					<div class="row">
                        	<div class="col-lg-6 col-md-6 col-sm-12">
								<form method="post" action="{{ route('gsb.practype') }}" id="add" accept-charset="UTF-8">
									@csrf
								<div class="form-group">
								<label for="recherchePraticienParType">Recherche Praticien par type</label> 
									<select class="form-control" id="select" name="select">
										@foreach($type_praticien as $unType)
										<option value = " {{$unType->id }}">{{$unType->TYP_LIBELLE}}</option>


										@endforeach
									
									</select>
								</div>
									<button type="submit" value="bouton_valider"class="btn btn-primary">Rechercher</button>
								</form>
							</div>


			  					<div class="col-lg-6 col-md-6 col-sm-12">
									<form method="post" action="{{ route('gsb.practype') }}">
										@csrf
										<div class="form-group">
											<label for="Recherche par Nom et Ville">Recherche par Nom et Ville</label>
												<input type="text" class="form-control" id="input" name="input" placeholder="Paris / Bernard">
											<button type="submit" value="bouton_valider" class="btn btn-primary">Rechercher</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						</div></div>
						</div></div>

@endsection


