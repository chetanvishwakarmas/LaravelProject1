<!DOCTYPE html>
<html lang="en">
<head>
  <title>Larvel10 Crud-Login </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <h2>Login </h2>
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('success') }}
    </div>
    @endif
    
    <form action="{{ route('loginSubmit') }}" method="POST" >
      @csrf
      <div class="mb-3 mt-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" >
        @if ($errors->has('email'))
          {{ $errors->first('email') }}
        @endif
      </div>
      <div class="mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ old('password') }}" >
        @if ($errors->has('password'))
        {{ $errors->first('password') }}
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="home.html" class="btn btn-primary">Cancel</a>
    </form>
</div>

</body>
</html>
