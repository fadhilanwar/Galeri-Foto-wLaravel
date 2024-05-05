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
                    <div class="card-foot pb-3" style="color: rgb(155, 153, 149); text-align: center;">
                        "{{ $album->deskripsi }}"
                    </div>
                </div>
            </div>
        @empty
            <center>
                <h2>
                    You don't Have an Albums...
                </h2>
            </center>
        @endforelse
    </div>
@endsection
