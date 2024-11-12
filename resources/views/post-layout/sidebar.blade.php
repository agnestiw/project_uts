<nav class="navigation scroll-bar">
    <div class="container ps-0 pe-0">
        <div class="nav-content">
            <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                <ul class="mb-1 top-content">
                    <li class="logo d-none d-xl-block d-lg-block"></li>
                    <li><a href="{{ route('post.index') }}" class="nav-content-bttn open-font"><i
                                class="fa fa-home btn-round-md bg-blue-gradiant me-3"></i><span>Home</span></a>
                    </li>
                    <li><a href="default-badge.html" class="nav-content-bttn open-font"><i
                                class="fa fa-star btn-round-md bg-red-gradiant me-3"></i><span>Badges</span></a>
                    </li>
                    <li><a href="default-storie.html" class="nav-content-bttn open-font"><i
                                class="fa fa-globe btn-round-md bg-gold-gradiant me-3"></i><span>Explore
                                Stories</span></a></li>
                    <li><a href="default-group.html" class="nav-content-bttn open-font"><i
                                class="fa fa-fire btn-round-md bg-mini-gradiant me-3"></i><span>Popular
                                Groups</span></a></li>
                    <li><a href="{{ route('user.profile', ['username' => Auth::user()->name, 'id' => Auth::user()->id]) }}" class="nav-content-bttn open-font"><i
                                class="fa fa-user btn-round-md bg-primary-gradiant me-3"></i><span>My
                                Profile </span></a></li>
                </ul>
            </div>

            <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2">
                <div class="nav-caption fw-600 font-xssss text-grey-500"><span>More </span>Pages</div>
                <ul class="mb-3">
                    {{-- @foreach ($navbar as $ite --}}
                        <li><a href="default-email-box.html" class="nav-content-bttn open-font"><i
                                    class="font-xl text-current fa fa-inbox me-3"></i><span>awdawad</span><span
                                    class="circle-count bg-warning mt-1">584</span></a></li>
                     {{-- @endforeach --}}
                </ul>
            </div>

            <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Account</div>
                <ul class="mb-1">
                    <li class="logo d-none d-xl-block d-lg-block"></li>
                    <li><a href="default-settings.html" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i
                                class="font-sm fa fa-cogs me-3 text-grey-500"></i><span>Settings</span></a>
                    </li>
                    <li><a href="default-analytics.html" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i
                                class="font-sm fa fa-line-chart me-3 text-grey-500"></i><span>Analytics</span></a>
                    </li>
                    <li><a href="default-message.html" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i
                                class="font-sm fa fa-comment-alt me-3 text-grey-500"></i><span>Chat</span><span
                                class="circle-count bg-warning mt-0">23</span></a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>
