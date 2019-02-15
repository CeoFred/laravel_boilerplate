@extends('layout')


@section('content')

<h1>Register</h1>
<hr/>
<form method="POST" action="/register">

{{ csrf_field() }}
      <div class="form-group">
    <label for="fullname">Full name</label>
    <input type="text" class="form-control" id="fullname" name="name">
      </div>

  <div class="form-group">
    <label for="title">Email</label>
    <input type="email" class="form-control" id="title" name="email">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
      </div>


  <div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password"  class="form-control" id="password_confirmation" name="password_confirmation">
      </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form>

@endsection



