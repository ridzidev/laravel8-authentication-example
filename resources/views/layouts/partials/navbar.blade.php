<header class="bg-white shadow-sm">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between py-2">
      <a href="/" class="d-flex align-items-center text-decoration-none">
        <img id="myImage" src="{{ asset('images/logopl.png') }}" alt="Primaginary Learning" width="200">
      </a>

      
      @auth
        {{ auth()->user()->name }}
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-light me-2">Sign Out</a>
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-primary me-2">Sign In</a>
          <a href="{{ route('register.perform') }}" class="btn btn-light">Join Now</a>
        </div>
      @endguest
    </div>
  </div>
</header>
