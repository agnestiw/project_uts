<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>My News</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets_h/img/newspaper.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets_h/img/newspaper.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets_h/img/newspaper.png">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="assets_h/img/favicons/favicon.ico">
    <link rel="manifest" href="assets_h/img/favicons/manifest.json"> --}}
    <meta name="msapplication-TileImage" content="assets_h/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="vendors/prism/prism.css" rel="stylesheet">
    <link href="vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets_h/css/theme.css" rel="stylesheet" />
    <link href="assets_h/css/user.css" rel="stylesheet" />

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container">
                <h1 class="fw-bold text-white fs-5 fs-xl-6">My News</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><i
                        class="fa-solid fa-bars text-white fs-3"></i></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="/about">About</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="/news">News</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="{{ route('post.index') }}">Post</a></li>
                        <li class="nav-item mt-2 mt-lg-0"><a
                                class="nav-link btn btn-light text-black w-md-25 w-50 w-lg-100" aria-current="page"
                                href="/auth-page">Log In</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="bg-dark"><img class="img-fluid position-absolute end-0" src="assets_h/img/hero/hero-bg.png"
                alt="" />


            <!-- ============================================-->
            <!-- <section> begin ============================-->
            <section>

                <div class="container">
                    <div class="row align-items-center py-lg-8 py-6">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white fs-5 fs-xl-6">Temukan dunia baru di setiap halaman buku.</h1>
                            <p class="text-white py-lg-3 py-2">"The only thing that you absolutely have to know is the
                                location of the library."</p>
                            <div class="d-sm-flex align-items-center gap-3">
                                <a class="fw-bold btn btn-outline-success mb-3 w-75" href="/auth-page">Log In</a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end mt-3 mt-lg-0"><img class="img-fluid"
                                src="assets_h/img/hero/hero-graphics.png" alt="" /></div>
                    </div>
                    <div class="swiper">
                        <div class="swiper-container swiper-shadow swiper-theme"
                            data-swiper='{"slidesPerView":2,"breakpoints":{"640":{"slidesPerView":2,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":40},"992":{"slidesPerView":5,"spaceBetween":40},"1024":{"slidesPerView":4,"spaceBetween":50},"1025":{"slidesPerView":6,"spaceBetween":50}},"spaceBetween":10,"grabCursor":true,"pagination":{"el":".swiper-pagination","clickable":true},"loop":true,"freeMode":true,"autoplay":{"delay":2500,"disableOnInteraction":false}}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide text-center"><img src="assets_h/img/logos/boldo.png"
                                        alt="" /></div>
                                <div class="swiper-slide text-center"><img src="assets_h/img/logos/presto.png"
                                        alt="" /></div>
                                <div class="swiper-slide text-center"><img src="assets_h/img/logos/boldo.png"
                                        alt="" /></div>
                                <div class="swiper-slide text-center"><img src="assets_h/img/logos/presto.png"
                                        alt="" /></div>
                                <div class="swiper-slide text-center"><img src="assets_h/img/logos/boldo.png"
                                        alt="" /></div>
                                <div class="swiper-slide text-center"><img src="assets_h/img/logos/presto.png"
                                        alt="" /></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of .container-->

            </section>
            <!-- <section> close ============================-->
            <!-- ============================================-->


        </div>

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pb-0">
            <div class="container">
                <p class="text-center text-gray fs-1">Our Blog</p>
                <h2 class="mx-auto text-center fs-lg-6 fs-md-5 w-lg-75">Value proposition accelerator product
                    management venture</h2>
                <div class="row mt-7 gx-xl-7" id="newsContainer">
                    <!-- News articles will be inserted here -->
                </div>
                <div class="text-center mb-3">
                    <a class="btn btn-outline-dark" href="https://www.bloomberg.com/asia" target="_blank">Load
                        More</a>
                </div>
            </div><!-- end of .container -->
        </section><!-- <section> close ============================-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const apiKey = '38391f076fea47a7bfc0f366667d8c32';
                const url = `https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=${apiKey}`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        const articles = data.articles;
                        const newsContainer = document.getElementById('newsContainer');

                        articles.forEach(article => {
                            const articleElement = document.createElement('div');
                            articleElement.classList.add('col-md-4', 'text-center', 'text-md-start',
                                'h-auto', 'mb-5');

                            articleElement.innerHTML = `
                                        <div class="d-flex justify-content-between flex-column h-100">
                                            <a href="${article.url}" target="_blank">
                                                <img class="w-75 w-md-100 rounded-2" src="${article.urlToImage || 'default-image.png'}" alt="${article.title}" />
                                            </a>
                                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mt-3">
                                                <a href="#">
                                                    <p class="fw-bold mb-0 text-black">Category</p>
                                                </a>
                                                <p class="mb-0">${new Date(article.publishedAt).toLocaleDateString()}</p>
                                            </div>
                                            <a href="${article.url}" target="_blank">
                                                <h5 class="mt-1 mb-3 fs-0 fs-md-1">${article.title}</h5>
                                            </a>
                                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                                                <img class="img-fluid" src="assets_h/img/blog/profile1.png" alt="" />
                                                <a href="#">
                                                    <p class="mb-0 text-gray">${article.source.name}</p>
                                                </a>
                                            </div>
                                        </div>
                                    `;

                            newsContainer.appendChild(articleElement);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching the news:', error);
                        document.getElementById('newsContainer').innerHTML =
                            '<p>Failed to load news. Please try again later.</p>';
                    });
            });
        </script>
        <!-- <section> close ============================-->
        <!-- ============================================-->
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="bg-dark pt-6">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-sm-12">
                    <h3 class="text-white fw-bold fs-5 fs-xl-6">My News</h3>
                    <p class="w-lg-75 text-gray">Social media validation business model canvas graphical user interface
                        launch party creative facebook iPad twitter.</p>
                </div>
                <div class="col-lg-2 col-sm-4">
                    <h3 class="text-white fw-bold fs-1 mt-5 mb-4">Landings</h3>
                    <ul class="list-unstyled">
                        <li class="my-3 col-md-4"><a href="#">Home</a></li>
                        <li class="my-3"><a href="#">Products</a></li>
                        <li class="my-3"><a href="#">Services</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-4">
                    <h3 class="text-white fw-bold fs-1 mt-5 mb-4">Company</h3>
                    <ul class="list-unstyled">
                        <li class="my-3"><a href="#">Home</a></li>
                        <li class="my-3"><a href="#">Careers</a><span
                                class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">Hiring!</span></li>
                        <li class="my-3"><a href="#">Services</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-4">
                    <h3 class="text-white fw-bold fs-1 mt-5 mb-4">Resources</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a href="#">Home</a></li>
                        <li class="mb-3"><a href="#">Products</a></li>
                        <li class="mb-3"><a href="#">Services</a></li>
                    </ul>
                </div>
            </div>
            <p class="text-gray">All rights reserved.</p>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/prism/prism.js"></script>
    <script src="vendors/swiper/swiper-bundle.min.js"></script>
    <script src="assets_h/js/theme.js"></script>

</body>

</html>
