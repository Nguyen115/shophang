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
                        <?php
                        $message= Session::get('message');
                        if($message)
                        {echo $message;
                        Session::put('message', null);}
                        ?>>
                        <div class="panel-body">
                            @foreach ($edit_category_product as $key => $edit_value)


                            <div class="position-center">

                                <form role="form" action="<?= url('/update_category_product/'.$edit_value->category_id); ?>" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text"value="{{$edit_value->category_name}}"name="category_product_name"class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category Descprition</label>
                                    <textarea style="resize:none"value="{{$edit_value->category_desc}}"rows="5" class="form-control"name="category_product_decs" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>


                                <button type="submit"name="add_category_product" class="btn btn-info">Update</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
    </section>
</section>
@endsection
