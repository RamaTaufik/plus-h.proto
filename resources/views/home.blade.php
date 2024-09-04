@extends('layouts.template')

@section('title')
<title>Beranda</title>
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid bg-img-fluid" style="background-image:url({{ url('assets/img/plushies.png') }});min-height:400px;">
    <div class="container">
        <h1 class="display-4 text-white" style="padding-top:270px;">Plushie Kualitas Terbaik</h1>
        <p class="lead text-white">Distributor plushie dan merchandise nomor 1 di Indonesia</p>
    </div>
</div>
<div class="container">
    <h1 class="display-3 text-center pt-5">Bermacam-macam Kategori</h1>
    <div class="row display py-5">
        <div class="col-6 col-md-4 my-2">
            <div class="card bg-white text-dark">
                <img class="card-img" src="{{ url('assets/img/plushie.webp') }}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Plushie</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 my-2">
            <div class="card bg-white text-dark">
                <img class="card-img" src="{{ url('assets/img/bean.webp') }}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Bean</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 my-2">
            <div class="card bg-white text-dark">
                <img class="card-img" src="{{ url('assets/img/fumo.jpg') }}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Fumo</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 my-2">
            <div class="card bg-white text-dark">
                <img class="card-img" src="{{ url('assets/img/funko-pop.png') }}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Funko Pop</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 my-2">
            <div class="card bg-white text-dark">
                <img class="card-img" src="{{ url('assets/img/figurine.webp') }}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Figurine</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 my-2">
            <div class="card bg-white text-dark">
                <img class="card-img" src="{{ url('assets/img/merch.jpg') }}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Merchandise</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-light text-dark">
    <div class="container">
        <h1 class="display-3 text-center pt-5">Kualitas Terjamin</h1>
        <h5 class="text-center">
            <i>Plushie</i> dan <i>merchandise</i> kami berstandar internasional, yang terbaik dari yang terbaik
        </h5>
        <div class="row display py-5">
            <div class="col-12 col-md-4">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <img src="{{ url('assets/img/plushie1.webp') }}" alt="" class="img-fluid rounded">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6 col-md-6">
                        <img src="{{ url('assets/img/figurine1.webp') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-6 col-md-6">
                        <img src="{{ url('assets/img/fumo1.webp') }}" alt="" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <p class="lead">
                    <i>Plushie</i> menjadi kesukaan banyak orang dikarenakan banyak hal. Mulai dari lucu, empuk, hingga jadi 
                    teman halu. Apapun alasannya, pastinya tidak ada yang mau plushie kualitas rendah yang tidak hanya mudah 
                    rusak, tapi juga tidak sesuai dengan orisinilnya. Maka dari itu, <i>plushie</i> kami dipastikan menjalani  
                    pengecekan ketat sebelum sampai di tangan anda dan pastinya dari <i>supplier</i> orisinil terpercaya.
                </p>
                <p class="lead">
                    Selain dari <i>plushie</i>, kami juga menjual <i>merchandise</i> lainnya, seperti <i>funko pop</i> dan 
                    <i>figurine</i>. Tentunya kualitas mereka juga tidak kalah dengan kualitas <i>plushie</i> kami. Kami 
                    menyediakan berbagai macam <i>plushie</i> dan <i>merchandise</i> untuk anda pilih. Mulai dari karakter 
                    kartun, <i>anime</i>, hewan, dan banyak lagi.
                </p>
                <p class="lead">
                    Kelebihan plushie kami yaitu:
                </p>
                <ul>
                    <li class="lead">Terjamin orisinalitas-nya;</li>
                    <li class="lead">Terjamin kualitas bahan-nya;</li>
                    <li class="lead">Tahan lama;</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h1 class="display-3 text-center pt-5">Supplier Kami</h1>
</div>
@endsection
