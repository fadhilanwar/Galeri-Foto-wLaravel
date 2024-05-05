<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign In | Picturized</title>
    <!-- CSS files -->
    <link href="/assets/demo/dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
    <link href="/assets/demo/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
    <link href="/assets/demo/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
    <link href="/assets/demo/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link href="/assets/demo/dist/css/demo.min.css?1684106062" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
        background-image: url('constellations-1851128.jpg');
        background-size: cover;
        filter: brightness(0.90);
      }

      .card{
        background-color: rgba(255, 255, 255, 0.007);
        /* color: white; */
        font-size: 15px;

        backdrop-filter: blur(0.5px);
      }

      input{




      }

      a{
        color: white;
      }


    </style>
  </head>
  <body class="d-flex flex-column">
    @include('sweetalert::alert')

    <script src="/assets/demo/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center">
          <div class="col-lg">
            <div class="container-tight">
              <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="#INI LOGO PICRURIZED" height="36" alt=""></a>
              </div>
              <div class="card card-md">
                <div class="card-body">
                  <h2 style="color: white;" class="h2 text-center mb-4">Login to Picturized.io</h2>
                  <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label style="color: white;" class="form-label">Email address</label>
                      <input style="" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com" autocomplete="off "
                       autofocus required value="{{ old('email') }}">
                      @error('email')
                      <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="mb-2">
                      <label style="color: white;" class="form-label">
                        Password
                          <span class="form-label-description">
                          <a href="/fp">I forgot password</a>
                        </span>
                      </label>
                      <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control"  placeholder=""  autocomplete="off" required>

                      </div>
                    </div>

                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100">SIGN IN</button>
                    </div>
                  </form>
                  @if(session()->has('loginError'))
                        <div class="alert mt-5 bg-danger text-light alert-dismissible fade show">
                       {{Session('loginError')}}
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                  @endif
                </div>
                <div class="hr-text">or</div>
                <div class="card-body">

                    <div class="text-center text-white mt-3 text-white">
                      Don't have account yet? <a href="/register" class="text-blue" tabindex="-1">Sign up</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-lg d-none d-lg-block">
            <img src="pexels-pixabay-33109.j" height="300" class="d-block mx-auto" alt="">
          </div> -->
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="/assets/demo/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="/assets/demo/dist/js/demo.min.js?1684106062" defer></script>
  </body>
</html>
