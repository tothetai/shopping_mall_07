@extends('backend.master')
@section('title','Sửa danh mục')
@section('main')		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục con</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-5 col-lg-5">
					<form method="post" role="form">
						<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa danh mục con
						</div>
						@include('errors.note')
						<div class="panel-body">
							<div class="form-group">
								<label>Tên danh mục con:</label>
								<input type="text" name="name" class="form-control" value="{{$subcate->sub_name}}">
							</div>
							<div class="form-group" >
									<label>Danh mục</label>
									<select required name="cate" class="form-control">
										@foreach($catelist as $cate)
										<option value="{{$cate->cate_id}}">{{$cate->cat_name}}</option>
										@endforeach
				                    </select>
								</div>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="form-control btn btn-primary" value="Sửa">
						</div>
						<div class="form-group">
							<a href="{{asset('admin/subcategory')}}" class="form-control btn btn-danger">Hủy bỏ</a>
						</div>
						{{csrf_field()}}
					</form>
				</div>
		</div>
	</div><!--/.row-->
</div>
@stop