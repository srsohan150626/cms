@extends('layouts.app')

@section('title','Users')
@section('content')
<div class="card card-default">
  <div class="card card-header">
    Users
  </div>
  <div class="card-body">
    @if($users->count()>0)
    <table class="table">
      <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>
            <img width="40px" height="40px" style="border-radios:50%" src="{{Gravatar::src($user->email)}}" alt="">
          </td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            @if(!$user->isAdmin())
              <form action="{{route('users.make-admin',$user->id)}}" method="post">
                @csrf
                <button type="submit" class="form-control btn-success btn-sm">Make Admin</button>
              </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h2 class="text-center">No User Yet!</h2>
    @endif

  </div>

</div>
@endsection
