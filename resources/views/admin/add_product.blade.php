@extends('layout_admin')
@section('content')
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Product Form
                        </header>
                        <div class="panel-body">
                        <?php
                        $message= Session::get('message');
                        if($message)
                        {echo $message;
                        Session::put('message', null);}
                        ?>
                            <div class="position-center">

                                <form role="form" action="<?= url('/save_product'); ?>" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text"name="product_name"class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Image</label>
                                    <input type="file"name="product_image"class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Descprition</label>
                                    <textarea style="resize:none"rows="5" class="form-control"name="product_decs" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Content</label>
                                    <textarea style="resize:none"rows="5" class="form-control"name="product_content" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Price</label>
                                    <textarea style="resize:none"rows="5" class="form-control"name="product_price" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Show</label>
                                    <select class="form-control input-sm m-bot15"name="product_status">
                                        <option value="0">Show</option>
                                        <option value="1">Hide</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category</label>
                                    <select class="form-control input-sm m-bot15"name="product_cate">
                                        @foreach ($cate_product as $key =>$cate)


                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit"name="add_product" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
    </section>
</section>
@endsection
