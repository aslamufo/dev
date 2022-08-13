@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-9">
            <h2>{{ $project->project_name }}</h2>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <form action="/update_pro/{{ $project->id }}" method="post">
            @csrf
            <div class="col-12">
                    <input type="text" name="project_name" value="{{ $project->project_name }}" placeholder="Enter Project Name" required>
            </div>
            <br>
            <div class="col">
                <?php $userss = explode(',',$project->users) ?>
                <h3>Select User Who Can Access This List:</h3><br>
                <div class="row">
                    @foreach ($users as $user)                       
                    @if ($user->role == 'Admin')
                    @else
                    <div class="col-2">
                        <div class="form-check">
                            @if (in_array($user->id,$userss))
                            <input class="form-check-input" name="users[]" type="checkbox" value="{{ $user->id }}" id="" checked>
                            <label class="form-check-label" for="">
                              {{ $user->name }}
                            </label>
                            @else
                            <input class="form-check-input" name="users[]" type="checkbox" value="{{ $user->id }}" id="">
                            <label class="form-check-label" for="">
                              {{ $user->name }}
                            </label>
                            @endif
                        </div>
                    </div>
                    @endif

                    @endforeach
                </div>
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Update Project</button>
        </form>
    </div>
</div>
@endsection
