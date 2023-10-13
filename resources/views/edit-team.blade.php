@extends('layouts.team_type.auth')

@section('content')

<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Team Information') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form method="POST" action="{{ route('update-team') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="team-name" class="form-control-label">{{ __('Name') }}</label>
                                <div class="@error('team.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $team->name }}" type="text" placeholder="Name" id="team-name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="team-description" class="form-control-label">{{ __('description') }}</label>
                                <div class="@error('description')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $team->description }}" type="text" placeholder="@example.com" id="team-description" name="description">
                                        @error('description')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection