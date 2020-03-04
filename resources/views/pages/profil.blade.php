@extends("layouts/app")
@section("title", "Profil")

@section("content")

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/forms/validation/form-validation.css') }}">
    <!-- END: Page CSS-->

<section id="card-caps">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <h4 class="card-title">Votre Profil</h4>
              @foreach ($UnUsers as $user)
              <table class='table table-bordered table-hover text-dark' >
                <thead>
                    <tr>
                      <th scope='col' colspan='2' class='text-center'>Profil</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                      <th scope='row'>Matricule</th>
                      <td height='40px'class='col-md-8 text-center '>{{ $user->VIS_MATRICULE }}</td>
                    </tr>
                    <tr>
                      <th scope='row'>Nom</th>
                      <td height='40px'class='col-md-8 text-center'>{{ $user->VIS_NOM }}</td>
                    </tr>

                    <tr>
                      <th scope='row'>Prénom</th>
                      <td height='40px'class='col-md-8 text-center'>{{ $user->Vis_PRENOM }}</td>
                    </tr>
                    <tr>
                      <th scope='row'>Ville</th>
                      <td height='40px'class='col-md-8 text-center'>{{ $user->VIS_VILLE }}</td>
                    </tr>
                    <tr>
                      <th scope='row'>Adresse</th>
                      <td height='40px'class='col-md-8 text-center'>{{ $user->VIS_ADRESSE }}</td>
                    </tr>
                    <tr>
                      <th scope='row'>Cp</th>
                    <td height='40px'class='col-md-8 text-center'>{{ $user->VIS_CP }}</td>
                    </tr>
                    <tr>
                      <th scope='row'>Date d'embauche</th>
                    <td height='40px'class='col-md-8 text-center'>{{ $user->VIS_DATEEMBAUCHE }}</td>
                    </tr>
                  </tbody>
                </table>
              
              @endforeach
            </div>
          </div>
        </div>
       </div>
			 <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
          <div class="card-content">
            <div align="center" class="card-body">

            <h1>Modification de votre Profil</h1>
            <a>Vous pouvez mettre à jour vos informations personnelles<br>
            A l'exception de votre matricule et de votre date d'embauche</a><br>

            <button type="button" class="btn text-center colors-container bg-gradient-success text-white " data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Modification de votre Profil</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>










<div class="modal fade text-dark test" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Modification Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class="form-horizontal" id = "JQUERY" method="post" action="{{ route('gsb.update') }}">
  @csrf 
<!-- Text input-->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input id="newNom" name="newNom" type="text" value="{{ $user->VIS_NOM }}" class="form-control input-md" required>
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prénom</label>
   <input id="newPrenom" name="newPrenom" type="text" value="{{ $user->Vis_PRENOM }}" class="form-control input-md" required>
      </div>
    </div>
  <div class="form-group">
    <label for="inputAddress">Mot de Passe</label>
    <input type="password" name="password" class="form-control" placeholder="Your Password" 
     data-validation-message="The password field is required" minlength="6" aria-invalid="false">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Confirmation Mot de Passe</label>
   <input type="password" name="con-password" class="form-control" placeholder="Confirm Password"  data-validation-match-match="password" 
   data-validation-message="The Confirm password field is required" minlength="6" aria-invalid="false">
  </div>
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputCity">Ville</label>
     <input id="NewVille" name="NewVille" type="text" value="{{ $user->VIS_VILLE }}" class="form-control input-md" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Code Postal</label>
     <input id="newCp" name="newCp" type="text" value="{{ $user->VIS_CP }}" class="form-control input-md" required>
    </div>
    </div>
     <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputZip">Adresse</label>
      <input id="adresse" name="adresse" type="text" value="{{ $user->VIS_ADRESSE }}" class="form-control input-md" required>
    </div>
    </div>
  
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>



</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--
<script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$().ready(function() {
	  $("#JQUERY").validate({
	  rules : {
		  newPrenom  : {
	      required : true
	    },
	    newNom  : {
	      minlength : 3
	    },
	    Pass : {
            minlength : 5
        },
        password_confirm : {
            minlength : 5,
            equalTo : '[name="Pass"]'
        }
    },
	    
	  messages : {
		  newPrenom : "Veuillez fournir un prénom",
		  newNom : "Veuillez fournir un nom d'au moins trois lettres",
		  password_confirm :"Les mot de passe ne sont pas identique ",
		  Pass : "Le mot de passe doit contenir 5 caractéres"
	  
	  }
	 });
	});
</script>

-->
  <script src="{{ asset('/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/core/app.min.js') }}"></script>
    <script src= "{{ asset('/app-assets/js/scripts/components.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/customizer.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/footer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/app-assets/js/scripts/forms/validation/form-validation.js') }}"></script>
    <!-- END: Page JS-->

  @endsection
 

