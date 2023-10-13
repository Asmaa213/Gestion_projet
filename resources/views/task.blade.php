@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="row">
      <div class="col-12">
          <div class="card mb-4 mx-4">
              <div class="card-header pb-0">
                  <div class="d-flex flex-row justify-content-between">
                      <div>
                          <h5 class="mb-0">All Tasks</h5>
                      </div>
                      <a href="{{ route('new-task') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Task</a>
                  </div>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                          <thead>
                              <tr>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Name
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Description
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Status
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Assigned to
                                 </th>
                                 <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                  End Date
                                 </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($tasks as $task)
                              <tr>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">{{ $task->label }}</p>
                                  </td>
                                  <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $task->description }}</p>
                                  </td>
                                  <td class="text-center">
                                      <span class="text-secondary text-xs font-weight-bold">{{ $task->status }}</span>
                                  </td>
                                  <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $task->user->name }}</span>
                                  </td>
                                  <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $task->enddate }}</span>
                                  </td>
                                  <td class="text-center">
                                      <form action="{{ route('suppression_task', $task->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" style="border: none; background:none;"><span>
                                              <i class="cursor-pointer fas fa-trash text-secondary "></i>
                                          </span></button>
                                      </form>
                                      
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </main>
  
@endsection