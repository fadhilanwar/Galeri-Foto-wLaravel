@extends('dashboard')
@section('page-container')


<h1>{{ $title }}</h1>
<form action="/dashboard/album/create" method="post">
    @csrf
    <div class="form-group">
        <label>Nama Album</label>
        <input type="text" name="nama_album" class="form-control">
        <label>Deskripsi(opsional)</label>
        <textarea  name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
    </div>



    <button type="submit" class="btn btn-primary mt-5">
        Simpan Album
    </button>
</form>


@endsection
