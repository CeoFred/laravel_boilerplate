@extends('layout')


@section('content')

<h1>Log in</h1>
<hr/>
<form method="POST" action="/login">

{{ csrf_field() }}
  <div class="form-group">
    <label for="title">Email</label>
    <input type="email" class="form-control" id="title" name="email">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
      </div>


  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

@endsection



