@extends('dashboard')
@section('page-container')
    <div class="row" >
        <div class="card">

            @foreach ($seeposts as $see)
            <div class="row p-1">
                <div class="col-md-7 mb-2 p-2" style="border-radius: 20px; border: 0.5px solid rgb(163, 163, 163)">
                    <img src="{{ asset('storage/public/' . $see->lokasi_file) }}" width="100%" height="550px" style="max-height: 550px; object-fit: cover; object-position: center;"
                        alt="" style="border-radius: 10px;">
                    <div class="ms-auto p-3 position-absolute">
                        <h2>
                            {{ $see->judul_foto }}
                        </h2>
                    </div>
                    <div class="ms-auto float-end p-3">
                        @php
                        $userLiked = DB::table('like_foto')
                            ->where('foto_id', '=', $see->id)
                            ->where('user_id', '=', auth()->user()->id)
                            ->get();

                        $photoLike = DB::table('like_foto')
                            ->where('foto_id', $see->id)
                            ->get();

                        $photoComments = DB::table('komentar_foto')
                            ->where('foto_id', $see->id)
                            ->get();
                    @endphp




                    @forelse($userLiked as $like)
                        {{-- Button Red --}}
                        <svg style="cursor: pointer;" class="like-btn" id="btn-like"
                            data-photo-id="{{ $see->id }}" xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-filled text-red" width="30" height="30" viewBox="0 0 24 24"
                            stroke-width="2" stroke="none" fill="red" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                       {{ $photoLike->count() }}
                    @empty
                        {{-- Button Biasa --}}
                        <svg style="cursor: pointer;" class="like-btn" id="btn-like"
                            data-photo-id="{{ $see->id }}" xmlns="http://www.w3.org/2000/svg"
                            class="icon" width="28" height="28" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        {{ $photoLike->count() }}

                    @endforelse
                        <a href="#" class="ms-3 text-muted">

                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black"
                                class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                <path
                                    d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                            </svg>
                        </a>

                    </div>
                </div>
                <div class="col-md-5 position-relative">
                    <div class="row p-3">
                        <div class="col-sm-2"><span class="avatar me-6 rounded"
                                style="background-image: url(/storage/{{ $see->foto_profile }})"></span>
                        </div>
                        <div class="col-sm-7"><b>{{ $see->nama_lengkap }}</b><br>
                            <p class="text-muted"> {{ '@' . $see->username }}</p>
                        </div>
                        <div class="col-md-3">{{ $see->tanggal_unggah }}</div>
                        {{ $see->deskripsi }}
                    </div>
                    <div class="row" style="overflow-y: auto; max-height: 466px">

                            <h3>
                                Comments({{ $photoComments->count() }})
                            </h3>

                            @php
                      $comments = DB::table('komentar_foto')
                        ->join('foto', 'foto.id', '=', 'komentar_foto.foto_id')
                        ->join('users', 'komentar_foto.user_id', '=', 'users.id')
                        ->where('foto.id', $see->id)
                        ->select('komentar_foto.id','komentar_foto.user_id', 'komentar_foto.isi_komentar','komentar_foto.created_at', 'users.username', 'users.nama_lengkap', 'users.foto_profile')
                        ->get();
                            @endphp

                            @forelse ($comments as $comment)
                                {{-- Looping Commentar Disini --}}
                                <div class="col-md-2 mb-3">
                                    <img class="rounded rounded-circle" src="{{ asset('storage/' . $comment->foto_profile) }}" width="50px" height="50px"
                                        alt="">
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <b>{{ '@' . $comment->username }}</b>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="coment-date float-end" style="font-size: 12px;">
                                                {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{ $comment->isi_komentar }}
                                    </div>
                                    @if($comment->user_id == auth()->user()->id)
                                    <form action="/deleteKomen/{{ $comment->id }}" method="post">
                                        @csrf
                                        <button type="submit" style="background: white; border: none; outline: none;">
                                            <div class="text-red">
                                                Delete
                                            </div>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                {{-- END Looping Commentar --}}
                            @empty
                                <center><h4 class="text-muted">No Comments...</h4></center>
                            @endforelse



                            <div class="row position-absolute ms-auto p-3 bg-white" style="bottom: 4px; border:  0px solid rgb(163, 163, 163); border-radius: 15px">
                                <div class="col-md-10">
                                    {{-- <input type="hidden" value="{{ $post->id }}" id="foto_id"> --}}
                                    <input data-photo-id="{{ $see->id }}" id="isi_komentar{{ $see->id }}" type="text"
                                        style="border: 0px solid rgb(163, 163, 163); outline: none;width: 100%; height: 100%;" placeholder="Write a comments..."
                                        class="form-control">
                                </div>
                                <div class="col-sm-2"><button data-photo-id="{{ $see->id }}"
                                        class="btn btn-secondary btn-komen">Send</button></div>
                            </div>




                    </div>


                </div>
            </div>

        @endforeach



            {{-- END LOOP --}}

            @foreach ($posts as $post)
                <div class="row p-1">
                    <div class="col-md-7 mb-2 p-2" style="border-radius: 20px; border: 0.5px solid rgb(163, 163, 163)">
                        <img src="{{ asset('storage/public/' . $post->lokasi_file) }}" width="100%" height="550px" style="max-height: 550px; object-fit: cover; object-position: center;"
                            alt="" style="border-radius: 10px;">
                        <div class="ms-auto p-3 position-absolute">
                            <h2>
                                {{ $post->judul_foto }}
                            </h2>
                        </div>
                        <div class="ms-auto float-end p-3">
                            @php
                            $userLiked = DB::table('like_foto')
                                ->where('foto_id', '=', $post->id)
                                ->where('user_id', '=', auth()->user()->id)
                                ->get();

                            $photoLike = DB::table('like_foto')
                                ->where('foto_id', $post->id)
                                ->get();

                            $photoComments = DB::table('komentar_foto')
                                ->where('foto_id', $post->id)
                                ->get();
                        @endphp




                        @forelse($userLiked as $like)
                            {{-- Button Red --}}
                            <svg style="cursor: pointer;" class="like-btn" id="btn-like"
                                data-photo-id="{{ $post->id }}" xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-filled text-red" width="30" height="30" viewBox="0 0 24 24"
                                stroke-width="2" stroke="none" fill="red" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                           {{ $photoLike->count() }}
                        @empty
                            {{-- Button Biasa --}}
                            <svg style="cursor: pointer;" class="like-btn" id="btn-like"
                                data-photo-id="{{ $post->id }}" xmlns="http://www.w3.org/2000/svg"
                                class="icon" width="28" height="28" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                            {{ $photoLike->count() }}

                        @endforelse
                            <a href="#" class="ms-3 text-muted">

                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black"
                                    class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path
                                        d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </a>

                        </div>
                    </div>
                    <div class="col-md-5 position-relative">
                        <div class="row p-3">
                            <div class="col-sm-2"><span class="avatar me-6 rounded"
                                    style="background-image: url(/storage/{{ $post->foto_profile }})"></span>
                            </div>
                            <div class="col-sm-7"><b>{{ $post->nama_lengkap }}</b><br>
                                <p class="text-muted"> {{ '@' . $post->username }}</p>
                            </div>
                            <div class="col-md-3">{{ $post->tanggal_unggah }}</div>
                            {{ $post->deskripsi }}
                        </div>
                        <div class="row" style="overflow-y: auto; max-height: 466px">

                                <h3>
                                    Comments({{ $photoComments->count() }})
                                </h3>

                                @php
                          $comments = DB::table('komentar_foto')
                            ->join('foto', 'foto.id', '=', 'komentar_foto.foto_id')
                            ->join('users', 'komentar_foto.user_id', '=', 'users.id')
                            ->where('foto.id', $post->id)
                            ->select('komentar_foto.id','komentar_foto.user_id', 'komentar_foto.isi_komentar','komentar_foto.created_at', 'users.username', 'users.nama_lengkap', 'users.foto_profile')
                            ->get();
                                @endphp

                                @forelse ($comments as $comment)
                                    {{-- Looping Commentar Disini --}}
                                    <div class="col-md-2 mb-3">
                                        <img class="rounded rounded-circle" src="{{ asset('storage/' . $comment->foto_profile) }}" width="50px" height="50px"
                                            alt="">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <b>{{ '@' . $comment->username }}</b>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="coment-date float-end" style="font-size: 12px;">
                                                    {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{ $comment->isi_komentar }}
                                        </div>
                                        @if($comment->user_id == auth()->user()->id)
                                        <form action="/deleteKomen/{{ $comment->id }}" method="post">
                                            @csrf
                                            <button type="submit" style="background: white; border: none; outline: none;">
                                                <div class="text-red">
                                                    Delete
                                                </div>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                    {{-- END Looping Commentar --}}
                                @empty
                                    <center><h4 class="text-muted">No Comments...</h4></center>
                                @endforelse



                                <div class="row position-absolute ms-auto p-3 bg-white" style="bottom: 4px; border:  0px solid rgb(163, 163, 163); border-radius: 15px">
                                    <div class="col-md-10">
                                        {{-- <input type="hidden" value="{{ $post->id }}" id="foto_id"> --}}
                                        <input data-photo-id="{{ $post->id }}" id="isi_komentar{{ $post->id }}" type="text"
                                            style="border: 0px solid rgb(163, 163, 163); outline: none;width: 100%; height: 100%;" placeholder="Write a comments..."
                                            class="form-control">
                                    </div>
                                    <div class="col-sm-2"><button data-photo-id="{{ $post->id }}"
                                            class="btn btn-secondary btn-komen">Send</button></div>
                                </div>




                        </div>


                    </div>
                </div>

            @endforeach

        </div>

    </div>
@endsection
