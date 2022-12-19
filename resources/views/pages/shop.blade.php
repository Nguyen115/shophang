@extends('layout')
@section('content')
<div id="fh5co-product">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>Cool Stuff</span>
                <h2>Products.</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($all_product as $key => $product)
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{URL::to('public/upload/product/'.$product->product_image)}});">
                        <div class="inner">
                            <p>
                                <a href="{{URL::to('/detail_product/'.$product->product_id)}}" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="{{URL::to('/detail_product/'.$product->product_id)}}" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">{{$product->product_name}}</a></h3>
                        <span class="price">{{number_format($product->product_price).'$'}}</span>
                    </div>
                </div>
            </div>
            @endforeach
            </div>


        </div>
    </div>
</div>
@endsection
