@extends("layouts.master")

@section("content")


<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                Bienvenue {{$data->name}}.
                
            </div>
        </div>
    </div>

    <div class="col-lg-4">
       
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">Vos annonces totales:</h4>
                <h2 class="font-light">{{$nbannoncestotal}}
                </h2>
                <div class="mt-4">
                    <div class="row text-center">
                        <div class="col-6 border-right">
                            <h4 class="mb-2">{{$nbannoncespending}}</h4>
                            <span class="font-16 label label-warning label-rounded">En attente</span>
                        </div>
                        <div class="col-6">
                            <h4 class="mb-2 ">{{$nbannoncesapproved}}</h4>
                            <span class="font-16 label label-success label-rounded">Acceptées</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> 

@endsection