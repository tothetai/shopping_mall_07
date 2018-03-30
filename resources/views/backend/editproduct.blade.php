@extends('backend.master')
@section('title','Sửa Sản phẩm')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa sản phẩm</div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group" >
                                    <label>Tên sản phẩm</label>
                                    <input required type="text" name="name" class="form-control" value="{{$product->name}}">
                                </div>
                                <div class="form-group" >
                                    <label>Giá sản phẩm</label>
                                    <input required type="number" name="price" class="form-control" value="{{$product->price}}">
                                </div>
                                <div class="form-group" >
                                    <label>Ảnh sản phẩm</label>
                                    <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="300px" src="{{asset('/storage/avatar/'.$product->img)}}">
                                </div>
                                <div class="form-group" >
                                    <label>Khuyến mãi</label>
                                    <input required type="text" name="promotion" class="form-control" value="{{$product->promotion}}">
                                </div>
                                <div class="form-group" >
                                    <label>Tình trạng</label>
                                    <input required type="text" name="condition" class="form-control" value="{{$product->condition}}">
                                </div>
                                <div class="form-group" >
                                    <label>Trạng thái</label>
                                    <select required name="status" class="form-control">
                                    <option value="1" @if($product->status==1) selected @endif>Còn hàng</option>
                                    <option value="0" @if($product->status==0) selected @endif>Hết hàng</option>
                                    </select>
                                </div>
                                <div class="form-group" >
                                    <label>Miêu tả</label>
                                    <textarea required name="description" class="ckeditor" >{{$product->description}}</textarea>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('description',{
                                        	language:'vi',
                                        	filebrowserImageBrowseUrl: '../../public/ckfinder/ckfinder.html?Type=Images',
                                        	filebrowserFlashBrowseUrl: '../../public/ckfinder/ckfinder.html?Type=Flash',
                                        	filebrowserImageUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        	filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                        });
                                    </script>
                                </div>
                                <div class="form-group" >
                                    <label>Danh mục con</label>
                                    <select required name="subcate" class="form-control">
                                    @foreach($sublistcate as $subcate)
                                    <option value="{{$subcate->id}}" @if($product->sub_id == $subcate->id) selected @endif>{{$subcate->sub_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group" >
                                    <label>Sản phẩm nổi bật</label><br>
                                    Có: <input type="radio" name="featured" value="1" @if($product->featured==1) checked @endif>
                                    Không: <input type="radio" name="featured" value="0" @if($product->featured==0) checked @endif>
                                </div>
                                <div class="form-group" >
                                    <label>Sản phẩm mới</label><br>
                                    Có: <input type="radio" name="new" value="1" @if($product->new == 1) checked @endif)>
                                    Không: <input type="radio" name="new" value="0" @if($product->new == 0) checked @endif>
                                </div>
                                <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
                                <a href="#" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->
@stop