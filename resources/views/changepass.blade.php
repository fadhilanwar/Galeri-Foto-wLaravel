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
    <title>Sign In(FP) | Picturized</title>
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
  <body class="">
    @include('sweetalert::alert')

    <script src="/assets/demo/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center">
          <div class="col-lg">
            <div class="container container-tight">
              <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="#INI LOGO PICRURIZED" height="36" alt=""></a>
              </div>
              <div class="card card-md">
                <div class="card-body">
                  <h2 style="color: white;" class="h2 text-center mb-4">Reset Password Accounts</h2>
                  <form action="/cpfc" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label style="color: white;" class="form-label">Email registered</label>

                        <input value="{{ $email }}" style="" type="hidden" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com" autocomplete="off "
                        autofocus required>

                        <div class="pb-2 text-white">{{ $email }}</div>

                       <div class="mb-2">
                      <label style="color: white;" class="form-label">
                        Password
                         <span class="form-label-description">
                          <p class="text-white" style="font-size: 12px">*Enter your New password</p>
                        </span>
                      </label>
                      <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control"  placeholder=""  autocomplete="off" required>
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                          </a>
                        </span>
                      </div>
                    </div>
                      @error('email')
                      <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>


                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100">Change Password!</button>
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
