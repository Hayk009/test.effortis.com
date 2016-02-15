<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @yield('title')Nazaryan Blog
        
    </title>
    
    <!-- jQuery -->

    <!-- Bootstrap Core CSS -->
 
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Custom CSS -->
    @yield('style')

    <script src='{{ URL::asset("js/jquery.js") }}'></script>
    

    
    <!-- Bootstrap Core JavaScript -->
    <script src='{{ URL::asset("js/bootstrap.min.js") }}'></script>
    
    
    
    @yield('script')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
    @include('layouts.header')

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row" style="margin-top:100px">
            <div class="col-lg-12">
                <h1 class="page-header">@yield('page_title')
                    <small>@yield('page_subtitle')</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        @include('layouts.alerts.messages')
        @yield('content')
        <!-- /.row -->


        

    </div>
    <!-- /.container -->

    

</body>

</html>
