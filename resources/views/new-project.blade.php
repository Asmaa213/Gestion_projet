@extends('layouts.user_type.auth') 
@section('content')
    <div class="container">
        <h1>Create New Project</h1>
        <form action="{{ route('project.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="team-name" class="form-control-label">{{ __('Project Name') }}</label>
                        <input class="form-control" value="" type="text" placeholder="Name" id="team-name" name="name">  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description" class="form-control-label">{{ __('Description') }}</label>
                        <input class="form-control" value="" type="text" placeholder="" id="description" name="description">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status" class="form-control-label">{{ __('Status') }}</label>
                        <input class="form-control" value="" type="text" placeholder="" id="status" name="status">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start" class="form-control-label">{{ __('Start Date') }}</label>
                        <input class="form-control" value="" type="date" placeholder="" id="start" name="startdate">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end" class="form-control-label">{{ __('End Date') }}</label>
                        <input class="form-control" value="" type="date" placeholder="" id="end" name="enddate">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="members">Select Team</label>
                        <select name="team" class="form-control" required>
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Project</button>
        </form>
    </div>
@endsection
