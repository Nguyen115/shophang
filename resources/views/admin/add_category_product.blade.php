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
                            Category Forms
                        </header>
                        <div class="panel-body">
                        <?php
                        $message= Session::get('message');
                        if($message)
                        {echo $message;
                        Session::put('message', null);}
                        ?>
                            <div class="position-center">

                                <form role="form" action="<?= url('/save_category_product'); ?>" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text"name="category_product_name"class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category Descprition</label>
                                    <textarea style="resize:none"rows="5" class="form-control"name="category_product_decs" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Show</label>
                                    <select class="form-control input-sm m-bot15"name="category_product_status">
                                        <option value="0">Show</option>
                                        <option value="1">Hide</option>
                                    </select>
                                </div>

                                <button type="submit"name="add_category_product" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
    </section>
</section>
@endsection
