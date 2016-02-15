<header >
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top main-menu" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand @if(Request::is('/')) active @endif home" href="/">Personal Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav navbar-right">
                    <li @if(Request::is('posts*') || Request::is('/')) class="active" @endif>
                        <a href="{{URL::to( '/' )}}">Posts</a>
                    </li>
                    <li @if(Request::is('lectures*')) class="active" @endif>
                        <a href="{{URL::to( '/lectures' )}}">Lectures</a>
                    </li>
                    <li @if(Request::is('tasks*')) class="active" @endif>
                        <a id="Label"  href="{{URL::to( '/about' )}}">About</a>
                    </li>
                    @if(Auth::check())
                        <li>
                            <a id="Label"  href="{{URL::to( 'auth/logAuth' )}}">Log auth</a>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</header>