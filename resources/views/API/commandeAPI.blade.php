@extends('layouts/app')
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
                        <h4 class="card-title">API - Commande</h4>
                        <hr>
                        <p> Pour un Praticien donné, l'API retourne les médicaments à commander.</p>
                        <div class="row">
                       <div class = "col-6">
                            <form method="post" action="{{ route('gsb.api.commandeResult') }}" id="add" accept-charset="UTF-8">
                            @csrf
                        <div class="form-group">
                        <label for="recherchePraticienParType">Selection du Praticien</label> 
                            <select class="form-control form-control select2 select2-container select2-container--default 
                            select2-container--below" id="select" name="CommandeAPI">
                            @foreach($praticiens as $item)
                                @isset($result)
                                        @if($item->PRA_NOM  == $nom_praticien)
                                            <option selected value = "{{$item->PRA_NOM}}">{{$item->PRA_NOM}} {{$item->PRA_PRENOM}} </option>
                                        @else
                                            <option value = "{{$item->PRA_NOM}}">{{$item->PRA_NOM}} {{$item->PRA_PRENOM}} </option>
                                        @endif
                                @else
                                    <option value = "{{$item->PRA_NOM}}">{{$item->PRA_NOM}} {{$item->PRA_PRENOM}} </option>
                                @endif
                            @endforeach
                               
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
                         <table id ="listeCommande" class="table zero-configuration dataTable" style="width:100%">
                                 <thead>
                                     <tr>
                                         <th scope="col">Nom Depot Legal</th>
                                         <th scope="col">Nom Commercial</th>
                                         <th scope="col">Taille de la boite</th>
                                         <th scope="col">Nombre boite</th>
                                         <th scope="col">Quantité totale</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @for ($i = 0; $i < count($result); $i++)
                                         <tr>
                                             <td>{{$result[$i]['MED_DEPOTLEGAL']}}</td>
                                             <td>{{$result[$i]['MED_NOMCOMMERCIAL']}}</td>
                                             <td>{{$result[$i]['BOITE_QTE']}}</td>
                                             <td>{{$result[$i]['NB_BOITE_A_COMMANDER']}}</td>
                                             <td>{{$result[$i]['MEDICAMENT_QTE']}}</td>
                                         </tr>
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
                            <a class="text-success">/api/commande/{Nom du praticien}</a>
                                </div></div></div>
                                <hr>
                                <span>Les différents messages d'erreurs :</span>
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body bg-dark">
                                            <span>//Si le praticien demandé n'existe pas :</span><br>
                                            <a class="text-success">{"error":"Le praticien n'existe pas."} [ code : 434 ] </a>
                                        </div></div></div>


                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body bg-dark">
                                                    <span>//Si le praticien demandé n'a pas redigé de rapport de visite :</span><br>
                                                    <a class="text-success">{"error":"Aucun rapport effectué."} [ code : 435 ] </a>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
 $('#listeCommande').DataTable({


"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
}
} );
} );


        
</script>
@endsection