

<html lang="en">
  <x-header title="Login"/>

  <body style="background-color: #343957">
    <div class="unix-login">
      <div class="container-fluid">
        <div
          class="row justify-content-center align-items-center"
          style="min-height: 100vh"
        >
          <div class="col-lg-5">
            <div class="login-content">
              <div class="login-logo">
                <a href="index.html"><span>KNIT</span></a>
              </div>
              <div class="login-form">
                <h4>Admin Login</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                  <div class="form-group">
                    <label>Email address</label>
                    <input
                      id ="email"
                      type="email"
                      class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                      placeholder="Email"
                    />
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  <div class="checkbox">
                      
                    <label> <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me </label>
                  </div>
                   <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                    @endif
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
