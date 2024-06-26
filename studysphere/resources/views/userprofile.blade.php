@include('components.webparts')

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
    
    @yield('header')
    @yield('sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
                            <h2>Kevin Anderson</h2>
                            <h3>Web Designer</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile Information</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Update Password</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Delete Account</button>
                                </li>
                            </ul>
                            
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Profile Information</h5>
                                    <p class="small fst-italic">{{ __("Update your account's profile information and email address.") }}</p>
                                    
                                    <form class="row g-3 needs-validation" method="post" action="{{ route('profile.update') }}">
                                        @csrf
                                        @method('patch')

                                        <div class="col-12">
                                            <x-input-label for="name" :value="__('Name')" class="form-label"/>
                                            <x-text-input id="name" name="name" type="text" class="form-control" required autofocus autocomplete="name" />
                                            <x-input-error :messages="$errors->get('Please, enter your name!')" class="invalid-feedback" />
                                        </div>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label" >Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                                <x-input-error :messages="$errors->get('Please enter your email.')" class="invalid-feedback" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <x-primary-button class="btn btn-primary w-100">
                                                {{ __('Update') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade profile-edit" id="profile-edit">
                                    <h5 class="card-title">Update Password</h5>
                                    <p class="small fst-italic">{{ __("Ensure your account is using a long, random password to stay secure.") }}</p>
                                    
                                    <form class="row g-3 needs-validation" method="post" action="{{ route('profile.update') }}">
                                        @csrf

                                        <div class="col-12">
                                            <x-input-label for="password" :value="__('Old Password')" class="form-label"/>
                                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('Please enter your password!')" class="invalid-feedback" />
                                        </div>

                                        <div class="col-12">
                                            <x-input-label for="password" :value="__('New Password')" class="form-label"/>
                                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('Please enter your password!')" class="invalid-feedback" />
                                        </div>

                                        <div class="col-12">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('Please confirm your password!')" class="invalid-feedback"/>
                                        </div>

                                        <div class="col-12">
                                            <x-primary-button class="btn btn-primary w-100">
                                                {{ __('Update') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="profile-settings">
                                    <h5 class="card-title">Delete Account</h5>
                                    <p class="small fst-italic">{{ __("Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.") }}</p>
                                    
                                    <form class="row g-3 needs-validation" method="post" action="{{ route('profile.update') }}">
                                        @csrf
                                        <div class="col-12">
                                            <x-primary-button class="btn btn-danger w-100">
                                                {{ __('Delete') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main-->    

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong
        >. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
    </footer>
    <!-- End Footer -->

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