
<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="#">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <form class="search-bar">
                    <input type="text" class="form-control" placeholder="Enter keywords">
                    <a href="#"><i class="icon-magnifier"></i></a>
                </form>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope-open-o"></i><span class="badge badge-light badge-up">12</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            You have 12 new messages
                            <span class="badge badge-light">12</span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="media">
                                    <div class="avatar"><img class="align-self-start mr-3" src="{{asset('backend/assets/images/avatars/avatar-5.png')}}" alt="user avatar"></div>
                                    <div class="media-body">
                                        <h6 class="mt-0 msg-title">Jhon Deo</h6>
                                        <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                        <small>Today, 4:10 PM</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item text-center"><a href="#">See All Messages</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell-o"></i><span class="badge badge-info badge-up">14</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            You have 14 Notifications
                            <span class="badge badge-info">14</span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="media">
                                    <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                                    <div class="media-body">
                                        <h6 class="mt-0 msg-title">New Registered Users</h6>
                                        <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item text-center"><a href="#">See All Notifications</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item language">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="#"><i class="fa fa-flag"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item change-lang user-pointer" data-lang="en" data-url="{{route('change.lang')}}"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
                    <li class="dropdown-item change-lang user-pointer" data-lang="bn" data-url="{{route('change.lang')}}"> <i class="flag-icon flag-icon-bd mr-2"></i> Bangeli</li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img src="{{asset('storage/uploads/users/'.auth()->user()->photo)}}" class="img-circle" alt="user avatar"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="#">
                            <div class="media">
                                <div class="avatar"><img class="align-self-start mr-3" src="{{asset('storage/uploads/users/'.auth()->user()->photo)}}" alt="user avatar"></div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">{{auth()->user()->name}}</h6>
                                    <p class="user-subtitle">{{auth()->user()->email}}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item">
                        <form action="{{route('staff.logout')}}" method="post">
                            @csrf
                            <a href="{{route('staff.logout')}}" onclick="event.preventDefault(); this.closest('form').submit()">
                                <i class="icon-power mr-2"></i> Logout
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
