@extends('layouts.auth')

@section('content')
<div class="container"> <div class="row justify-content-center"> <div class="col-md-8"> <div class="card"> <div
    class="card-header">Dashboard</div> <form action="{{ route('news.import') }}" method="POST"
    enctype="multipart/form-data"> @csrf <input type="file" name="file" class="form-control"> <br> <button
        class="btn btn-success">Import User Data</button>
    </form>
    <div class="card-body">
        Hi boss!
    </div>
</div>
</div>
</div>
</div>
@endsection