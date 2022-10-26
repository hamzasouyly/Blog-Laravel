<nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('categories.index') }}">Category</a>
        </li>
        
        @if (auth()->check())
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('post.create') }}">Add</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('categories.create') }}">Add Category</a>
        </li>

          
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile.show') }}"> {{ auth()->user()->name }}</a>
        </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/register') }}">register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/login') }}">login</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href=""><i class="fas fa-shopping-cart"></i>0</a>
      </li>
        @endif
      </ul>
    </div>
  </nav>