@extends("layouts.master")

@section("content")



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter une annonce</h4>
                <h5 class="card-subtitle"> Veuillez bien remplir le formulaire ci-dessous pour ajouter une annonce </h5>
                 
            
                <form class="form-horizontal mt-4" enctype='multipart/form-data' method='POST' action="{{route('annonce.ajouter')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre </label>
                        <input type="text" id="title" name="title" class="form-control"
                            placeholder="Titre de l'annonce" required>
                            <span class="help-block"><small>Le titre de l'annonce qui apparaîtra dans les moteurs de recherche</small></span>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea  id="desc" name="desc" class="form-control" rows="5" required></textarea>
                        <span class="help-block"><small>Description de l'annonce (max:500 lettres)</small></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="ville">Ville: </label>
                        <input type="text" id="ville" name="ville" class="form-control"
                            placeholder="la ville" required>
                            <span class="help-block"><small>Situez la ville exacte</small></span>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse: </label>
                        <input type="text" id="adresse" name="adresse" class="form-control"
                            placeholder="Adresse exacte" required>
                            <span class="help-block"><small>l'adresse de votre immobilier</small></span>
                    </div>

                    <div class="form-group">
                                    <label for="images">Insérez des images</label>
                                    <input type="file" id="images" name="images[]" class="form-control" multiple="multiple">
                                    <span class="help-block"><small>Les images du bien immobilier</small></span>
                     </div>

                     
                        <button type="submit" class="btn btn-success text-white">Ajouter</button>
                    

                </form>
    </div>

    

@endsection