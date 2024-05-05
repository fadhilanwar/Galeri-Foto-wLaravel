
@foreach ($foto as $foto)
<div class="col-sm-6 col-lg-4">
    <div class="card card-sm mb-3">

        <a href="#" class="d-block"><img src="{{ asset('storage/public/' . $foto->lokasi_file) }}"
                height="210px" class="card-img-top"></a>
        <div class="card-body">
            <div class="d-flex align-items-center">

                <span class="avatar me-3 rounded"
                    style="background-image: url(/storage/{{ $foto->foto_profile }})"></span>
                <div>
                    <div>{{ $foto->username }}</div>
                    <div class="text-muted">{{ $foto->tanggal_unggah }}</div>
                </div>
                <div class="ms-auto">
                    <a href="#" class="text-muted">
                        <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path
                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        </svg>
                        {{-- Untuk Preview --}}
                    </a>



                    @php
                        $userLiked = DB::table('like_foto')
                            ->where('foto_id', '=', $foto->id)
                            ->where('user_id', '=', auth()->user()->id)
                            ->get();
                    @endphp

                    @forelse($userLiked as $like)
                        {{-- Button Red --}}
                        <svg style="cursor: pointer;" class="like-btn" id="btn-like"
                            data-photo-id="{{ $foto->id }}" xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-filled text-red" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="red" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                    @empty
                        {{-- Button Biasa --}}
                        <svg style="cursor: pointer;" class="like-btn" id="btn-like"
                            data-photo-id="{{ $foto->id }}" xmlns="http://www.w3.org/2000/svg"
                            class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                    @endforelse


                </div>

            </div>
            <div class="float-end">
                <a href="#">See Post</a>
            </div>
        </div>
    </div>
</div>
@endforeach
