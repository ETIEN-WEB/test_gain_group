<div class="modal fade" id="exampleModal{{$tache->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Vous êtes en train de supprimer une tâche </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimer cette tâche?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger btnSupTache" data-id="{{$tache->id}}" data-url="{{route('delete-tache', ['id'=>$tache->id])}}">Supprimer</button>
            </div>
        </div>
    </div>
</div>

