<div class="modal fade" id="termine{{$tache->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Vous êtes en train de terminer une tâche </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment terminer cette tâche?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-success btnTermTache" data-id="{{$tache->id}}" data-url="{{route('termine-tache', ['id'=>$tache->id])}}">terminer</button>
            </div>
        </div>
    </div>
</div>

