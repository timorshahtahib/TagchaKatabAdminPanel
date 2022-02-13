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
                <a href="{{ route('push-notification') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>ارسال نوتیفیکیشن </p>
                </a>
            </li>

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('خروج') }}
                    <i class="pe-7s-right-arrow"></i>
                </a>
            </li>
            <li class="active-pro">
                <div >


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
