@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-9">
            <h2>Create New Project</h2>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <form action="/create_pro" method="post">
            @csrf
            <div class="col-12">
                <input type="text" name="project_name" placeholder="Enter Project Name" required>
            </div>
            <br>
            <div class="col">
                <h3>Select User Who Can Access This List:</h3><br>
                <div class="row">
                    @foreach ($users as $user)
                    @if ($user->role == 'Admin')
                    @else
                    <div class="col-2">
                        <div class="form-check">
                            <input id="users"  class="form-check-input "
                                name="users[]" type="checkbox" value="{{ $user->id }}">
                            <label class="form-check-label" for="users">
                                {{ $user->name }}
                            </label>
                            
                        </div>
                    </div>
                    @endif

                    @endforeach
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                </div>
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Create Project</button>
        </form>
    </div>
</div>
@endsection