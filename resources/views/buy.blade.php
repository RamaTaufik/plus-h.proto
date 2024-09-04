@extends('layouts.template')

@section('title')
<title>Buy {{$result->product_name}}</title>
@endsection

@section('content')
<button class="btn-warning m-3">
    <a class="nav-link lead" href="{{ route('search.product', $id) }}">
        &larr; KEMBALI
    </a>
</button>
<div class="container-fluid row display">
    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
        <div class="container bg-light p-4 m-2">
            <h3 class="display-4 m-0">Beli Produk</h3>
            <img class="d-block img-fluid mx-auto" src="{{ asset('assets/img_product/'.$id.'/'.$image->img_name_ext) }}" style="height:150px;">
            <table class="mt-4">
                <tr>
                    <td class="w-25 text-sec"><h4><b>Nama Produk</b></h4></td>
                    <td><h4 class="text-sec">{{$result->product_name}}</h4></td>
                </tr>
                <tr>
                    <td class="w-25 text-sec"><h4><b>Supplier</b></h4></td>
                    <td><h4 class="text-sec">{{$result->supplier_name}}</h4></td>
                </tr>
                <tr>
                <tr>
                    <td class="w-25 text-sec"><h4><b>Stok</b></h4></td>
                    <td><h4 class="text-sec">{{$result->stock}}</h4></td>
                </tr>
                    <td class="w-25 text-sec"><h4><b>Harga</b></h4></td>
                    <td><h4 class="text-sec">Rp{{number_format($result->price,'2',',','.')}}</h4></td>
                </tr>
                <tr>
                    <td class="w-25 text-sec"><h4><b>Deskripsi</b></h4></td>
                    <td><h4 class="text-sec">{{$result->desc}}</h4></td>
                </tr>
                <tr>
                    <td class="w-25 text-sec"><h4><b>Tag</b></h4></td>
                    <td>
                        <h4 class="text-sec">
                            @foreach($tag as $t)
                            {{$t->tag_name}} | 
                            @endforeach
                        </h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12 col-md-6 d-flex flex-column">
        <div class="container bg-prim p-4 m-2">
            <form action="{{ route('product.store', $id) }}" method="post">
                @csrf
                <label class="lead text-white">Jumlah</label>
                <input class="form-control mb-2" type="number" name="qty" min="1" max="{{$result->stock}}" value="1" required>
                <label class="lead text-white">Kota Tujuan</label>
                <select class="form-control mb-2" name="city_id" required>
                    <option value="" selected disabled hidden>Pilih Kota</option>
                    @foreach($city as $c)
                    <option value="{{$c->id}}">{{$c->city_name}}</option>
                    @endforeach
                </select>
                <label class="lead text-white">Alamat</label>
                <textarea name="address" class="form-control mb-2" placeholder="Alamat tujuan" required></textarea>
                <label class="lead text-white">Pengiriman</label>
                <select class="form-control mb-2" name="shipping_type_id" required>
                    <option value="" selected disabled hidden>Pilih Pengiriman</option>
                    @foreach($shipping as $s)
                    <option value="{{$s->id}}">{{$s->shipping_name}} - {{$s->type_name}}</option>
                    @endforeach
                </select>
                <label class="lead text-white">Metode Pembayaran</label>
                <select class="form-control mb-2" name="payment_method_id" required>
                    <option value="" selected disabled hidden>Pilih Metode Pembayaran</option>
                    @foreach($payment as $p)
                    <option value="{{$p->id}}">{{$p->payment_method_name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary m-2" style="float:right">PESAN</button>
            </form>
        </div>
    </div>
</div>
@endsection