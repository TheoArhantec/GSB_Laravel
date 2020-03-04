@extends("layouts/app")
@section("title", "Nouveau Compte Rendus")
@section("content")



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    

 <script src="{{ asset('/app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
 <script src="{{ asset('/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
 <script src="{{ asset('/app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
 <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/forms/select/select2.min.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/colors/palette-gradient.css') }}">









<section id="card-caps">
                    <div class="row my-3">
                        <div class=" col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">EDITION NOUVEAU COMPTE-RENDU</h4>
					<form method="post" action="{{ route('gsb.newCR') }}">
						
					 @csrf

						<div class="form-group">
							<label for="practicien" class="text-black"> Practicien : </label><br>
							<select class="form-control" id="numPra" name="numPra"> 
							@forelse($praticiens as $key => $praticien)

								<option value="{{ $praticien->PRA_NUM}}">
					{{ $praticien->PRA_NOM}} {{ $praticien->PRA_PRENOM }}</option> 
					@empty
								<option>c'est vide</option>
					 @endforelse
							</select>

						</div>
						<div class="form-group">

							<label for="Date" class="text-black"> Date rapport : </label> <input
								type="date" class="form-control" id="date" name="date" required />
						</div>

						<div class="form-group">

							<label for="motifvisite" class="text-black"> Motif Visite : </label>
							<input type="text" class="form-control" id="motifvisite"
								name="motifvisite" required />
						</div>

						<div class="form-group">

							<label for="bilan" class="text-black"> Bilan : </label>
							<textarea class="form-control" id="bilan" name="bilan" required /></textarea>

						</div>

						<div class="form-group">

							<table id="tableau"
								class="table table-striped table-hover table-bordered">


								<tr id="tr">
									<td>Nom médicament<select id="medicament" name="medicament"
										class="form-control select2 select2-container select2-container--default select2-container--below select2-container--focus">
										 @forelse ($medics as $key => $medic)
											<option value="{{ $medic->MED_NOMCOMMERCIAL }}">
											{{$medic->MED_NOMCOMMERCIAL }}</option> 
											@empty
												
											<option>c'est vide</option>
											 @endforelse
									</select>





									</td>
									<td>quantite: <input id="qte"
										class="form-control">
									</td>
									<td align ="center">
									<a class="btn text-center colors-container bg-gradient-success  text-white " onclick="ajouterLigne()">Ajout</a></td>
									<td align ="center"> <a class="btn text-center colors-container bg-gradient-danger  text-white " onclick="supprimerLigne()">Supprimer</a></td>
								</tr>

								<input id="listemed" name="listemed" type="hidden">
								<input id="visiteur" name="visiteur" type="hidden">

							</table>

						</div>

						<button type="submit" id ="bouton" class="btn btn-primary">Valider</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</section>


<script type="text/javascript">




	function supprimerLigne(num)
	{
		listemed.value = "";
		var tableau = document.getElementById("tableau");
		var tableRows = tableau.getElementsByTagName('tr');
		var rowCount = tableRows.length;
		for(var x = rowCount-1; x>0; x--){
			tableau.deleteRow(x);
		}
		//remet la longueur de l'array à 0
		listeMedoc.length  = 0;
	}

    var listeMedoc = []; //ArrayList des pieces
    var test = ""; // Cette variable sert de d'obtenir un pass si la piece n'est pas déjà saisie
    function ajouterLigne(){
        var tableau = document.getElementById("tableau");
        var listeMagasin = document.getElementById("listemed");
        var piece = document.getElementById("medicament").value;
        // Verrou permet de "verouiller la condition si le nomMedic existe déjà
        var verrou = 0;
        // Pour faire commencer l'array à 1
        listeMedoc.push("//////");

        // Recherche si la pièce existe déjà dans l'arrayList
        for (var i = 0; i < listeMedoc.length; i++) {
            if (listeMedoc[i] == piece){
                test = listeMedoc[i];
                verrou = 1;
        }else{
            if((listeMedoc[i] != piece) && (verrou == 0)){
                // Clé de passage
                test = "CBON";
            }
        } }
        //Test à la suite le si la piece est déjà utilisée et si la qté est bien un nombre divisible par 1
        if (test != piece){
            if(piece != "nonPiece"){
                if (((document.getElementById('qte').value % 1) == 0 ) &&
                    ((document.getElementById('qte').value) != "" ) && 
                    (document.getElementById('qte').value) != 0)  {
                    listeMagasin.value = listeMagasin.value+document.getElementById("medicament").value+" "+document.getElementById('qte').value+" ";
                    
                    nomPiece = document.getElementById("medicament").value;
                    qte = document.getElementById("qte").value;

                    var ligne = tableau.insertRow(-1);//on a ajouté une ligne
                    var colonne1 = ligne.insertCell(0);//on a une ajouté une cellule
                    colonne1.id +=document.getElementById("medicament").value; //On ajoute une classe 
                      elt = document.getElementById("medicament"); //Permet de recuperer le text dans l'option et non la value qui est moins lisible
                      elt.options[elt.selectedIndex].text;
                    colonne1.innerHTML +=  elt.options[elt.selectedIndex].text;//on y met le contenu de titre

                    var colonne2 = ligne.insertCell(1);//on ajoute la seconde cellule
                    colonne2.id += document.getElementById("medicament").value + " " + document.getElementById("qte").value ; //On ajoute une classe 
                    colonne2.innerHTML += document.getElementById("qte").value;

                    var colonne3 = ligne.insertCell(2);//on ajoute la quatrième cellules
                    colonne3.id += document.getElementById("medicament").value + "update"; //On ajoute un id 
                      var updateButton = document.createElement("button");
                      updateButton.innerHTML = "Modifier la quantité"
                      updateButton.setAttribute('type','button');
                      updateButton.setAttribute('id',nomPiece +'bUpdate');
                      updateButton.setAttribute('onclick','modifqte(\"' + nomPiece + " " + qte + '"\ ' + ',' + '\"' + nomPiece + '"\ )');
                      updateButton.classList.add("btn");
                      updateButton.classList.add("btn-info");  
                    colonne3.appendChild(updateButton);

                    var colonne4 = ligne.insertCell(3);//on ajoute la troisième cellule
                    colonne4.id += document.getElementById("medicament").value + "delete"; //On ajoute une classe 
                      var button = document.createElement("button"); //Création du bouton qui permet de supprimer la pièce
                      button.innerHTML = "Supprimer la piece"
                      button.setAttribute('type','button');
                      button.setAttribute('id',nomPiece +'bDelete');
                      button.setAttribute('onclick','supprUneLigne(\"' + nomPiece + " " + qte + '"\ ' + ',' + '\"' + nomPiece + '"\ )');
                      button.classList.add("btn");
                      button.classList.add("btn-danger");
                    colonne4.appendChild(button);
                    // button.onclick = supprUneLigne(nomPiece);return false;
                    //ajoute le composant à l'arraylist pour ne plus l'utliser
                    listeMedoc.push(piece);

          //Messages d'erreurs//
            }else{
              Swal.fire({
                    icon: 'error',
                    title: 'Erreur de saisie',
                    text: "Veuillez saisir une quantité",
                    })}
            }else{
                 Swal.fire({
                    icon: 'error',
                    title: 'Erreur de saisie',
                    text: "Aucune Piece Selectionnée",
                    })}
            }else{
                 Swal.fire({
                    icon: 'error',
                    title: 'Erreur de saisie',
                    text: "Pièce en doublon",
                    })
            }     
    }

    function modifqte(idnbPiece,idPiece){
       Swal.fire({
       title: 'Modification de la quantité',
       input: 'number',
        showCancelButton: true,
       inputValidator: (value) => {
         if (!value) {
          return 'Veuillez saisisr une quantité'
       }else{
          if(value <= 0){
             return 'Veuillez saisisr une quantité'
          }else{
              if(value % 1 == 0){
          //on "recalcul" la value pour la piece supprimé soit supprimé de la value 
          var listePieceHtml =  document.getElementById('listemed').value;
          var correction = listePieceHtml.replace( idnbPiece ,idPiece + " " + value);
          //On applique la correction dans le input 
          document.getElementById('listemed').value = correction;

          //on recherche la cellule de la qte pour modifier la qtn afficher
          qteCell = document.getElementById(idnbPiece);
          qteCell.innerHTML = value;
          qteCell.id = idPiece + " " + value;
           
          var ColonneDelete = document.getElementById(idPiece + "delete");

          var ColonneUpdate = document.getElementById(idPiece + "update");
          
            var buttonUpdate = document.getElementById(idPiece + "bUpdate");
            buttonUpdate.setAttribute('id',idPiece +'bUpdate');
            buttonUpdate.setAttribute('onclick','modifqte(\"' + idPiece + " " + value + '"\ ' + ',' + '\"' + idPiece + '"\ )');

            var buttonSuppr = document.getElementById(idPiece + "bDelete");
            buttonSuppr.setAttribute('id',idPiece +'bDelete');
            buttonSuppr.setAttribute('onclick','supprUneLigne(\"' + idPiece + " " + value +  '"\ ' + ',' + '\"' + idPiece + '"\ )');
            

              }else{
                 return 'Veuillez saisisr une quantité'
              }
  
      }   
    }
        
      }
      }
    )}

   
  

    function supprUneLigne(numPiece,idNumpiece)
    {
     //On efface les composants qui porte l'id de la piece  
     //note :  chauque composant à un id precis pour rendre leur manipulation plus simple 
  
     var element = document.getElementById(idNumpiece);
     element.parentNode.removeChild(element);
    
      var qteCell = document.getElementById(numPiece);
      qteCell.parentNode.removeChild(qteCell);

      var buttonUpdate = document.getElementById(idNumpiece + "update");
      buttonUpdate.parentNode.removeChild(buttonUpdate);

      var buttonSuppr = document.getElementById(idNumpiece + "delete");
      buttonSuppr.parentNode.removeChild(buttonSuppr);


    //on "recalcul" la value pour la piece supprimé soit supprimé de la value 
    var listePieceHtml =  document.getElementById('listemed').value;
    var correction = listePieceHtml.replace( numPiece + " ","");
    document.getElementById('listemed').value = correction;

    //on cherche dans quel case la piece est 
    //quand on la trouve, on la supprime de l'array
    for( var i = 0; i < listeMedoc.length; i++){ 
     if ( listeMedoc[i] === idNumpiece) {
        listeMedoc.splice(i, 1); 
    }
  }

    
    }




</script>

 <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/components.js') }}"></script>
   

    
    <script src="{{ asset('/app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <!-- END: Page JS-->

@endsection
