@extends("layouts/app")
@section("title","Edition Clé API")
@section("content")
<section id="card-caps">
    <div class="row my-3">
        <div class=" col-md-12 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        
                        @isset($pass)
                    
                            <h4 class="card-title" align='center'>Bienvenue sur votre Espace Api</h4>
                            <hr>
                            <H4 align='left'>Vos informations utilisateurs</H4>
                            <div class ="row">
                                
                                <div class="container">
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
                                <br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light" data-toggle="modal" data-target="#success">
                                        Mettre à jour votre adresse mail
                                    </button>
                              @foreach ($dataUser as $item)
                                <a class="btn bg-gradient-info" href="{{ route('gsb.api.updateCompteur', ['id'=>$item->id,'pass'=>$MotDePasse]) }}" >Remettre le compteur à zéro</a>
                                <button type="button" class="btn btn-outline-success waves-effect waves-light" data-toggle="modal" data-target="#delete">
                                Effacer mon espace API
                                </button>
                              @endforeach
                
                            </div>
                            </div>
                            </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <H4 align='center'>Edition d'une nouvelle clé API</H4>
                                    <br>
                                    <p class="text-center">Chaque Compte peut posséder jusqu'à 3 clés API, au-dessus, il ne sera plus possible d'émettre de nouvelle clé.</p>
                                    <p class="text-center">Le calcul de votre nombre d'utilisations totales est fait à partit de vos anciennes et nouvelles clés</p>
                                    <div class="container">
                                    @if(isset($error))
                                    
                                    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading text-center">Attention</h4>
                                        <p class="mb-0 text-center">
                                            {{ $error }}
                                        </p>
                                    </div>
                                    @endif
                                  

                                    @if(isset($succes))
                                    
                                    <div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading text-center">Succès</h4>
                                        <p class="mb-0 text-center">
                                            {{ $succes }}
                                        </p>
                                    </div>
                                    @endif
                                    </div>
                                        <form action="{{ route('gsb.create.key') }}" method="POST">
                                            @csrf
                                        <input type="text" value="{{ $idAccount }}" name="idAccount" readonly hidden>
                                        <input type="text" value="{{ $MotDePasse }}" name="pass" readonly hidden>
                                        <button type="submit" class="btn btn-primary">Obtenir une clé</button>
                                    </form>
                                    </div>

                                    <hr>
                                    <H4 align='center'>Liste de vos clés</H4>
                                    <div class="container">
                                    <table id ="listeKey" class="table zero-configuration dataTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">Clé</th>
                                                <th scope="col">Nonbre d'utilisations</th>
                                                <th scope="col">date de création</th>
                                                <th scope="col">Détails</th>
                                                <th scope="col">Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                @forelse($dataKey as $key)
                                                <tr>
                                                    <td>{{ $key->API_KEY }}</td>
                                                    <td>{{ $key->API_NB_UTILISATION }}</td>
                                                    <td>{{ $key->API_DATE_CREATION }}</td>
                                                    <td><a href="" class="btn btn-outline-warning">Détails (TODO) </a></td>
                                                    <td><a href="{{ route('gsb.delete.key', ['key'=>$key->id,'pass'=>$MotDePasse]) }}" class="btn btn-outline-danger">Supprimer</a></td>
                                                </tr>
                                                @empty
                                                <span>Aucune donnée</span>
                                                @endforelse                    
                                           
                                        </tbody>
                                    </table>
                                </div>
<hr>

<!-- MODAL UPDATE MAIL -->

                <div class="modal fade text-left" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success white">
                                <h5 class="modal-title" id="myModalLabel110">Success Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action=" {{ route('gsb.api.updateMail') }}">
                                    @csrf
                                    <label>Votre nouvelle adresse Mail<label>
                                    <input type="email" class="form-control" name="newMail">
                                    
                                    @foreach ($dataUser as $data)
                                    <input type="text" name="passAccount" readonly hidden value="{{ $data->PASS }}">
                                    <input type="text" name="idAccount" readonly hidden value="{{ $data->id }}">
                                        
                                    @endforeach
                                    <button type="submit" class="btn bg-gradient-info">Mettre à jour votre adresse mail</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success waves-effect waves-light" data-dismiss="modal">Accept</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- MODAL DELETE ACCOUNT -->

                <div class="modal fade text-left" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success white">
                                <h5 class="modal-title" id="myModalLabel110">Success Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @foreach ($dataUser as $item)
                                <form method="POST" action=" {{ route('gsb.api.deleteAccount')}}">
                                     @method('delete')
                                    @csrf
                                    <a style="color: white">Si vous effacez votre compte Api toutes vos clés seront également effacées.</a><br>
                                    <input hidden readonly name="idAccount" value="{{ $item->id }}">
                                    <button type="submit" class="btn bg-gradient-info">Effacer Votre Compte Api ?</button>
                                </form>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Retour</button>
                            </div>
                        </div>
                    </div>
                </div>


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
 $('#listeKey').DataTable({
dom: 'Bfrtip',
buttons: [
'print'
],
"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"}});});

</script>

@endSection