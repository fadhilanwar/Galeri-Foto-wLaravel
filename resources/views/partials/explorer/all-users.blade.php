@extends('dashboard')
@section('page-container')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card mb-4 rounded-5 pe-4 p-2">

        <form action="">
            <div class="form-group d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 30 16">
                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                  </svg>
                      <input autocomplete="off" type="text" name="searchUsers" class="w-100 p-1" placeholder="Find User..." style="outline: none;height: 100%;; border: none;">

                    </div>
                </form>
            </div>
             </div>
    <div class="col-md-3"></div>
</div>
<div class="card">
    <div class="card-body">
        @if($keyword)
        <div class="d-flex">
            <h3>Search Result for "{{ $keyword }}" {{ $users->count() }} Person founds!</h3>
            <a href="/exploreUsers" class="ms-2">Back to Explorer</a>
        </div>
        @endif
        @foreach ($users as $user)

        <div class="row" style="border-block-end: 1px solid rgb(211, 211, 211)">
            <div class="col-sm-1 d-flex align-items-center justify-content-center">  <span class="avatar me-3 rounded"
                style="background-image: url(/storage/{{ $user->foto_profile }})"></span></div>
            <div class="col-sm-5 p-2">{{ $user->nama_lengkap }}@if($user->id == auth()->user()->id)
                <button class="btn btn-sm">( It's You)</button>
            @endif <br>
                <div class="text-muted">
                    {{'@'. $user->username }}
                </div>
            </div>
            @php
               $album =  DB::table('users')
                            ->join('album', 'album.user_id', '=', 'users.id')
                            ->where('users.id', $user->id)
                            ->get();
               $post =  DB::table('users')
                            ->join('foto', 'foto.user_id', '=', 'users.id')
                            ->where('users.id', $user->id)
                            ->get();
               $like =  DB::table('foto')
                            ->join('like_foto', 'like_foto.foto_id', '=', 'foto.id')
                            ->join('users', 'users.id', '=', 'foto.user_id')
                            ->where('users.id', $user->id)
                            ->get();
            @endphp
            <div class="col-sm-3 p-2 pt-3">

                <div class="row">
                    <div class="col-md-4"> {{ $album->count() }} Albums,</div>
                    <div class="col-md-4"> {{ $post->count() }} Posts,</div>
                    <div class="col-md-4"> <svg style="cursor: pointer;"
                         xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-filled text-red" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="none" fill="red" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                    </svg>{{ $like->count() }}</div>
                </div>


                </div>
            <div class="col-sm-2 p-3">
                <form action="/exploreUsers/{{ $user->id }}" method="get">
                    <button class="btn btn-success">Visit</button>
                </form>
            </div>
        </div>
        @endforeach


    </div>
</div>
@endsection
