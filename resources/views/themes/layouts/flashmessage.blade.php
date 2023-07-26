@if(session()->has('message'))



    {{--<div class="alert {{ session()->get('type') }} alert-dismissible fade show et_cont_alert" role="alert">
        <button type="button" class="btn-close et_btn_alert" aria-label="Close"></button>
        {{ session()->get('message') }}
    </div>--}}

    <div class="alert {{ session()->get('type') }} alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show et_cont_alert" role="alert">
        {{--<button type="button" class="btn-close et_btn_alert" aria-label="Close"></button>--}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @foreach ($errors->all() as $error)
            - {!!  $error !!} <br>
        @endforeach
    </div>
@endif
