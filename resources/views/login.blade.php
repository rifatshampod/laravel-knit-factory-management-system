<!DOCTYPE html>
<html lang="en">
  <x-header/>

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
                <form>
                  <div class="form-group">
                    <label>Email address</label>
                    <input
                      type="email"
                      class="form-control"
                      placeholder="Email"
                    />
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input
                      type="password"
                      class="form-control"
                      placeholder="Password"
                    />
                  </div>
                  <div class="checkbox">
                    <label> <input type="checkbox" /> Remember Me </label>
                    <label class="pull-right">
                      <a href="forget-password.html">Forgotten Password?</a>
                    </label>
                  </div>
                  <button
                    type="submit"
                    class="btn btn-primary btn-flat m-b-30 m-t-30"
                  >
                    Sign in
                  </button>
                  <div class="register-link m-t-15 text-center">
                    <p>
                      Don't have account ?
                      <a href="signup.html"> Sign Up Here</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
