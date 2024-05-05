@extends('dashboard')
@section('page-container')
    @foreach ($datauser as $user)
        <div class="row">
            <div class="card" style="background: #eee;  ">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">

                            <center>
                                <div class="image" style="padding: 20px">
                                    @if (auth()->user()->foto_profile)
                                        <img src="{{ asset('storage/' . $user->foto_profile) }}" width="250px"
                                            height="250px" class="rounded rounded-circle" alt="">
                                    @else
                                        <img src="PP-Default.jpg" class="rounded rounded-circle" width="250px"
                                            height="250px" alt="">
                                    @endif
                                </div>

                                <button class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#modal-simple">
                                    Change Photo
                                </button><br>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-change-password">Ganti
                                    Password</a>

                            </center>

                        </div>
                        <div class="col-md-8">
                            <form action="yoursAccount/update" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Username</label>
                                            <div class="input-group mb-2 d-flex">
                                                <span class="input-group-text">
                                                    @
                                                </span>
                                                <input type="text" value="{{ $user->username }}" name="username"
                                                    class="form-control" placeholder="username" autocomplete="off">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email Address</label>
                                            <div class="input-group mb-2 d-flex">
                                                <span class="input-group-text">
                                                    @gmail
                                                </span>
                                                <input type="text" value="{{ $user->email }}" name="email"
                                                    class="form-control" placeholder="username" autocomplete="off">


                                            </div>

                                            <div class="mb-3">

                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label for="">Full Name</label>
                                            <input type="text" value="{{ $user->nama_lengkap }}" name="nama_lengkap"
                                                class="form-control mb-3">
                                            <label for="">Contact</label>
                                            <input type="text" value="{{ $user->no_tlp }}" name="no_tlp"
                                                class="form-control mb-3">
                                            <label for="">Address</label>
                                            <textarea class="form-control mb-3" name="bio" id="" cols="20" rows="5">{{ $user->bio }}</textarea>
                                            <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <a class="btn btn-secondary" href="/yoursProfile">
                                Back
                            </a>

                        </div>
                    </div>



                </div>
            </div>
        </div>

        </div>
        </div>

        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <form action="/changeProfilePhoto" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="modal-title">Change Profile Photo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="oldPic" value="{{ $user->foto_profile }}" name="username"
                            class="form-control mb-3">
                        <input class="form-control" type="file" name="foto_profile">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="submit" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save
                            changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-blur fade" id="modal-change-password" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <form action="/yoursAccount/updatePassword" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="modal-title">Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Masukan Password Baru</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="submit" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save
                            changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
