@extends("layouts/app")

@section("title", "Accueil")
@section("content")

<section id="card-caps">
                    <div class="row my-3">
                        <div class=" col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Liste de vos Compte-rendus</h4>
                                        <table id ="RapportPerso" class="table zero-configuration dataTable" style="width:100%">
                                          <thead>
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Praticien</th>
                                                <th>Date</th>
                                                <th>Motif</th>
                                                <th>Bilan</th>
                                                <th>PDF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rapports as $rapport)
                                            <tr>
                                                <td>{{ $rapport->RAP_NUM }}</td>
                                                <td>{{ $rapport->PRA_PRENOM }}</td>
                                                <td>{{ $rapport->RAP_DATE }}</td>
                                                <td>{{ $rapport->RAP_MOTIF }}</td>
                                                <td>{{ $rapport->RAP_BILAN }}</td>
                                                <td>	<div class="bouton">

									<form method="get" action="{{ route('gsb.pdf') }}">
										@csrf
										<button type="submit" name="nb"
											value="{{ $rapport->RAP_NUM }}"
											class="btn btn-outline-danger">PDF</button>

									</form></td>
                                                
                                            </tr>
                                        @endforeach
                                            <tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                     
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img img-fluid" src="{{ asset('/app-assets/images/slider/04.jpg') }}" alt="Card image">
                                    <div class="card-img-overlay overflow-hidden overlay-danger overlay-lighten-2">
                                        <h4 class="card-title text-white"><a href ="{{ route('gsb.medicament') }}">Liste des Médicaments</h4>
                                        <p class="card-text text-white">Consulter la liste des médicaments présent sur le site GSB
                                        </p>
                                        <p class="card-text"><small class="text-white"></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card text-white border-0 box-shadow-0">
                                <div class="card-content">
                                    <img class="card-img img-fluid" src="{{ asset('/app-assets/images/slider/04.jpg')}}" alt="Card image">
                                    <div class="card-img-overlay overflow-hidden overlay-success">
                                        <h4 class="card-title text-white"><a href ="{{ route('gsb.practicien') }}">Liste des Practiciens</a></h4>
                                        <p class="card-text text-white">Consulter la liste des practiciens présent sur le site GSB
                                        </p>
                                        <p class="card-text text-white"><small class="text-muted"></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img img-fluid" src="{{ asset('/app-assets/images/slider/04.jpg') }}" alt="Card image">
                                    <div class="card-img-overlay overflow-hidden overlay-warning">
                                        <h4 class="card-title text-white"><a href ="{{ route('gsb.visiteur') }}">Liste des Compte-rendus</h4>
                                        <p class="card-text text-white">Consulter la liste de vos compte-rendus 
                                        </p>
                                        <p class="card-text"><small class="text-white"></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
         
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script>
                $(document).ready(function() {
                 $('#RapportPerso').DataTable({
		  dom: 'Bfrtip',
      
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        }
    } );
} );


                        
            </script>

@endsection