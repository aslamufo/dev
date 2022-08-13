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
    <form action="/create_issue/{{ $project->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-12 mb-3">
                <input class=" form-control" type="text" name="issue_title" placeholder="Issue Title" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <textarea name="description" id="description" rows="10" cols="80" placeholder="Enter the issue description">
                    
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
        </div>
        <div class="row ">
            <div class="col-2">
                <div class="dropdown">
                    <div class="input-group mb-3">
                        <select class="form-select" name="issue_category" id="inputGroupSelect02">
                            <option selected value="Bug">Bug</option>
                            <option value="Feature Requirement">Feature Requirement</option>
                            <option value="UI Requirement">UI Requirement</option>
                            <option value="UI Change">UI Change</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <input class=" form-control" type="text" placeholder="Issue Location" name="issue_location" required>
            </div>
            <div class="col-2">
                <input class=" form-control" type="file" name="image" required>
            </div>
            <div class="col-2">
                <input class=" form-control" type="text" placeholder="Video Url" name="url">
            </div>
            <div class="col-2">
                <div class="dropdown">
                    <div class="input-group mb-3">
                        <select class="form-select" name="priority" id="inputGroupSelect02">
                            <option value="High">High</option>
                            <option selected value="Normal">Normal</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <button class="form-control bg-primary text-white" type="submit">Create</button>
            </div>
        </div>
    
    </form>
</div>

@endsection