<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Shopping Cart</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/cart"><i class="fa fa-shopping-cart"></i> Shopping Cart 
          <span class="badge badge-info">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">Shop</a></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> User Account</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @if(!Auth::check())
          <a class="dropdown-item" href="/login">Login</a>
          <a class="dropdown-item" href="/register">Register</a>
          @else
          <a class="dropdown-item" href="/logout">Logout</a>
          <a class="dropdown-item" href="/profile">Profile</a>
          @endif
        </div>
      </li>
    </ul>
  </div>
</nav>