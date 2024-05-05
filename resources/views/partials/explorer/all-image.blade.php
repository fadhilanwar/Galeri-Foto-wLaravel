@extends('dashboard')
@section('page-container')
<div class="row">
    <div class="card mb-4 rounded-5 ps-4 pe-4 p-2">
        <form action="">
        <div class="form-group d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
                  <input autocomplete="off" type="text" name="searchImage" class="border-none w-100" placeholder="Search an Image..." style="outline: none; border: none;">

                </div>
            </form>
    </div>
</div>
    <div class="row" id="read">

        @if($keyword)
        <div class="d-flex">
            <h3>Search Result for "{{ $keyword }}" {{ $foto->count() }} Image founds!</h3>
            <a href="/exploreImages" class="ms-1 mt-1">Back to Explorer</a>
        </div>
        @endif


        @forelse ($foto as $foto)
            <div class="col-sm-6 col-lg-4">
                <div class="card card-sm mb-3">

                    <a href="#" class="d-block"><img src="{{ asset('storage/public/' . $foto->lokasi_file) }}"
                            height="210px" class="card-img-top"></a>
                            <div class="ps-2 pt-2"><b>{{ $foto->judul_foto }}</b></div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="/exploreUsers/{{ $foto->user_id }}">
                            <span  class="avatar me-3 rounded"
                                style="background-image: url(/storage/{{ $foto->foto_profile }})"></span></a>
                            <div>
                                <div>{{ $foto->username }}</div>
                                <div class="text-muted">{{ $foto->tanggal_unggah }}</div>
                            </div>
                            <div class="ms-auto">
                                <a data-bs-toggle="modal"
                                data-bs-target="#modal-delete{{ $foto->id }}" style="cursor: pointer" class="text-muted">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path
                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                    <div class="modal modal-lg modal-blur fade" id="modal-delete{{ $foto->id }}" tabindex="-1" role="dialog"
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
                                                    {{-- <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modal-info{{ $foto->id }}" class="btn me-auto float-end"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                                      </svg></button> --}}


                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                                    {{-- @if($foto->user_id == auth()->user()->id)


                                                    <form action="/yourAlbum/deletePhoto/{{ $foto->id }}" method="post">
                                                        @csrf
                                                    <button onclick="return confirm('Hapus Foto ini?')" type="submit" class="btn btn-danger mb-3">
                                                    Delete Photo
                                                    </button>
                                                    </form>
                                                    @endif --}}


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Untuk Preview --}}
                                </a>



                                @php
                                    $userLiked = DB::table('like_foto')
                                        ->where('foto_id', '=', $foto->id)
                                        ->where('user_id', '=', auth()->user()->id)
                                        ->get();

                                    $photoLike = DB::table('like_foto')
                                                    ->where('foto_id', $foto->id)
                                                    ->get()
                                @endphp

                                @forelse($userLiked as $like)
                                    {{-- Button Red --}}
                                    <svg style="cursor: pointer;" class="like-btn" id="btn-like"
                                        data-photo-id="{{ $foto->id }}" xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-filled text-red" width="24" height="24" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="none" fill="red" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>{{ $photoLike->count() }}
                                @empty
                                    {{-- Button Biasa --}}
                                    <svg style="cursor: pointer;" class="like-btn" id="btn-like"
                                        data-photo-id="{{ $foto->id }}" xmlns="http://www.w3.org/2000/svg"
                                        class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>{{ $photoLike->count() }}
                                @endforelse


                            </div>

                        </div>
                        <div class="float-end">
                            <a href="/seepost/{{ $foto->id }}">See Post</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="row">

                <center>
                    <h3>
                        Nobody Uploaded it !
                    </h3>
                </center>
            </div>
        @endforelse

    </div>
@endsection
