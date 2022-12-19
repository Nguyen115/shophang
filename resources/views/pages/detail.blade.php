@extends('layout')
@section('content')

<div id="fh5co-product">
    <div class="container">

        @foreach ($product_detail as $key => $value)


        <div class="row">
            <div class="col-md-10 col-md-offset-1 animate-box">

                    <div class="item">
                    <img src="{{URL::to('/public/upload/product/'.$value->product_image)}}" height="400" width="800">
                    </div>


                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h2>{{$value->product_name}}</h2>
                        <p>
                            <form action="{{URL::to('/save_cart')}}" method="POST">
                                {{ csrf_field() }}

                            <label>Quantity:</label>
                            <input name="qty"type="number" min="1" value="1" />
                            <input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="fh5co-tabs animate-box">
                    <ul class="fh5co-tab-nav">
                        <li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Product Details</span></a></li>
                        <li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span><span class="hidden-xs">Specification</span></a></li>
                        <li><a href="#" data-tab="3"><span class="icon visible-xs"><i class="icon-star"></i></span><span class="hidden-xs">Feedback &amp; Ratings</span></a></li>
                    </ul>

                    <!-- Tabs -->
                    <div class="fh5co-tab-content-wrap">

                        <div class="fh5co-tab-content tab-content active" data-tab-content="1">
                            <div class="col-md-10 col-md-offset-1">
                                <span class="price">{{number_format($value->product_price).'$'}}</span>
                                <h2>{{$value->product_name}}</h2>
                                <p>{{$value->product_desc}}</p>

                                <p>{{$value->product_content}}</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="uppercase">Keep it simple</h2>
                                        <p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="uppercase">Less is more</h2>
                                        <p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="fh5co-tab-content tab-content" data-tab-content="2">
                            <div class="col-md-10 col-md-offset-1">
                                <h3>Product Specification</h3>
                                <ul>
                                    <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius</li>
                                    <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi</li>
                                    <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                    <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                </ul>
                                <ul>
                                    <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius</li>
                                    <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi</li>
                                    <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                    <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
