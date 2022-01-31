<div class="sidebar" data-color="purple" data-image="/assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                طاقچه کتاب
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="{{ route('admin') }}">
                    <i class="pe-7s-graph"></i>
                    <p>داشبورد</p>
                </a>
            </li>
            <li>
                <a href="{{ route('Add_Author.index') }}">
                    <i class="pe-7s-user"></i>
                    <p>نویسنده ها</p>
                </a>
            </li>
            <li>
                <a href="{{ route('BookController.index') }}">
                    <i class="pe-7s-note2"></i>
                    <p>کتاب ها</p>
                </a>
            </li>
            <li>
                <a href="{{ route('SubCategoryController.index') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>دسته بندی ها</p>
                </a>
            </li>
            <li>
                <a href="icons.html">
                    <i class="pe-7s-science"></i>
                    <p>آیکون‌ها</p>
                </a>
            </li>
            <li>
                <a href="maps.html">
                    <i class="pe-7s-map-marker"></i>
                    <p>نقشه ها</p>
                </a>
            </li>
            <li>
                <a href="notifications.html">
                    <i class="pe-7s-bell"></i>
                    <p>اعلانات</p>
                </a>
            </li>
            <li class="active-pro">

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    <a href="{{ route('logout') }}">

                    </a>

                    <button >    <i class="pe-7s-rocket"></i>
                        <p>خروج</p></button>
                </form>

            </li>
        </ul>
    </div>
</div>
