@extends('layouts.user_type.auth') 
@section('content')
    <div class="container">
        <h1>Create New Team</h1>
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="team-name" class="form-control-label">{{ __('Team Name') }}</label>
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
                        <label for="members">Select Members</label>
                        <select name="users[]" class="form-control" multiple required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Team</button>
        </form>
    </div>
@endsection
