@extends('dashboard')
@section('page-container')
<style>
    .album-hover:hover .the-text{
        display: block;
        /* color: red; */
    }

    .album-hover:hover{
        filter:  brightness(0.90);
    }
    .album-empty-hover:hover{
        background: #eee;
    }
    .the-text{
        position: absolute;
        justify-content: center;
        align-items: center;
        /* z-index: 999; */
        /* padding: 100px; */
        top: 60px;
        left: 115px;
        color: white;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 10px;
        display: flex;
        justify-content: center;
        text-align: center;
        display: none;
    }
</style>
@foreach ($datauser as $user)



<div class="row">
    <div class="col-md-4">

        <center>
            <div class="image" style="padding: 20px">
                @if(auth()->user()->foto_profile)
                <img src="{{ asset('storage/'. $user->foto_profile  ) }}" width="180px" height="180px" class="rounded rounded-circle" alt="">

                @else
                <img src="PP-Default.jpg" class="rounded rounded-circle" width="250px" height="250px" alt="">

                @endif
            </div>
            </center>

    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-9 p-4">
                <div style="font-size: 24px;">{{$user->nama_lengkap}}
                </div>
                <p class="text-muted">
                    {{'@'. $user->username }}
                </p>
            </div>

            <div class="col-md-3 p-4">
            <div>
                <a href="/yoursAccount">
                    <button class="btn btn-secondary">Edit profile</button></div>
                </a>
              

            </div>
        </div>


        @php

            $albumCount = DB::table('album')
                            ->join('users', 'users.id', '=', 'album.user_id')
                            ->where('album.user_id',  auth()->user()->id)
                            ->count();
            $fotoCount = DB::table('foto')
                            ->join('users', 'users.id', '=', 'foto.user_id')
                            ->where('foto.user_id',  auth()->user()->id)
                            ->count();

             $like = DB::table('foto')
                ->join('like_foto', 'like_foto.foto_id', '=', 'foto.id')
                ->join('users', 'users.id', '=', 'foto.user_id')
                ->where('users.id', $user->id)
                ->get();

     $fotos = DB::table('foto')
        ->join('users', 'users.id', '=', 'foto.user_id')
        ->where('foto.user_id',  auth()->user()->id)
        ->select('foto.id', 'foto.lokasi_file')
        ->get();



        $albums  =  DB::table('album')
            ->leftJoin('foto', 'foto.album_id', '=', 'album.id')
            ->groupBy('album.id')
            ->where('album.user_id', '=',  auth()->user()->id)
            ->select('album.id','album.nama_album', 'album.deskripsi', 'foto.lokasi_file')
            ->get();




        @endphp

        <div class="row">
            <div class="col-md-6 p-4">
                <div class="row" style="font-size: 14px;">
                    <div class="col-md-4"><b>{{ $albumCount }}</b> Albums</div>
                    <div class="col-md-4"><b>{{ $fotoCount }}</b> Posts</div>
                    <div class="col-md-4"><b>{{ $like->count() }}</b> Like</div>
                </div>

            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row p-4">{{ $user->bio }}</div>


    </div>
    <div class="hr-text d-flex">
        <div class="1">
            <a href="/yoursProfile">
                <button class="btn">Photos</button>
            </a>

        </div>
        <div class="2">
            <a href="/yoursProfileAlbum">
                <button class="btn">Album</button>
            </a>

        </div>
        <div class="3">
            <a href="/yoursProfilePopular">
                <button class="btn ms-2">Popular</button>
            </a>

        </div>
    </div> 
    
    <div class="row">
        <h2>
            Albums Created By You
        </h2>


        @forelse ($albums as $album)

        <div class="col-md-3">
            {{-- <div class="col-md-4">a</div>
    <div class="col-md-4">a</div>
    <div class="col-md-4">a</div> --}}
            <div class="card mb-5">
                <a href="/yourAlbum/{{ $album->id }}" style="text-decoration: none;">
                    @if ($album->lokasi_file)
                        <div class="card-head album-hover ">

                            <div class="the-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                  </svg><br>
                                  View
                            </div>

                            <img src="{{ asset('storage/public/' . $album->lokasi_file) }}" class="img-fluid"
                                alt="{{ $album->lokasi_file }}" style="max-height: 150px; min-height: 150px" width="100%">
                        </div>
                    @else
                        <div class="card-head album-empty-hover d-flex justify-content-center align-items-center text-secondary" style="height: 145px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    <path
                                        d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                <b style="font-size: 17px;" class="ms-1">
                                        Empty
                                </b>
                        </div>
                    @endif
                    {{-- @endforeach  --}}
                    {{-- @foreach ($album->fotos as $foto)
        <img src="{{ asset($foto->path_foto) }}" width="100" height="100">
        @endforeach --}}
                </a>
                <div class="card-body">
                    <h3>
                        {{ $album->nama_album }}
                    </h3>
                </div>
                @php
                $albumVisit =    DB::table('users')->join('album', 'album.user_id', '=', 'users.id')
                                        ->select('users.nama_lengkap', 'users.username')
                                        ->get();

                @endphp
                <div class="card-foot pb-3" style="color: rgb(155, 153, 149); text-align: center;">
                    "{{ $album->deskripsi }}"
                </div>
            </div>
        </div>

        @empty
        <center>

            <h4>
                Seems You didn't Creating any Albums :(
                </h4>
            </center>
            @endforelse

    </div>
    

</div>

@endforeach



@endsection
