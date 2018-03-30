<!DOCTYPE html>
<html>
<head>
<base href="{{asset('/')}}/">
<meta charset="utf-8">
<meta name="viewport" name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')|Admin</title>

{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::style('css/datepicker3.css') !!}
{!! Html::style('css/styles.css') !!}
{!! Html::script('ckeditor/ckeditor.js') !!} 
{!! Html::script('js/lumino.glyphs.js') !!} 



</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{asset('admin/home')}}">Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>{{Auth::user()->email}}<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{asset('logouts')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>{{trans('index.index.logout')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
                            
        </div><!-- /.container-fluid -->
    </nav>
        
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li class="active"><a href="{{asset('admin/homes')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>{{trans('index.index.home')}}</a></li>
            <li><a href="{{asset('admin/product')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>{{trans('index.index.product')}}</a></li>
            <li><a href="{{asset('admin/category')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>{{trans('index.index.category')}}</a></li>
            <li><a href="{{asset('admin/subcategory')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Subcategory</a></li>
            <li><a href="{{asset('admin/user')}}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-line-graph"></use></svg>User</a></li><li><a href="{{asset('listBillDetail')}}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-line-graph"></use></svg>Hóa Đơn</a></li>
        </ul>
        
    </div><!--/.sidebar-->
    <!--main-->
    @yield('main')
    {!! Html::script('js/jquery-1.11.1.min.js') !!} 
    {!! Html::script('js/bootstrap.min.js') !!} 
    {!! Html::script('js/chart.min.js') !!} 
    {!! Html::script('js/chart-data.js') !!} 
    {!! Html::script('js/easypiechart.js') !!} 
    {!! Html::script('js/easypiechart-data.js') !!} 
    {!! Html::script('js/bootstrap-datepicker.js') !!}
    {!! Html::script('js/myscript.js') !!} 

    <script>
        $('#calendar').datepicker({
        });

        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
                $(this).find('em:first').toggleClass("glyphicon-minus");      
            }); 
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>   
</body>

</html>