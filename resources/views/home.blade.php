@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-9">
            <h2>UFO BUG TRACKING SYSTEM</h2>
        </div>
        @if (Auth::User()->role == 'Admin')
        <div class="col-3 d-flex justify-content-end">
            <a href="/create_project"><button type="button" class="btn btn-primary">Create New Project
                    &nbsp;<b>+</b></button></a>
        </div>
        @endif
    </div>
    <br><br>
    <div class="row justify-content-start">
        <?php $i=0;?>
        @foreach ($projects as $project)
            
        <div class=" col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class=" d-flex justify-content-end">
                        @if (Auth::User()->role == 'Admin')                           
                        
                        <a href="/edit_project/{{ $project->id }}" style="color: rgb(64, 137, 247);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                        </a>
                        &nbsp;
                        &nbsp;
                        &nbsp;

                        <a href="#" style="color: red;" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop{{ $project->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </a>

                        {{--------------------------------------------------------------------------------------------------------------}}

                                           

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete {{ $project->project_name }} !!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <a href="/delete_pro/{{ $project->id }}"><button type="button" class="btn btn-primary">Yes</button></a>    
                                    </div>
                                </div>
                            </div>
                        </div>



                        {{--------------------------------------------------------------------------------------------------------------}}
                        @endif

                    </div>
                    <h4 class="card-title"><a href="/bug_reports/{{ $project->id }}" style="text-decoration: none;">{{
                            $project->project_name }}</a></h4>
                    <div class="row">
                        <div class="col-6">
                            <p class="card-text">Total: {{ $total[$i] }} </p>
                        </div>
                        <div class="col-6">
                            <p class="card-text">Open: {{ $pending[$i] }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $i++?>
        @endforeach
    </div>
</div>
@endsection