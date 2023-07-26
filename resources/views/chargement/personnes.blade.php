@if($personnes)
    <table class="table table-striped mb-40 mt-40">
        <thead>
        <tr>
            <th scope="col">Type de personne</th>
            <th scope="col">Nom prénoms</th>
            <th scope="col">Sexe</th>
            <th scope="col">Date de naissance </th>
            <th scope="col">Action </th>
        </tr>
        </thead>
        <tbody>
        @foreach($personnes as $personne)
            <tr>
                <th scope="row">{{ucfirst($personne->typepersonne->libelle)}}</th>
                <th scope="col">{!! ucfirst($personne->nom) !!} {!! ucfirst(substr($personne->prenom,0,20)) !!}... </th>
                <th scope="col">{{ $personne->sexe = 1 ?'Masculin' : 'Féminin' }}</th>
                <th scope="col">{{date('d/m/Y',strtotime($personne->datenaissance))}} </th>
                <th scope="row">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$personne->id}}">
                        Supprimer
                    </button>
                    <div class="modal fade" id="exampleModal{{$personne->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Vous êtes en train de supprimer une personne </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Voulez-vous vraiment supprimer cette personne?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="button" class="btn btn-danger supprimer" data-id="{{$personne->id}}" data-url="{{route('delete-personne', ['id'=>$personne->id])}}">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </th>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{--{!! $taches->links() !!}--}}
@else
    <div>
        <h5> Aucun siniste enregistré </h5>
    </div>
@endif
