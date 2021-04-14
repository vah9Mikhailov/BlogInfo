<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href={{route('home')}}>
                <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item has-treeview">
                        <a class="nav-link" href="{{ route('home.front') }}">
                            <i class="ni ni-tv-2 text-blue"></i>
                            <span class="nav-link-text">На сайт</span>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button"
                           aria-expanded="true" aria-controls="navbar-examples">
                            <i class="ni ni-single-02" style="color: #f4645f;"></i>
                            <span class="nav-link-text" style="color: #f4645f;">О пользователях</span>
                        </a>

                        <div class="collapse show" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item has-treeview">
                                    <a class="nav-link" href="{{ route('profile.edit') }}">
                                        Профиль
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a class="nav-link" href="{{ route('users.index') }}">
                                        Состав
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item has-treeview">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <i class="ni ni-bullet-list-67 text-blue"></i>
                            <span class="nav-link-text">Категории</span>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a class="nav-link" href="{{ route('tags.index') }}">
                            <i class="ni ni-tag text-blue"></i>
                            <span class="nav-link-text">Теги</span>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a class="nav-link" href="{{ route('posts.index') }}">
                            <i class="ni ni-single-copy-04 text-blue"></i>
                            <span class="nav-link-text">Посты</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
