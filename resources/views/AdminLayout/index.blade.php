  <!--  BEGIN MAIN CONTAINER  -->
  <div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                    <a href="#dashboard" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Dashboard</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                        <li class="active">
                            <a href="index.html"> Sales </a>
                        </li>
                        <li>
                            <a href="index2.html"> Analytics </a>
                        </li>
                    </ul>
                </li>
                @foreach (allpostttype() as $posttype)


                <li class="menu">

                    <a href="#dashboard{{ $posttype->id }}" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                        <div class="">
                            {!! $posttype->icon !!}
                            <span>{{ $posttype->title }}</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled show" id="dashboard{{ $posttype->id }}" data-parent="#accordionExample">
                        <li class="active">
                            <a href="{{ route('allblogs',$posttype->slug) }}"> All {{ $posttype->title }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.addblog',  $posttype->slug) }}"> Add New</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.addblog',  $posttype->slug) }}"> Trash  </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('',  $posttype->slug) }}"> Log  </a>
                        </li>
                        <li>
                            <a href="{{ route('',  $posttype->slug) }}"> Order  </a>
                        </li> --}}
                    </ul>
                </li>
                @endforeach

            </ul>
            <!-- <div class="shadow-bottom"></div> -->

        </nav>

    </div>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            @include('AdminLayout.messages')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')


        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->


