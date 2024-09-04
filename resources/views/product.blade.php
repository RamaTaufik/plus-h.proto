@extends('layouts.template')

@section('title')
<title>{{$result->product_name}}</title>
@endsection

@section('content')
<button class="btn-warning m-3">
    <a class="nav-link lead" href="{{ route('search') }}">
        &larr; KEMBALI
    </a>
</button>
<div class="container-fluid row display">
    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
        <div id="carouselExampleControls" class="carousel carousel-dark slide mb-3" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($image as $img)
                <div class="carousel-item @if($img->img_type=="main") active @endif">
                    <img class="d-block img-fluid mx-auto" src="{{ asset('assets/img_product/'.$id.'/'.$img->img_name_ext) }}" alt="Slide" style="height:350px;">
                </div>
                @endforeach
            </div>
            @if(count($image)>1)
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            @endif
        </div>
    </div>
    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
        <div class="container bg-light p-4 m-2">
            <h3 class="display-4 m-0">{{$result->product_name}}</h3>
            <div class="d-flex align-item-center">
                <img class="logo" src="{{ url('assets/img_supplier/'.$result->logo) }}">
                <h3 class="text-muted mb-3">{{$result->supplier_name}}</h3>
            </div>
            @foreach($tag as $t)
            <span class="tag" style="font-size:1.5em;">#{{$t->tag_name}}</span>
            @endforeach
            <table class="mt-4">
                <tr>
                    <td class="w-25 text-sec"><h4><b>Harga</b></h4></td>
                    <td><h4 class="text-sec">Rp{{number_format($result->price,'2',',','.')}}</h4></td>
                </tr>
                <tr>
                    <td class="w-25 text-sec"><h4><b>Stok</b></h4></td>
                    <td><h4 class="text-sec">{{$result->stock}}</h4></td>
                </tr>
                <tr>
                    <td class="w-25 text-sec"><h4><b>Deskripsi</b></h4></td>
                    <td><h4 class="text-sec">{{$result->desc}}</h4></td>
                </tr>
            </table>
            <a class="buy" style="float:right;" href="{{ route('buy', $id) }}">
                <i class="fas fa-shopping-cart" style="font-size:25px;"></i>
            </a>
        </div>
    </div>
</div>
@endsection