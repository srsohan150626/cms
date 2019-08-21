@extends('layouts.app')

@section('content')

<div class="card">
  @include('partial.error')
      <div class="card-header">My Profile</div>

      <div class="card-body">

        <form action="{{route('users.update.profile')}}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label for="about">About Me</label>
            <textarea name="about" id="about" rows="5" cols="5" class="form-control">
              {{$user->about}}
            </textarea>
            <button type="submit" class="btn btn-success my-3">Update Profile</button>
          </div>
        </form>
      </div>

      </div>
@endsection
