@extends('layouts.template')

@section('title')
<title>Mencari "{{$req}}"</title>
@endsection

@section('content')
<button class="btn-warning m-3">
    <a class="nav-link lead" href="{{ route('home') }}">
        &larr; KEMBALI
    </a>
</button>
<h1 class="display-3 text-center">Hasil Pencarian</h1>
<div class="container bg-light my-5 p-3 rounded" style="min-height:300px">
    {{-- <h5 class="text-center text-secondary" style="padding-top:140px;">
        Oops, nampaknya barang yang kamu cari tidak ada
    </h5> --}}
    <div class="row display my-2">
        @foreach($result as $res)
        <div class="col-6 col-md-3 my-2">
            <div class="card" title="{{$res->product_name}}">
                <img class="card-img-top img-fluid" src="{{ asset('assets/img_product/'.$res->id.'/'.explode(',',$res->img_name_ext)[0]) }}" alt="{{$res->img_name_ext}}" style="aspect-ratio:1/1;object-fit:cover;">
                <div class="card-img-overlay">
                    <p class="card-text">Rating</p>
                </div>
                <div class="card-body" style="height:110px;">
                    <div class="fading">
                        @foreach(explode(',',$res->tag_name) as $tag)
                        <span class="tag f-sm my-2">#{{$tag}}</span>
                        @endforeach
                    </div>
                    <h5 class="card-title m-0 text-truncate">
                        {{$res->product_name}}
                    </h5>
                    <footer class="blockquote-footer m-0">{{$res->supplier_name}}</footer>
                    <span class="price">Rp{{number_format($res->price,2,',','.')}}</span>
                </div>
                <a href="{{ route('search.product', $res->id) }}">
                    <span class="link"></span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    {{ $result->links() }}
</div>
@endsection