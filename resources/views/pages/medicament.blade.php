@extends("layouts/app")

@section("title", "Liste Medicamemts")
@section("content")

<section id="card-caps">
                    <div class="row my-3">
                        <div class=" col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Liste des médicaments</h4>
 		<table id ="listeMedoc" class="table zero-configuration dataTable" style="width:100%">
		<thead>
 
			<tr>
				<th scope="col">Code</th>
				<th scope="col">Nom Commercial</th>
				<th scope="col">Famille</th>
				<th scope="col">Composition</th>
				<th scope="col">Effets indésirables	</th>
				<th scope="col">Contre indications</th>
			</tr>
		</thead>
		<tbody>
	
	
		@foreach ($medics as $key => $medic)
			<tr>
				<td>{{ $medic->MED_DEPOTLEGAL }}</td>
				<td>{{ $medic->MED_NOMCOMMERCIAL }}</td>
				<td>{{ $medic->famille->FAM_CODE }}</td>
				<td>{{ $medic->MED_COMPOSITION }}</td>
				<td>{{ $medic->MED_EFFETS }}</td>
				<td>{{ $medic->MED_CONTREINDIC }}</td>
			</tr>

 		@endforeach
		</tbody>
	</table>
</div>
</section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script>
                $(document).ready(function() {
                 $('#listeMedoc').DataTable({
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

  @endsection

 
