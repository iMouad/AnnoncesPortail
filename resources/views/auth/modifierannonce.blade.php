@extends("layouts.master")

@section("content")



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$annonce->titre}}</h4>
                <h5 class="card-subtitle"> Veuillez bien remplir le formulaire ci-dessous pour modifier l'annonce </h5>
                 
            
                <form class="form-horizontal mt-4" enctype='multipart/form-data' method='POST' action="{{route('annonce.update',['annonce'=>$annonce->id])}}">
                    @csrf
                      
                    <input type="hidden" name="_method" value="put">

                    <div class="form-group">
                        <label for="title">Titre </label>
                        <input type="text" id="title" name="title" class="form-control"
                            placeholder="Titre de l'annonce" required value="{{$annonce->titre}}">
                            <span class="help-block"><small>Le titre de l'annonce qui apparaîtra dans les moteurs de recherche</small></span>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea  id="desc" name="desc" class="form-control" rows="5" required>{{$annonce->desc}}</textarea>
                        <span class="help-block"><small>Description de l'annonce (max:500 lettres)</small></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="ville">Ville: </label>
                        <input type="text" id="ville" name="ville" class="form-control"
                            placeholder="la ville" required value="{{$annonce->ville}}">
                            <span class="help-block"><small>Situez la ville exacte</small></span>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse: </label>
                        <input type="text" id="adresse" name="adresse" class="form-control"
                            placeholder="Adresse exacte" required value="{{$annonce->adresse}}">
                            <span class="help-block"><small>l'adresse de votre immobilier</small></span>
                    </div>

                    <div class="form-group">
                                   
                        
                       
                    </div>

                     
                        <button type="submit" class="btn btn-success text-white">Modifier</button>
                    

                </form>
    </div>

    

@endsection