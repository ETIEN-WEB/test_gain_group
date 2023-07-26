@extends('themes.layouts.template')

@section('content')
    <style>
        .txt_red {
            color: red;
        }
        .mt_10 {
            margin-top: 9px;
        }
        #sinistreForm label.error {
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
                <div class="col-lg-8">
                    <div style="margin-left: -8px;" class="mb-70 mt-20">
                        <div class="header-button">
                            <strong> Enregistrer une tâche </strong>
                            <br>
                            <br>
                            <a href="{{route('index-tache')}}"> Voir la liste des tâches </a>
                        </div>
                    </div>
                    <div class="contact_froms style-two">
                        <div>
                            @include('themes.layouts.flashmessage')
                            <br>
                        </div>
                        <form action="{{ route('store-tache')}}" method="POST" id="" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_box mb-3">
                                        <label for="titre" class="capitalize text-gray-600"> Titre <strong class="text-red tw_800">*</strong></label>
                                        <input class="form-control" type="text" name="titre" placeholder="Titre">
                                        <div class="fieldError"></div>
                                        <span class="txt_red error-text numero_police_error"></span>
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <div class="quote_btn text_center pt-3">
                                        <button class="btn btn-success" type="submit">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')

@endpush
