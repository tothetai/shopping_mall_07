@extends('backend.master')
@section('title','Danh sách Sản phẩm')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiết hóa đơn</h1>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách hóa đơn</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            
                            <table class="table table-bordered" style="margin-top:20px;">               
                                <thead>
                                    <tr class="bg-primary">
                                        <th width="30%">Tên khách hàng</th>
                                        <th>Email</th>
                                        <th >SDT</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày mua</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bill as $bill_item)
                                    <tr>
                                        <td>{{$bill_item->name}}</td>
                                        <td>{{$bill_item->email}}</td>
                                        <td>{{$bill_item->phone}}</td>
                                        <td>{{$bill_item->address}}</td>
                                        <td>{{$bill_item->purchase_date}}</td>

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
</div>  <!--/.main-->
@stop