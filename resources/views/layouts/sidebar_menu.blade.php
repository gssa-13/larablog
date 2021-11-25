<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">{{__('tag.admin')}}</li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>{{__('tag.home')}}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>{{__('tag.dashboard')}}</p>
            </a>
        </li>

        <li class="nav-header">{{__('tag.blog')}}</li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    {{__('tag.posts')}}
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="fas fa-th-list nav-icon"></i>
                        <p>{{__('tag.see_all_posts')}}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="fas fa-feather-alt nav-icon"></i>
                        <p>{{__('tag.write_post')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">{{__('tag.miscellaneous')}}</li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>{{__('tag.documentation')}}</p>
            </a>
        </li>
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Important</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Warning</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Informational</p>
            </a>
        </li>
    </ul>
</nav>