@extends("layouts/app")
@section("title", "Nouveau Compte Rendus")
@section("content")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('/app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/forms/select/select2.min.css') }}">

<section id="card-caps">
    <div class="row my-3">
        <div class=" col-md-12 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">API - Praticien</h4>
                        <hr>
                        <p> Pour un Praticien donné, l'API retourne les informations qui le concerne.</p>
                        <div class="row">
                       <div class = "col-6">
                        <form method="post" action="{{ route('gsb.api.praticienResult') }}" id="add" accept-charset="UTF-8">
                            @csrf
                        <div class="form-group">
                        <label for="recherchePraticienParType">Selection du visiteur</label> 
                            <select class="form-control form-control select2 select2-container select2-container--default select2-container--below" id="select" name="visiteurAPI">
                               @isset($result)
                                    @foreach ($praticiens as $praticien)
                                        @if($praticien->name == $name)
                                            <option selected value="{{ $praticien->PRA_NOM }}">{{ $praticien->PRA_NOM }} {{ $praticien->PRA_PRENOM }}</option>
                                        @else
                                            <option value="{{ $praticien->PRA_NOM }}">{{ $praticien->PRA_NOM }} {{ $praticien->PRA_PRENOM }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($praticiens as $praticien)
                                        <option value="{{ $praticien->PRA_NOM }}">{{ $praticien->PRA_NOM }} {{ $praticien->PRA_PRENOM }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                            <button type="submit" value="bouton_valider"class="btn btn-primary">Rechercher</button>
                        </form>
                     </div>
                     <div class = "col-6">
                        @isset($result)
                        @if ($result == "Error")
                        <h1 align="center"> Aucune données </h1>
                       @else
                        <table id ="listeVisiteur" class="table zero-configuration dataTable" style="width:100%">
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
                                    @for ($i = 0; $i < count($result); $i++)
                                        <tr>
                                            <td>{{ $result[$i]['PRA_NOM'] }}</td>
                                            <td>{{ $result[$i]['PRA_PRENOM'] }}</td>
                                            <td>{{ $result[$i]['PRA_ADRESSE'] }}</td>
                                            <td>{{ $result[$i]['PRA_VILLE'] }}</td>
                                            <td>{{ $result[$i]['TYP_LIBELLE'] }}</td>
                                            <td>{{ $result[$i]['TYP_LIEU']  }}</td>
                                        <tr>
                                    @endfor
                                </tbody>
                            </table>
                       @endif 
                    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="card-caps">
    <div class="row my-3">
        <div class=" col-md-12 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Documentation API</h4>
                        <span>Pour accéder à l'api il faut passer par l'url :</span>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body bg-dark">
                            <a class="text-success">/api/visiteur/{Clé de l'api}/{Nom visiteur}</a>
                                </div></div></div>
                                <hr>
                                <span>Les différents messages d'erreurs :</span>
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body bg-dark">
                                            <span>//Si le visiteur demandé n'existe pas :</span><br>
                                            <a class="text-success">{"error":"Le visiteur n'existe pas."} [ code : 416 ] </a>
                                        </div></div></div>


                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body bg-dark">
                                                    <span>//Si le visiteur demandé n'a pas redigé de rapport de visite :</span><br>
                                                    <a class="text-success">{"error":"Aucun rapport trouvé"} [ code : 415 ] </a>
                                                </div></div></div>
                                                
                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="card-body bg-dark">
                                                            <span>//Si la clé de l'api n'existe pas :</span><br>
                                                            <a class="text-success">{'error': 'Clé invalide'} [ code : 420 ] </a>
                                                        </div></div></div>






                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BEGIN: Theme JS-->
<script src="{{ asset('/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('/app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('/app-assets/js/scripts/components.js') }}"></script>



<script src="{{ asset('/app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
<!-- END: Page JS-->
@endsection