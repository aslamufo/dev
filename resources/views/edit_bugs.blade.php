@extends('layouts.app')

@section('content')

<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }
</style>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<div class="container">
    <div class="row">
        <div class="col-9">
            <h2>{{ $project->project_name }}</h2><br>
        </div>
        
    </div>
    <form action="/update_issue/{{ $issue->id }}/{{ $project->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-12 mb-3">
                <input class=" form-control" type="text" name="issue_title" placeholder="Issue Title" value="{{ $issue->issue_title }}" required>
            </div>
        </div>
        <div class="row mb-3 d-flex align-items-center">
            <div class="col-8">
                <textarea name="description" id="description" rows="10" cols="80" placeholder="Enter the issue description">
                {{ $issue->description }}
                </textarea>
                {{-- <div id="text_area">
                    <div id="description">
                        <p>This is some sample content.</p>
                    </div>
                </div> --}}
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor 4
                    // instance, using default configuration.
                    CKEDITOR.replace( 'description' );
                </script>
                {{-- <script>
                    ClassicEditor
                            .create( document.querySelector( '#description' ), {
                                // removePlugins: [ 'Heading' ],
                                toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
                            })
                            .catch( error => {
                                console.error( error );
                            } );
                </script> --}}
                
                {{-- <textarea class=" form-control" name="description" placeholder="Description" id="" cols="30"
                    rows="5"></textarea> --}}
            </div>
            <div class="col-4">
                <img src="/{{ $issue->image }}" alt="" height="240px" style="max-width: 100%">
            </div>
        </div>
        <div class="row ">
            <div class="col-2">
                <div class="dropdown">
                    <div class="input-group mb-3">
                        <select class="form-select" name="issue_category" id="inputGroupSelect02">
                            <option value="Bug" @if ($issue->issue_category=='Bug'){{ "selected" }} @endif>Bug</option>
                            <option value="Feature Requirement" @if ($issue->issue_category=='Feature Requirement'){{ "selected" }} @endif>Feature Requirement</option>
                            <option value="UI Requirement" @if ($issue->issue_category=='UI Requirement'){{ "selected" }} @endif>UI Requirement</option>
                            <option value="UI Change" @if ($issue->issue_category=='UI Change'){{ "selected" }} @endif>UI Change</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <input class=" form-control" type="text" placeholder="Issue Location" value="{{ $issue->issue_location }}" name="issue_location" required>
            </div>
            <div class="col-2">
                <input class=" form-control" type="file" name="image">
            </div>
            <div class="col-2">
                <input class=" form-control" type="text" value="{{ $issue->url }}" placeholder="Video Url" name="url">
            </div>
            <div class="col-2">
                <div class="dropdown">
                    <div class="input-group mb-3">
                        <select class="form-select" name="priority" id="inputGroupSelect02">
                            <option value="High"  @if ($issue->issue_title=='High'){{ "selected" }} @endif>High</option>
                            <option value="Normal" @if ($issue->issue_title=='Normal'){{ "selected" }} @endif>Normal</option>
                            <option value="Low" @if ($issue->issue_title=='Low'){{ "selected" }} @endif>Low</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <button class="form-control bg-primary text-white" type="submit">Update</button>
            </div>
        </div>
    
    </form>
</div>

@endsection