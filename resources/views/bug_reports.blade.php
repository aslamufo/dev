@extends('layouts.app')
@section('content')
@livewireStyles
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    window.addEventListener('alert', event => { 
                 toastr[event.detail.type](event.detail.message, 
                 event.detail.title ?? ''), toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                    }
                });
</script>
<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }

    /* ===== Scrollbar CSS ===== */


    /* Firefox */

    * {
        scrollbar-width: thin;
        scrollbar-color: #000000 #ffffff;
    }


    /* Chrome, Edge, and Safari */

    *::-webkit-scrollbar {
        width: 6px;
    }

    *::-webkit-scrollbar-track {
        background: #ffffff;
    }

    *::-webkit-scrollbar-thumb {
        background-color: #000000;
        border-radius: 0px;
        border: 0px none #000000;
    }
</style>

<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<div class="container" style="height:100%">
    @livewire('buglist',['projectid'=>$project])
</div>
@livewireScripts
@endsection