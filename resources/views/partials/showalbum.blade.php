@extends('dashboard')
@section('page-container')
<style>
 



    .the-text{
        position: absolute;
        justify-content: center;
        align-items: center;
        /* z-index: 999; */
        /* padding: 100px; */
        /* top: 10px;
        left: 30px; */
        /* display: flex; */
        padding: 10px;
        color: white;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 10px;
      
        /* display: none; */
    }
</style>
    <div class="row">
        <div class="card p-5">
            <div class="row">

                <div class="row">
                    <div class="col-md-10">
                        <h1 style="font-size: 60px">
                            {{ $users->nama_album }}
                        </h1><br>
                        <h4>
                            {{ $users->deskripsi }}
                        </h4>
                    </div>
                    <div class="col-md-2">
                        @php
                            $datauser = DB::table('users')
                                ->where('id', '=', $id)
                                ->get();
                        @endphp

                        <div class="row float-end w-100">
                            <div class="col-md-3">
                                <span class="avatar avatar-sm"
                                    style="background-image: url('/storage/{{ $users->foto_profile }}')"></span>
                            </div>
                            <div class="col-md-9">
                                {{ $users->nama_lengkap }}
                                <div style="font-size: 13px">
                                    {{ '@' . $users->username }}
                                </div>
                            </div>



                        </div>


                    </div>
                </div>


                <div class="row" style="position: absolute; top: 90px;">
                    <div class="col-md-7"></div>
                    <div class="col-md-2">
                </div>



                <div class="col-md-3 d-flex justify-content-center">
                    @if($users->user_id == auth()->user()->id)

                    <button data-bs-toggle="modal" data-bs-target="#modal-add-photo" class="btn">
                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                          </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z"/>
                          </svg>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#modal-set-album-{{ $albumData->id }}" class="btn btn-purple ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                          </svg></button>


                    <div class="modal modal-blur fade" id="modal-set-album-{{ $albumData->id }}" tabindex="1000" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Album Information</b></h5>
                                    {{-- <input type="hidden" name="imagePath" value="{{ $users->lokasi_file }}"> --}}
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/yourAlbum/{{ $albumData->id }}/update" method="post">
                                        @csrf

                                <div class="form-group mb-3">
                                    <label>Nama Album</label>
                                    <input type="text" value="{{ $albumData->nama_album }}" name="nama_album" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Deksripsi</label>
                                    <textarea name="deskripsi" class="form-control" cols="30" rows="10">{{ $albumData->deskripsi }}</textarea>
                                </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Change Info</button>
                                    </form>
                                    <form action="/yourAlbum/{{ $albumData->id }}/delete" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $albumData->nama_album }}" name="nama_album" class="form-control">
                                        <input type="hidden" name="deskripsi" class="form-control">

                                    <button type="submit" onclick="return confirm('Hapus Album ini?')" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journal-x" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708"/>
                                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                          </svg>
                                    </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal modal-blur fade" id="modal-small" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="modal-title">Are you sure?</div>
                              <div>If you proceed, you will lose all your personal data.</div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif

                </div>
            </div>

            <hr>




                @forelse ($foto as $foto)

                @php
                     $photoLike = DB::table('like_foto')
                            ->where('foto_id', $foto->id)
                            ->get()
                @endphp

                    <div class="col-md-4 foto-hover">
                        <div class="the-text">
                            <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-filled text-red" width="24" height="24" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="grey" fill="black" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg><br>
                                    <div class="ms-1" style="font-size: 13px;">
                              {{ $photoLike->count() }}
                                    </div>
                        </div>
                            <a href="{{ $foto->id }}" data-bs-toggle="modal"
                                data-bs-target="#modal-delete{{ $foto->id }}">
                                <img class="img-fluid mb-3" width="95%" style="border-radius: 10px" class="img-fluid"
                                src="{{ asset('storage/public/' . $foto->lokasi_file) }}" alt="{{ $foto->lokasi_file }}">
                            </a>
                    </div>
                    <div class="modal modal-blur fade" id="modal-delete{{ $foto->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $foto->judul_foto }}</h5>

                                    <input type="hidden" name="imagePath" value="{{ $foto->lokasi_file }}">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <input type="hidden" class="form-control txt" name="album_id"
                                        value="{{ $foto->id }}">


                                    <img src="{{ asset('storage/public/' . $foto->lokasi_file) }}" width="100%"
                                        alt="">
                                    <p>
                                    <h3>
                                        {{ $foto->deskripsi }}
                                    </h3>
                                    </p>
                                    <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#modal-info{{ $foto->id }}" class="btn me-auto float-end"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                      </svg></button>


                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                    <form action="/yourAlbum/deletePhoto/{{ $foto->id }}" method="post">
                                        @csrf
                                    <button onclick="return confirm('Hapus Foto ini?')" type="submit" class="btn btn-danger mb-3">
                                    Delete Photo
                                    </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal modal-blur fade" id="modal-info{{ $foto->id }}" tabindex="1000" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Image Information</b></h5>
                                    {{-- <input type="hidden" name="imagePath" value="{{ $users->lokasi_file }}"> --}}
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/yourAlbum/{{ $foto->id }}/editImageInfo" method="post">
                                        @csrf

                                <div class="form-group mb-3">
                                    <label>Judul Foto</label>
                                    <input type="text" value="{{ $foto->judul_foto }}" name="judul_foto" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Deksripsi</label>
                                    <textarea name="deskripsi" class="form-control" cols="30" rows="10">{{ $foto->deskripsi }}</textarea>
                                </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success mb-3">Change Info</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <center>
                        <h3>
                            This Album Empty...
                        </h3>
                    </center>
                @endforelse

            </div>
        </div>

    </div>
    </div>

    <div class="modal modal-blur fade" id="modal-add-photo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Photo to <b style="font-weight: 900">{{ $users->nama_album }}</b></h5>
                    {{-- <input type="hidden" name="imagePath" value="{{ $users->lokasi_file }}"> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/yourAlbum/editAlbum" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" class="form-control txt" name="album_id" value="{{ $users->id }}">


                        <label for="">Judul Foto</label>
                        <input class="form-control mb-2" type="text" name="judul_foto"
                            placeholder="Give your Photo a Cool Name...">

                        <label for="">Deskripsi</label>
                        <textarea class="form-control txt mb-2" name="deskripsi" cols="15" rows="5"
                            placeholder="Maybe you wanna Describe it...?"></textarea>
                        <label for="">Tambahkan Foto</label>
                        <div class="fallback">
                            <input onchange="previewImage(this)" id="image" type="file" name="foto"
                                class="form-control mb-3" required>
                        </div>
                        Previews
                        <img class="img-preview rounded rounded-3" id="output-image">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success mb-3">Simpan Foto</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
