<?php
$user = auth()->user();
?>
        <!-- BEGIN HEADER-->
<header id="header" class="no-print">
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="pull-right">
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="header-nav-brand">
                    <div class="brand-holder pull-left">
                        <a href="{{url('dashboard')}}">
                            <img src="{{url('Content/img/header-logo3.png')}}">
                        </a>
                    </div>
                </li>

            </ul>
        </div>        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <form action="/Account/LogOff" class="navbar-right" id="logoutForm" method="post"><input name="__RequestVerificationToken" type="hidden" value="fADiWXqzdT5w4ZZ18mR3WsLjMsDoTIzEEgyXNe7IHSzfKaDMtzXkozDlGWTLImyEtgNL739jgmgf5byrE9PCmlhbNCHEVtBY9BV8jjydENI7eGFF8G6v46-zn1UHomK0CRRZIs_rG04G9rJm9gRzlw2" />        <ul class="header-nav header-nav-profile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            <?php
                            $url = 'userimages/';
                            $picDefault = 'default.png';
                            $userImage = empty($user->ImageInfo)?$picDefault:$user->ImageInfo;
                            ?>
                            <img src="{{url($url.$userImage)}}" alt="" />



                                <span class="profile-info">
                                    {{$user->FirstName}} ({{$user->latestRole()->role->name}})
                                </span>



                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li class="divider"></li>
                            <li><a href="{{url('Users/Edit/'.$user->id)}}"><i class="fa fa-fw fa-user"></i> Profile</a></li>
                            <li><a href="{{url('Manage/ChangePassword/'.$user->id)}}"><i class="fa fa-fw fa-unlock-alt"></i> Change Password</a></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off text-danger"></i> Log off</a></li>
                        </ul><!--end .dropdown-menu -->
                    </li>
                </ul>
            </form>



        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->