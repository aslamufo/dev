{{-- <div wire:poll>
    {{ now() }}
</div> --}}
<div>
    {{-- @if (session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        <strong> {{ session('success') }}</strong>
    </div>
    @endif --}}
    @foreach ($project as $project)
    <div class="container" style="height:30%">
        <div class="row">
            <div class="col-9">
                <h2>{{ $project->project_name }}</h2><br>
            </div>
            @if (Auth::User()->role == 'Admin')
            <div class="col-3 d-flex justify-content-end">
                <a href="/create_issue/{{ $project->id }}"><button type="button" class="btn btn-primary">Create New
                        Issue
                        &nbsp;<b>+</b></button></a>
            </div>
            @endif
        </div>
    </div>
    <hr>
    <style>
        .header {
            position: sticky;
            top: 0;
            background-color: white;
        }

        .bottom {
            position: sticky;
            bottom: 0;
            background-color: white;
            scroll: none
        }
    </style>

    <div class="m-0" style="overflow:scroll; height:78vh; overflow-x: hidden;">
        <div class="accordion" id="accordionExample">
            @foreach ($issues as $issue)
            <div class="accordion-item shadow">
                <h2 class="accordion-header" id="headingOne">
                    <div class="row d-flex align-items-center">
                        <div class="col-10">
                            <div class="accordion-button  @if ($issue->ufo_status == 'Pending') {{ 'bg-danger text-white' }} @elseif($issue->ufo_status == 'Testing') {{ 'bg-success text-white' }}  @else   {{ 'bg-secondary text-white' }} @endif"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $issue->id }}"
                                aria-expanded="true" aria-controls="collapseOne" style="width: 100%">
                                <div class="col-11">
                                    {{ $issue->issue_title }}
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            @if (Auth::User()->role == 'Admin')
                            <a href="/edit_issue/{{ $issue->id }}/{{ $project->id }}"><button type="button"
                                    class="btn btn-sm btn-primary">Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" wire:click="delete_bug({{ $issue->id }})"
                                class="btn btn-sm btn-danger">Delete</button>
                            @else
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop{{ $issue->id }}">Add/Edit Remark</button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{ $issue->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <form wire:submit.prevent="saveRemark('{{ $issue->id }}')">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{{ $issue->issue_title
                                                    }}</h5>
                                                <button type="button" style="font-size: 20px;" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input class=" form-control" style="font-size:20px;" type="text"
                                                    value="{{ $issue->dev_remark }}"
                                                    placeholder="{{ $issue->dev_remark }}" wire:model.lazy="dev_remark">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Accordion Item #1
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                    </div> --}}
                </h2>
                <div id="collapseOne{{ $issue->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <a  href="/{{ $issue->image }}" target="_blank">
                                <img src="/{{ $issue->image }}" alt="" width="100%" height="auto"></a>
                            </div>
                            <div class="col-9">
                                <?php echo $issue->description; ?>
                                <p><b>Video URL:</b> {{ $issue->url }}</p>
                                <b>Dev Remark:</b> {{ $issue->dev_remark }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-footer">
                    <div class="row p-3">
                        <div class="col-3 d-flex justify-content-start">
                            {{--
                            <livewire:buglist :issueid="$issue->id" /> {{ $issue->ufo_status }} --}}
                            <div>
                                <b>UFO Status:</b>
                                @if (Auth::User()->role == 'Admin')
                                <select class="form-control-sm" aria-label="Default select example" name="ufo_status"
                                    wire:change="changeEvent($event.target.value,{{ $issue->id }})">
                                    <option value="">Choose status</option>
                                    <option value="Pending" @if ($issue->ufo_status == 'Pending') {{ 'selected' }}
                                        @endif>
                                        Pending</option>
                                    <option value="Testing" @if ($issue->ufo_status == 'Testing') {{ 'selected' }}
                                        @endif>
                                        Testing</option>
                                    <option value="Closed" @if ($issue->ufo_status == 'Closed') {{ 'selected' }}
                                        @endif>Closed
                                    </option>
                                </select>
                                @else
                                {{ $issue->ufo_status }}
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <b>Dev Status: </b>@if (Auth::User()->role == 'Admin'){{ $issue->dev_status }}
                            @else
                            <select class="form-control-sm" aria-label="Default select example" name="ufo_status"
                                wire:change="change_dev_status($event.target.value,{{ $issue->id }})">
                                <option value="">Choose status</option>
                                <option value="Working on it" @if ($issue->dev_status == 'Working on it') {{ 'selected' }}
                                    @endif>
                                    Working on it</option>
                                <option value="Completed" @if ($issue->dev_status == 'Completed') {{ 'selected' }}
                                    @endif>
                                    Completed</option>
                            </select>
                            @endif
                        </div>
                        <div class="col-2">
                            <b>Location:</b> {{ $issue->issue_location }}
                        </div>
                        <div class="col-4">
                            <b>Delivery Date: </b>@if (Auth::User()->role == 'Admin') {{ $issue->delivery_date }}
                            @else
                                <input type="date"  wire:change="change_dev_date('{{ $issue->id }}',$event.target.value)" value="{{ $issue->delivery_date }}">
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <br>
            @endforeach
            {{ $issues->links() }}
        </div>

    </div>
    @endforeach
</div>