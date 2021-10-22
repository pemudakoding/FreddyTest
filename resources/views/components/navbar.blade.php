<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container ">
    <a class="navbar-brand" href="#">Freddy Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('dashboard.index') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard.product.index') }}">Products</a>
        </li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="post" id="logout-form">
            @csrf
          </form>
          <a class="nav-link text-danger" href="javascript:void(0)"
            onclick="document.querySelector('#logout-form').submit()">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
