@extends("layouts.master")

@section("content")



<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">
                <h4 class="card-title"> Mes annonces en attente </h4>
                <h5 class="card-subtitle"> ci-dessous figurent vos annonces qui sont en attente d'approbation </h5>
                 
                <div class="table-responsive">
                    <table class="table" id='annoncesattentetable'>
                        <thead class="table-light">
                            <tr>
                                
                                <th scope="col">Titre de l'annonce</th>
                                <th scope="col">Date de publication</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($annonceattente as $annonce)
                            <tr>
                                
                                <td>{{$annonce->titre}}</td>
                                <td>{{$annonce->created_at}}</td>
                                <td><button href="" class="btn btn-info text-white" disabled>Modifier</a>
                                    <button href="" class="btn btn-danger text-white" disabled>Supprimer</a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
            $('#annoncesattentetable').DataTable({
                language: {
            processing:     "Traitement en cours...",
            search:         "Rechercher&nbsp;:",
            lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
            info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix:    "",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable:     "Aucune donnée disponible dans le tableau",
            paginate: {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
            }
            );
        } );
        </script>


@endsection