@extends("layouts/app")
@section("title","Edition Clé API")
@section("content")
<section id="card-caps">
    <div class="row my-3">
        <div class=" col-md-12 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                       
                        
                        @isset($pass)
                    
                            <h4 class="card-title" align='center'>Bienvenue sur votre Espace Api</h4>
                            <div class ="row">
                                <H4 align='center'>Vos informations utilisateurs</H4>
                                <table id ="listeVisiteur" class="table zero-configuration dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mail</th>
                                            <th scope="col">Passe Api</th>
                                            <th scope="col">Nombre d'utilisations totale</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($dataUser as $data)
                                                <td>{{ $data->API_MAIL }}</td>
                                                <td>{{ $data->PASS }}</td>
                                                <td>{{ $data->API_NB_UTILISATION }}</td>
                                            @endforeach                    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <H4 align='center'>Edition d'une nouvelle clé API</H4>
                                    <br>
                                    <p class="text-center">Chaque Compte peut posséder jusqu'à 3 clés API, au-dessus, il ne sera plus possible d'émettre de nouvelle clé.</p>
                                        <form action="{{ route('gsb.create.key') }}" method="POST">
                                            @csrf
                                        <input type="text" value="{{ $idAccount }}" name="idAccount" readonly hidden>
                                        <input type="text" value="{{ $MotDePasse }}" name="pass" readonly hidden>
                                        <button type="submit" class="btn btn-primary">Obtenir une clé</button>
                                    </form>
                                    </div>

                                    <hr>
                                    <H4 align='center'>Liste de vos clés</H4>
                                    <table id ="listeVisiteur" class="table zero-configuration dataTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">Clé</th>
                                                <th scope="col">Nonbre d'utilisations</th>
                                                <th scope="col">date de création</th>
                                                <th scope="col">Détails</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                @forelse($dataKey as $key)
                                                <tr>
                                                    <td>{{ $key->API_KEY }}</td>
                                                    <td>{{ $key->API_NB_UTILISATION }}</td>
                                                    <td>{{ $key->API_DATE_CREATION }}</td>
                                                    <td>Voir détail de l'utilisations (A faire)</td>
                                                <tr>
                                                @empty
                                                <span>Aucune donnée</span>
                                                @endforelse                    
                                            </tr>
                                        </tbody>
                                    </table>




                        @else        
                        <div class ="row">              
                        <div class="col-6">      
                            <h4 class="card-title" align='center'>Création Compte API</h4>
                            <form method="POST" action="{{ route('gsb.api.createAccount') }}">
                                @csrf
                                <label>Veuillez saisir votre adresse mail</label>
                                <input type="email" class="form-control" name="mailAPI" required><br>
                                <button type="submit" class="btn btn-success">Confirmer la Création</button>
                            </form>
                        </div>  
                        <div class="col-6">
                            <h4 class="card-title" align='center'>Connection à votre interface</h4>      

                            <form method="POST" action="{{ route('gsb.api.getAccount') }}">
                                @csrf
                                <label>Veuillez saisir votre adresse mail</label>
                                <input type="mail" class="form-control" name="mail" required><br>
                                <hr>
                                <label>Veuillez saisir votre Pass Unique</label>
                                <input type="text" class="form-control" name="pass" required><br>
                                <button type="submit" class="btn btn-success">Se connecter</button>
                            </form>
                        </div>
                        @endisset

                      
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endSection