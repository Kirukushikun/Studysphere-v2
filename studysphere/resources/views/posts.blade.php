<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/dashboard" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="" />
                <span class="d-none d-lg-block">Laravel</span>
            </a>
        </div>
        <!-- End Logo -->
        <nav class="header-nav ms-auto">
            @auth
                <ul class="d-flex align-items-center">
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                        </a>
                        <!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>{{ Auth::user()->name }}</h6>
                                <span>Web Designer</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <x-responsive-nav-link :href="route('profile.edit')" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-gear"></i>
                                    <span>
                                        {{ __('Profile') }}
                                    <span>
                                </x-responsive-nav-link>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout')}}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')" class="dropdown-item d-flex align-items-center"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>{{ __('Log Out') }}</span>
                                    </x-responsive-nav-link>                               
                                </form>
                            </li>
                        </ul>
                        <!-- End Profile Dropdown Items -->
                    </li>
                </ul>
            @else
                <button type="button" class="btn btn-outline-primary me-3" onclick="location.href='login'"><b>Login</b></button>
            @endauth
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->
    <br>
    <br>
    <br>
    <br>

    @foreach($posts as $post)
        <div class="card m-auto mb-5 col-9">
            <div class="card-body">
                <h4 class="card-title">{{$post->subject}}</h4>
                <h5 class="card-subtitle mb-3 text-muted"><b>Author: </b>{{$post->author_name}}</h5>
                <p>{{$post->post}}</p>
            </div>
            <div class="card-footer">
                <h5 class="card-subtitle mb-3 text-muted"><b>Comments:</b></h5>
                <!-- Comment -->
                @foreach($post->comments as $comment)
                    @if ($comment->status == 'approved')
                        <div class="comment ms-3 mb-4">
                            <div class="profile d-flex">
                                <i class="bi bi-person-circle me-2"></i>
                                <h5>{{ $comment->author_name }}</h5>
                            </div>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    @endif
                @endforeach
                <!-- End Comment -->
                <hr>
                <form action="{{route('comment.post')}}" method="POST">
                    @csrf
                    <div class="form-group d-flex">
                        <input type="hidden" value="{{$post->id}}" name="post">
                        <input type="text" class="form-control me-2" name="comment" placeholder="Enter a Comment" required>
                        <button class="btn btn-primary" type="submit">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach


    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>