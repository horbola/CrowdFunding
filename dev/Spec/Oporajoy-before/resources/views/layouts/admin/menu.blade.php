@php
$auth_user = \Illuminate\Support\Facades\Auth::user();
@endphp
<style type="text/css">
    .navbar-inverse .navbar-brand, .navbar-inverse .navbar-nav>li>a {
        color: #ffffff;
    }
    .navbar-inverse {
        background-color: #42ccae;
        border: none;
    }
    .navbar-inverse ul li a:hover {
        background-color: #42ccae;
        border: none;
    }
    .navbar-top-links li a{color: #052d24}
    
</style>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #42ccae; color: #ffffff; border: none;">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            {{ get_option('site_name') }}
        </a>
    </div>
    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
        <span class="sr-only">
            Toggle navigation
        </span>
        <span class="icon-bar">
        </span>
        <span class="icon-bar">
        </span>
        <span class="icon-bar">
        </span>
    </button>
    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li>
            <a href="{{ route('home') }}" target="_blank">
                <i class="fa fa-home fa-fw">
                </i>
                Go To HomePage
            </a>
        </li>
    </ul>
    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw">
                </i>
                <b class="caret">
                </b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw">
                            </i>
                            New Comment
                            <span class="pull-right text-muted small">
                                4 minutes ago
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw">
                            </i>
                            3 New Followers
                            <span class="pull-right text-muted small">
                                12 minutes ago
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw">
                            </i>
                            Message Sent
                            <span class="pull-right text-muted small">
                                4 minutes ago
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw">
                            </i>
                            New Task
                            <span class="pull-right text-muted small">
                                4 minutes ago
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw">
                            </i>
                            Server Rebooted
                            <span class="pull-right text-muted small">
                                4 minutes ago
                            </span>
                        </div>
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a class="text-center" href="#">
                        <strong>
                            See All Alerts
                        </strong>
                        <i class="fa fa-angle-right">
                        </i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw">
                </i>
                </i> {{ Auth::user()->name }}
                <b class="caret">
                </b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="{{route('profile')}}">
                        <i class="fa fa-user fa-fw">
                        </i>
                        User Profile
                    </a>
                </li>
                <li>
                    <a href="{{route('change_password')}}">
                        <i class="fa fa-gear fa-fw">
                        </i>
                        Settings
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> @lang('app.logout')
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <form action="{{route('search')}}" class="input-group custom-search-form" method="get">
                        <input class="form-control" placeholder="Search..." name="q" type="text">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> </button>
                            </span>
                        </input>
                    </form>
                    <!-- /input-group -->
                </li>
                <li>
                    <a {{ Request::is('dashboard/controlpanel') ? "active": ""}} href="{{ route('dashboard') }}">
                        <i class="fa fa-dashboard fa-fw">
                        </i>
                        Dashboard
                    </a>
                </li>
                <li>
                <a href="#"><i class="fa fa-bullhorn"></i> @lang('app.my_campaigns')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>  <a href="{{route('my_campaigns')}}">@lang('app.my_campaigns')</a> </li>
                    <li>  <a href="{{route('start_campaign')}}">@lang('app.start_a_campaign')</a> </li>
                    <li>  <a href="{{route('my_pending_campaigns')}}">@lang('app.pending_campaigns')</a> </li>
                </ul>
            </li>

            @if($auth_user->is_admin())
            <li> <a href="{{ route('categories') }}"><i class="fa fa-folder-o"></i> @lang('app.categories')</a>  </li>
            <li>
                <a href="#"><i class="fa fa-bullhorn"></i> @lang('app.campaigns')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('all_campaigns') }}">@lang('app.all_campaigns')</a> </li>
                    <li> <a href="{{ route('staff_picks') }}">@lang('app.staff_picks')</a> </li>
                    <li> <a href="{{ route('funded') }}">@lang('app.funded')</a> </li>
                    <li> <a href="{{ route('blocked_campaigns') }}">@lang('app.blocked_campaigns')</a> </li>
                    <li> <a href="{{ route('pending_campaigns') }}">@lang('app.pending_campaigns')</a> </li>
                    <li> <a href="{{ route('expired_campaigns') }}">@lang('app.expired_campaigns')</a> </li>
                    <li> <a href="{{ route('comment') }}">Comments</a> </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> @lang('app.settings')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('general_settings') }}">@lang('app.general_settings')</a> </li>
                    <li> <a href="{{ route('payment_settings') }}">@lang('app.payment_settings')</a> </li>
                    <li> <a href="{{ route('theme_settings') }}">@lang('app.theme_settings')</a> </li>
                    <li> <a href="{{ route('social_settings') }}">@lang('app.social_settings')</a> </li>
                    <li> <a href="{{ route('other_settings') }}">@lang('app.other_settings')</a> </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li> <a href="{{ route('pages') }}"><i class="fa fa-file-word-o"></i> @lang('app.pages')</a>  </li>
            @endif

            <li> <a href="{{route('payments')}}"><i class="fa fa-money"></i> @lang('app.payments')</a>  </li>
            <li>
                <a href="#"><i class="fa fa-money fa-fw"></i> @lang('app.withdraw')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{route('withdraw')}}"><i class="fa fa-credit-card"></i> @lang('app.withdraw')</a>  </li>
                    @if($auth_user->is_admin())
                    <li> <a href="{{route('request')}}"><i class="fa fa-credit-card"></i> @lang('app.withdraw') Request</a>  </li>
                    @endif
                </ul>
            </li>
            <li> <a href="{{route('profile')}}"><i class="fa fa-user"></i> @lang('app.profile')</a>  </li>
            <li> <a href="{{route('change_password')}}"><i class="fa fa-lock"></i> @lang('app.change_password')</a>  </li>
            </ul>
        </div>
    </div>
</nav>