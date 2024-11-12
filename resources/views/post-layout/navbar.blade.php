<div class="nav-header bg-white shadow-xs border-0">
    <div class="nav-top">
        <a href="index.html"><span
                class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">ConnectMe.
            </span> </a>
    </div>

    <form action="#" class="float-left header-search">
        <div class="form-group mb-0 icon-input">
            <i class="fa fa-search font-sm text-grey-400"></i>
            <input type="text" placeholder="Start typing to search.."
                class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg">
        </div>
    </form>
    <a href="#" class="p-2 text-center ms-auto menu-icon" id="dropdownMenu3" data-bs-toggle="dropdown"
        aria-expanded="false"><span class="dot-count bg-warning"></span><i class="fa-regular fa-bell"></i></a>
        <li class="nav-item d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                {{-- <i class="fa fa-user me-sm-1"></i> --}}
                <form action="/logout" method="get">
                    @csrf
                    {{-- <span class="d-sm-inline d-none">Logout</span> --}}
                    <input type="submit" value="Logout" class="btn btn-outline-danger d-sm-inline d-none">
                </form>
            </a>
        </li>
    <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">
        <h4 class="fw-700 font-xss mb-4">Notification</h4>
        <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
            <img src="{{ asset('post_assets/images/user-8.png') }}" alt="user" class="w40 position-absolute left-0">
            <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Hendrix Stamp <span
                    class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 3 min</span></h5>
            <h6 class="text-grey-500 fw-500 font-xssss lh-4">There are many variations of pass..</h6>
        </div>
        <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
            <img src="{{ asset('post_assets/images/user-8.png') }}" alt="user" class="w40 position-absolute left-0">
            <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Goria Coast <span
                    class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 2 min</span></h5>
            <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>
        </div>

        <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
            <img src="{{ asset('post_assets/images/user-8.png') }}" alt="user" class="w40 position-absolute left-0">
            <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Surfiya Zakir <span
                    class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 1 min</span></h5>
            <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>
        </div>
        <div class="card bg-transparent-card w-100 border-0 ps-5">
            <img src="{{ asset('post_assets/images/user-8.png') }}" alt="user" class="w40 position-absolute left-0">
            <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Victor Exrixon <span
                    class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 30 sec</span></h5>
            <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>
        </div>
    </div>
    {{-- <a href="#" class="p-2 text-center ms-3 menu-icon chat-active-btn"><i
            class="fa-solid fa-bars"></i></a> --}}
    <div class="p-2 text-center ms-3 position-relative dropdown-menu-icon menu-icon cursor-pointer">
        <i class="fa-solid fa-gear"></i>
        <div class="dropdown-menu-settings switchcolor-wrap">
            <h4 class="fw-700 font-sm mb-4">Settings</h4>
            <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
            <ul>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="red" checked=""><i class="ti-check"></i>
                        <span class="circle-color bg-red" style="background-color: #ff3b30;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="green"><i class="ti-check"></i>
                        <span class="circle-color bg-green" style="background-color: #4cd964;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="blue" checked=""><i class="ti-check"></i>
                        <span class="circle-color bg-blue" style="background-color: #132977;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="pink"><i class="ti-check"></i>
                        <span class="circle-color bg-pink" style="background-color: #ff2d55;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="yellow"><i class="ti-check"></i>
                        <span class="circle-color bg-yellow" style="background-color: #ffcc00;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="orange"><i class="ti-check"></i>
                        <span class="circle-color bg-orange" style="background-color: #ff9500;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="gray"><i class="ti-check"></i>
                        <span class="circle-color bg-gray" style="background-color: #8e8e93;"></span>
                    </label>
                </li>

                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="brown"><i class="ti-check"></i>
                        <span class="circle-color bg-brown" style="background-color: #D2691E;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="darkgreen"><i class="ti-check"></i>
                        <span class="circle-color bg-darkgreen" style="background-color: #228B22;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="deeppink"><i class="ti-check"></i>
                        <span class="circle-color bg-deeppink" style="background-color: #FFC0CB;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="cadetblue"><i class="ti-check"></i>
                        <span class="circle-color bg-cadetblue" style="background-color: #5f9ea0;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="darkorchid"><i class="ti-check"></i>
                        <span class="circle-color bg-darkorchid" style="background-color: #9932cc;"></span>
                    </label>
                </li>
            </ul>

            <div class="card bg-transparent-card border-0 d-block mt-3">
                <h4 class="d-inline font-xssss mont-font fw-700">Header Background</h4>
                <div class="d-inline float-right mt-1">
                    <label class="toggle toggle-menu-color"><input type="checkbox"><span
                            class="toggle-icon"></span></label>
                </div>
            </div>
            <div class="card bg-transparent-card border-0 d-block mt-3">
                <h4 class="d-inline font-xssss mont-font fw-700">Menu Position</h4>
                <div class="d-inline float-right mt-1">
                    <label class="toggle toggle-menu"><input type="checkbox"><span
                            class="toggle-icon"></span></label>
                </div>
            </div>
            <div class="card bg-transparent-card border-0 d-block mt-3">
                <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                <div class="d-inline float-right mt-1">
                    <label class="toggle toggle-dark"><input type="checkbox"><span
                            class="toggle-icon"></span></label>
                </div>
            </div>

        </div>
    </div>


    <a href="#" class="p-0 ms-3 menu-icon"><img
            src="{{ asset('post_assets/images/profile-4.png') }}"
            alt="user" class="w40 mt--1"></a>

</div>
