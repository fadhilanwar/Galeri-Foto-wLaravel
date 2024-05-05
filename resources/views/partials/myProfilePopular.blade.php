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
    <div class="card">
        <div class="card-body">
                <h2>My Top Albums</h2>

@php
            $no = 1;
@endphp
            @foreach($posts as $post)

            @php
                $photoLike = DB::table('like_foto')
                                ->where('foto_id', $post->id)
                                ->select('like_foto.foto_id')
                                ->get()



            @endphp

            <div class="row">
                <div class="col-md-1">
            # {{ $no++ }}
                </div>
                <div class="col-md-4">
            <b style="font-size: 20px">{{ $post->nama_album }}</b>
                </div>
                <div class="col-md-5 d-flex justify-content-around">

                    Created: {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}

                    <div class="div">
                     <svg style="cursor: pointer;" class="like-btn" id="btn-like"
                        xmlns="http://www.w3.org/2000/svg"
                       class="icon icon-filled text-red" width="24" height="24" viewBox="0 0 24 24"
                       stroke-width="2" stroke="none" fill="red" stroke-linecap="round"
                       stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                       <path
                           d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                   </svg>

                    {{ $post->jumlah_like }}
                </div>
                    <div class="div">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black"
                        class="bi bi-chat-left-text" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                    </svg>

                    {{ $post->jumlah_komen }}
                </div>

                </div>
                <div class="col-md-2">
                    <a href="/yourAlbum/{{ $post->id }}" style="text-decoration: none;">
                    See
                    </a>

                </div>
            </div>
            <hr>


            @endforeach
        </div>
    </div>
</div>


</div>

@endforeach



@endsection
