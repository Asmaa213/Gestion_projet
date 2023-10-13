@extends('layouts.user_type.auth') 
@section('content')
    <div class="container">
        <h1>Create New Task</h1>
        <form action="{{ route('task.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="task-name" class="form-control-label">{{ __('Task Name') }}</label>
                        <input class="form-control" value="" type="text" placeholder="Name" id="task-name" name="label">  
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
                        <label for="members">Select user</label>
                        <select name="user" class="form-control" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end" class="form-control-label">{{ __('End Date') }}</label>
                        <input class="form-control" value="" type="date" placeholder="" id="end" name="enddate">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
@endsection