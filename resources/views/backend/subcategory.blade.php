@extends('backend.master')
@section('title','Danh sách Sản phẩm')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục con</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách danh mục con</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						@include('errors.note')
						<div class="panel-body">
								<div>
									<a href="{{asset('admin/subcategory/add')}}" class="form-control btn btn-primary">Thêm mới</a>
								</div>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th width="30%">Danh mục con</th>
										<th>Danh mục</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($subcatelist as $subcate)
									<tr>
										
										<td>{{$subcate -> sub_id}}</td>
										<td>{{$subcate -> sub_name}}</td>
										<td>{{$subcate -> cat_name}}</td>
										<td>
											<a href="{{asset('admin/subcategory/edit/'.$subcate->sub_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
											<a onclick ="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/subcategory/delete/'.$subcate->sub_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop