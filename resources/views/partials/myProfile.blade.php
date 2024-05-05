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
        <h2>Your Collections</h2>
        @foreach($fotos as $foto)

        <div class="col-lg-4 mb-4">
            <a href="/seepost/{{ $foto->id }}">

            <img src="{{ asset('storage/public/' . $foto->lokasi_file) }}"
            height="210px" class="card-img-top">
        </a>
        </div>
        @endforeach

    </div>

</div>

@endforeach



@endsection
