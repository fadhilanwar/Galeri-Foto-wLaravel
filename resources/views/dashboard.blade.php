<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - Picturized</title>
    <!-- CSS files -->
    <link href="/assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/Bootstrap/css/bootstrap.min.css">
    <link href="/assets/demo/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="/assets/demo/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="/assets/demo/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="/assets/demo/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="/assets/demo/dist/css/demo.min.css?1684106062" rel="stylesheet" />
    {{-- JQUERY --}}
    {{-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
     <script src="{{ asset('jquery-1.11.1.min.js') }}"></script> --}}
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
    {{-- JQUERY --}}
    <style>
        @import url('https://rsms.me/inter/inter.css');

        @font-face {
        font-family: 'Inter';
        src:
        /* url('fonts/Inter-Black.ttf') format('truetype'), */
        /* url('fonts/Inter-Bold.ttf') format('truetype'), */
        /* url('fonts/Inter-ExtraBold.ttf') format('truetype'), */
        /* url('fonts/Inter-ExtraLight.ttf') format('truetype'), */
        /* url('fonts/Inter-Light.ttf') format('truetype'), */
        url('fonts/Inter-Medium.ttf') format('truetype'),
        url('fonts/Inter-Regular.ttf') format('truetype'),
        url('fonts/Inter-SemiBold.ttf') format('truetype'),
        url('fonts/Inter-Thin.ttf') format('truetype'),
        url('fonts/Inter-VariableFont_slnt,wght.ttf') format('truetype');

        font-weight: 900;

    /* Tambahkan format-font lain jika Anda menyertakan format lainnya */
}



        body {
            font-feature-settings: "cv03", "cv04", "cv11";
            /* background: rgb(155, 153, 149); */
            font-family:'Inter', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
;
        }

        .nav-item {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')

    <script src="/assets/demo/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
              <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
          </h1> --}}
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item p-3">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                    aria-label="Open user menu">
                                    @php
                                        $datauser = DB::table('users')
                                            ->where('id', '=', auth()->user()->id)
                                            ->get();
                                    @endphp
                                    @foreach ($datauser as $user)
                                        <span class="avatar avatar-sm"
                                            style="background-image: url('/storage/{{ $user->foto_profile }}')"></span>
                                    @endforeach
                                    <div class="d-none d-xl-block ps-2">
                                        <div>
                                            {{ auth()->user()->nama_lengkap }}
                                        </div>
                                        <div class="mt-1 small text-muted">{{ '@' . auth()->user()->username }}</div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu">
                                    {{-- <a href="#" class="dropdown-item">Status</a> --}}
                                    <a href="/yoursProfile" class="dropdown-item">Profile</a>
                                    {{-- <a href="#" class="dropdown-item">Feedback</a> --}}
                                    <a href="/yoursAccount" class="dropdown-item">Settings</a>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <a onclick="return confirm('Yakin akan keluar?')" href="/logout" class="dropdown-item" style="color: red">
                                            Logout
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/posts">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                    <path
                                        d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                                </svg>
                                <div class="div" style="margin-left: 9px">

                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/myAlbum">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                    <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                    <path
                                        d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zM1 3a1 1 0 0 1 1-1h2v2H1zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3zm-4-2h3v2H2a1 1 0 0 1-1-1zm3-1H1V8h3zm0-3H1V5h3z" />
                                </svg>
                                <div class="div" style="margin-left: 9px">

                                    <span class="nav-link-title">
                                        My Album
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button" aria-expanded="true">
                                <svg id='Search_24' width='24' height='24' viewBox='0 0 24 24'
                                    xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                                    <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />


                                    <g transform="matrix(0.78 0 0 0.78 12 12)">
                                        <path
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255, 255, 255); fill-rule: nonzero; opacity: 1;"
                                            transform=" translate(-13.03, -13.03)"
                                            d="M 10 0.1875 C 4.578125 0.1875 0.1875 4.578125 0.1875 10 C 0.1875 15.421875 4.578125 19.8125 10 19.8125 C 12.289063 19.8125 14.394531 19.003906 16.0625 17.6875 L 16.9375 18.5625 C 16.570313 19.253906 16.699219 20.136719 17.28125 20.71875 L 21.875 25.34375 C 22.589844 26.058594 23.753906 26.058594 24.46875 25.34375 L 25.34375 24.46875 C 26.058594 23.753906 26.058594 22.589844 25.34375 21.875 L 20.71875 17.28125 C 20.132813 16.695313 19.253906 16.59375 18.5625 16.96875 L 17.6875 16.09375 C 19.011719 14.421875 19.8125 12.300781 19.8125 10 C 19.8125 4.578125 15.421875 0.1875 10 0.1875 Z M 10 2 C 14.417969 2 18 5.582031 18 10 C 18 14.417969 14.417969 18 10 18 C 5.582031 18 2 14.417969 2 10 C 2 5.582031 5.582031 2 10 2 Z M 4.9375 7.46875 C 4.421875 8.304688 4.125 9.289063 4.125 10.34375 C 4.125 13.371094 6.566406 15.8125 9.59375 15.8125 C 10.761719 15.8125 11.859375 15.433594 12.75 14.8125 C 12.511719 14.839844 12.246094 14.84375 12 14.84375 C 8.085938 14.84375 4.9375 11.695313 4.9375 7.78125 C 4.9375 7.675781 4.933594 7.574219 4.9375 7.46875 Z"
                                            stroke-linecap="round" />
                                    </g>
                                </svg>
                                <div class="div" style="margin-left: 9px">

                                    <span class="nav-link-title">
                                        Explore
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu show">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="/exploreUsers">
                                            <ol>
                                                Users
                                            </ol>
                                        </a>

                                    </div>
                                </div>
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="/exploreAlbums">
                                            <ol>
                                                Albums
                                            </ol>
                                        </a>

                                    </div>
                                </div>
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="/exploreImages">
                                            <ol>
                                                Image
                                            </ol>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mostLikedAlbum">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2"/>
                                  </svg>
                                <div class="div" style="margin-left: 9px">

                                    <span class="nav-link-title">
                                        Stats
                                    </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- Navbar -->
        {{-- <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none" >
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">


              <div class="nav-item dropdown d-none d-md-flex me-3">


              </div>
            </div>

          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <div>
              <form action="./" method="get" autocomplete="off" novalidate>
                <div class="input-icon">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                  </span>
                  <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                </div>
              </form>
            </div>
          </div>
        </div>
      </header> --}}
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Your Updates
                            </div>
                            <h2 class="page-title">
                                {{ $title }}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">

                                {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report"> --}}
                                <a data-bs-toggle="modal" data-bs-target="#modal-new-album"
                                    class="btn btn-primary d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Create Album
                                </a>
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-toggle="modal"
                                    data-target="#modal-report" aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MODAL --}}
            <div class="modal modal-blur fade" id="modal-new-album" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <form action="/dashboard/album/create" method="post">
                                @csrf
                                <h5 class="modal-title">Create some Album!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Album Name</label>
                                <input type="text" name="nama_album" placeholder="Name for your Album..."
                                    class="form-control">
                                <label>Description(optional)</label>
                                <textarea name="deskripsi" class="form-control"
                                    placeholder="Interesting Side of your Album...                                                                            ex: Some Cool Wallpappers give it a try!"
                                    cols="30" rows="10"></textarea>


                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" type="button" class="btn btn-primary"
                                data-bs-dismiss="modal">Create!</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            {{-- MODAL END --}}
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="page-container">

                        @yield('page-container')


                    </div>


                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            UJIKOMP - Fadhil A. A (Picturized.io)
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Your report name">
                    </div>
                    <label class="form-label">Report type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1"
                                    class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Simple</span>
                                        <span class="d-block text-muted">Provide only basic data needed for the
                                            report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1"
                                    class="form-selectgroup-input">
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Advanced</span>
                                        <span class="d-block text-muted">Insert charts and additional advanced analyses
                                            to be inserted in the report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Report url</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        https://tabler.io/reports/
                                    </span>
                                    <input type="text" class="form-control ps-0" value="report-01"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Visibility</label>
                                <select class="form-select">
                                    <option value="1" selected>Private</option>
                                    <option value="2">Public</option>
                                    <option value="3">Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Client name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Reporting period</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Additional information</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Create new report
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <script>
        //Preview Inmage
        // function previewImage() {

        //     const image = document.querySelector('#image');
        //     const imgPreview = document.querySelector('.img-preview');

        //     imgPreview.style.display = 'block';

        //     const oFReader = new FileReader();
        //     oFReader.readAsDataUrl(image.files[0]);

        //     oFReader.onload = function(oFREvent) {
        //         imgPreview.src = oFREvent.target.result;
        //     }

        // }
        function previewImage(image) {

            var img = image.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#output-image').attr("src", reader.result);
            }
            reader.readAsDataURL(img);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.like-btn').click(function(e) {
                e.preventDefault(); // Menghentikan aksi default dari tombol
                var photoId = $(this).data('photo-id');
                var isLiked = $(this).text().trim() === 'Like';
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/like', // Ganti dengan URL yang sesuai untuk menambahkan like
                    method: 'POST',
                    data: {
                        'photo_id': photoId
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Menambahkan CSRF token ke dalam header
                    },
                    success: function(response) {
                        // Tambahkan logika untuk memperbarui tampilan foto yang telah dilike
                        // var message = isLiked ? 'Kamu Melakukan Like pada Foto ini!' : 'Kamu Tidak Lagi Like pada Foto ini!';
                        alert(response.message);
                        // Alert::toast('Profile Updated!','success');

                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Terjadi kesalahan saat like Foto.');
                    }
                });
            });

            $('.btn-komen').click(function(e) {
                e.preventDefault(); // Menghentikan aksi default dari tombol
                var photoId = $(this).data('photo-id');
                // var photoId = $(this).val();
                // var photoId =  $('#foto_id').val();
                var isi_komentar = $('#isi_komentar' + photoId).val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/komen', // Ganti dengan URL yang sesuai untuk menambahkan like
                    method: 'POST',
                    data: {
                        'foto_id': photoId,
                        'isi_komentar': isi_komentar

                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Menambahkan CSRF token ke dalam header
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();

                    },
                    error: function(xhr, status, error) {
                        // console.error(error);
                        alert('Terjadi kesalahan saat komentar Foto.');
                    }
                });
            });

        });

        function autoFill(id){
            var komenA = document.getElementById("isi_komentarA" + id).value;

            document.getElementById("isi_komentar" + id).value = komenA;
        }

    //     function read() {
    //     $.get("{{ url('isi') }}", {}, function(data, status){

    //         $.get('#read').html(data);

    //     });
    // }


    //     function komentarFoto(foto_id) {

    //         // var isi_komentar = $('#isi_komentar' + foto_id).val();
    //         var isi_komentar = "halo";
    //         $.ajax({
    //             type: "get",
    //             url: "{{ url('komen') }}/" + foto_id,
    //             data: "isi_komentar=" + isi_komentar,
    //             success: function(data) {
    //                 console.log('berhasil cuy');
    //                 read();
    //             }
    //     });

    //     }

    </script>





    <script src="/assets/demo/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    <script src="/assets/demo/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
    <script src="/assets/demo/dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
    <script src="/assets/demo/dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script>
    <!-- Tabler Core -->
    <script src="/assets/demo/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="/assets/demo/dist/js/demo.min.js?1684106062" defer></script>
</body>

</html>
