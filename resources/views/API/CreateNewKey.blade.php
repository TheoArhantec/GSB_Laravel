@extends("layouts/app")
@section("title","Edition Clé API")
@section("content")
<section id="card-caps">
    <div class="row my-3">
        <div class=" col-md-12 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h1>PAGE TEMPORAIRE</h1>
                        <h4 class="card-title">Obtenir une clé pour l'Api</h4>
                        <div class ="form-row">

                        @isset($returnKey)
                            <input type="text" value="{{$returnKey}}" name="key"readonly>
                        @else
                            <input type="text" name="key"readonly>
                        @endisset
                        
                        </div>
                        <br>
                        <div class ="form-row">
                        <form action="{{ route('gsb.create.key') }}" method="POST">
                            @csrf
                        <button type="submit" class="btn btn-primary">Obtenir la clé</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection