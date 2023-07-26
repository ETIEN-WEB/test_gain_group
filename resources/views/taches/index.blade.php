@extends('themes.layouts.template')

@section('content')
    <style>
        .cursor_pointer{
            cursor: pointer;
        }
        .txt_red {
            color: red;
        }
        .mt_10 {
            margin-top: 9px;
        }
        #tacheForm label.error {
            color: red;
            font-size: 13.5px;
        }
        .ctn_notifi {
            position: relative;
            border-radius: 6px;
            background-color: #f4a5a5c2;
            padding: 10px 7px;
            padding-right: 22px;
        }

        .ctn_notifi .txt_notifi{
            color: #f70505;
        }
        .remove_btn_notifi {
            position: absolute;
            right: 4px;
            top: 3px;
        }
        .ctn_notifi .remove_btn_notifi i {
            padding: 4px 6px;
            background-color: white;
            color: black;
            border-radius: 50%;
        }
        .cl_blue {
            color: blue;
        }
        .text_cu_pc {
            font-size: 13px;
            line-height: 1.3;
        }
    </style>

    <div class="pt-90 pb-85">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-7">
                    <div style="margin-left: -8px;" class="mb-70 mt-20">
                        <div class="header-button">
                            <strong> Liste des taches  </strong>
                            <br>
                            <br>
                            <a href="{{route('create-tache')}}"> Enregistrer une tache </a>
                        </div>
                    </div>
                    <div>
                        @include('themes.layouts.flashmessage')
                        <br>
                    </div>

                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-12" id="ctn_tache">
                    @if($taches)
                        <table class="table table-striped mb-40 mt-40">
                            <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Date d'enregistrement </th>
                                <th scope="col">Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taches as $tache)
                                <tr id="tr{{$tache->id}}">
                                    <th scope="row">{{ucfirst($tache->titre)}}</th>
                                    <th scope="col">
                                        @if($tache->status == 1)
                                            <span class="badge rounded-pill bg-primary" id="status{{$tache->id}}">En cours</span>
                                        @elseif($tache->status == 2)
                                            <span class="badge rounded-pill bg-success">Terminée</span>
                                        @endif
                                    </th>
                                    <th scope="col">{{date('d/m/Y H:i:s',strtotime($tache->created_at))}} </th>
                                    <th scope="row">
                                        @if($tache->status == 1)
                                        <span class="badge rounded-pill bg-success cursor_pointer" id="badgeTermT{{$tache->id}}" data-bs-toggle="modal" data-bs-target="#termine{{$tache->id}}">
                                            Terminer
                                        </span>
                                        @endif
                                        @include('taches.modalTermine')
                                        &nbsp;
                                        <span class="badge rounded-pill bg-danger cursor_pointer" data-bs-toggle="modal" data-bs-target="#exampleModal{{$tache->id}}" data-id="{{$tache->id}}" data-url="{{route('delete-tache', ['id'=>$tache->id])}}">
                                           Supprimer
                                        </span>
                                        @include('taches.modal')
                                    </th>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                          {!! $taches->links() !!}
                    @else
                        <div>
                            <h5> Aucune tâche enregistré </h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <!--//////////////// START SCRIPT POUR SUPPRIMMER UNE TACHE ///////////////////////////////////////////////////////-->
    <script>
        $(document).ready(function() {

            $(".btnSupTache").on('click',function(e){
                e.preventDefault();
                var supId = $(this).attr('data-id');
                var url = $(this).attr('data-url');
               //console.log($(this));
                $("#exampleModal"+supId).modal('hide');
                $.ajax({
                    type:'get',
                    url:url,
                    success:function(data)
                    {
                        var tr = $("#tr"+data.id);
                        tr.hide();
                        //console.log(data.id);
                    }
                });

            });
        });
    </script>
    <!--//////////////// END SCRIPT POUR SUPPRIMMER UNE TACHE ///////////////////////////////////////////////////////-->

    <!--//////////////// START SCRIPT POUR TERMINER UNE TACHE ///////////////////////////////////////////////////////-->
    <script>
        $(document).ready(function() {

            $(".btnTermTache").on('click',function(e){
                e.preventDefault();
                var terId = $(this).attr('data-id');
                var url_t = $(this).attr('data-url');
                //console.log($(this));
                $("#termine"+terId).modal('hide');
                $.ajax({
                    type:'get',
                    url:url_t,
                    success:function(data)
                    {
                        var tr = $("#tr"+data.id);
                        tr.find('span[id=status'+data.id+']').removeClass('bg-primary');
                        tr.find('span[id=status'+data.id+']').addClass('bg-success');
                        tr.find('span[id=status'+data.id+']').text('');
                        tr.find('span[id=status'+data.id+']').text('Terminer');
                        tr.find('span[id=badgeTermT'+data.id+']').hide();



                        //console.log(spanStatus);
                    }
                });

            });
        });
    </script>
    <!--//////////////// END SCRIPT POUR TERMINER UNE TACHE ///////////////////////////////////////////////////////-->


@endpush
