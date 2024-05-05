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
    <title>Sign up - Create | Picturized</title>
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
        background-image: url('earth-1756274.jpg');
        background-size: cover;
        filter: brightness(0.90);
      }

      .card{
        background-color: rgba(255, 255, 255, 0.068);
        /* color: white; */
        backdrop-filter: blur(0.5px);
      }

     input{
        color: black;

      }

      a{
        color: white;
      }

    </style>
    
  </head>
  <body  class=" d-flex flex-column">
    <script src="/assets/demo/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md" enctype="multipart/form-data" action="/register" method="post" autocomplete="off">
            @csrf
          <div class="card-body">
            <h2 style="color: white;" class="card-title text-center mb-4">Create new Account!</h2>
            <div class="mb-3">
              <label style="color: white;" class="form-label">Username</label>
              <div class="input-group mb-2">
                <span class="input-group-text">
                  @
                </span>
                <input  type="text" name="username" class="form-control"  placeholder="username"  autocomplete="off">
              </div>
            </div>
            <div class="mb-3">
              <label style="color: grey;" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter @email" required>
            </div>
            <div class="mb-3">
              <label style="color: white;" class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" class="form-control"  placeholder="Password"  autocomplete="off" required>
               
              </div>
            </div>

            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Create new account</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Already have account? <a href="/login" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="/assets/demo/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="/assets/demo/dist/js/demo.min.js?1684106062" defer></script>
  </body>
</html>
