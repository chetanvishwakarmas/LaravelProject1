<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin.dashboard') }}">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.logout') }}">Login/Logout</a>
        <!-- <a class="nav-link" href="logout.html">Logout</a> -->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.html">Profile</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid mt-3">
  <h3>Admin Dashboard Page</h3>
  <p>page</p>
  <p>The navbar.</p>
</div>

</body>
</html>
