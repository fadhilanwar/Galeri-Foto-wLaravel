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
        left: 113px;
        color: white;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 10px;
        display: flex;
        justify-content: center;
        text-align: center;
        display: none;
    }
</style>
    <div class="row">
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
@endsection
