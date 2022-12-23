@extends('layout_admin')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      All category product
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
       <?php $message= Session::get('message');
        if($message)
        {echo $message;
        Session::put('message', null);}
        ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Id</th>
            <th>Product</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>

            <th>Status</th>
            <th>Task</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$pro->product_id}}</td>
            <td>{{$pro->product_name}}</td>
            <td><img src="public/upload/product/{{$pro->product_image}}" height="100" width="100"></td>
            <td>{{$pro->product_price}}</td>
            <td>{{$pro->category_name}}</td>
            <td><span class="text-ellipsis">
                <?php
                if($pro->product_status==0)
                 {?>
                <a href="{{URL::to('/active_product/'.$pro->product_id)}}"><span class="fa fa-thumbs-up"></span></a>
                <?php
            }else{
                ?>
                <a href="{{URL::to('/unactive_product/'.$pro->product_id)}}"><span class="fa fa-thumbs-down"></span></a>
              <?php
            }
              ?>

            </span></td>
            <td>
              <a href="{{URL::to('/edit_product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a href="{{URL::to('/delete_product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
@endsection
