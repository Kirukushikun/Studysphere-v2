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

    <style>
        .icon{
            cursor: pointer;
            transition: 0.3s;
            border-style:none;
            background-color:transparent;            
        }
        .icon:hover{
            transform: scale(1.2);
        }
        .red{
            color: red;
        }
        .green{
            color: green;
        }
    </style>
</head>
<body>

    @yield('header')
    @yield('sidebar-comments')

    <main id="main" class="main">
        <div class="pagetitle position-relative">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
            
        </div>
        <!-- End Page Title -->
        @foreach($posts as $post)
            <section class="section">
                <div class="card m-auto mb-3">
                    <div class="card-body mb-4">
                        <h3 class="card-title">{{$post->subject}}</h3>
                        {{$post->post}}
                    </div>
                    <div class="card-footer">
                        <h5 class="card-subtitle mb-3 text-muted"><b>Comments:</b></h5>
                        <!-- Display Comments -->
                        @foreach($post->comments as $comment)
                            @if ($comment->status == 'approved')
                                <div class="comment ms-3 mb-4">
                                    <div class="profile d-flex justify-content-between">
                                        <div class="details d-flex">
                                            <i class="bi bi-person-circle me-2"></i>
                                            <h5>{{ $comment->author_name }}</h5>
                                        </div>
                                        <div class="action d-flex" style="font-size:25px;">
                                            
                                            <form action="{{route('comment.delete', $comment->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="icon">
                                                    <i class='trash bx bx-trash'></i>
                                                </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            @endif
                        @endforeach
                        <!-- End Comments -->
                    </div>
                    <div class="card-footer">
                        <h5 class="card-subtitle mb-3 text-muted"><b>Pending Comments:</b></h5>
                        <!-- Display Comments -->
                        @foreach($post->comments as $comment)
                            @if ($comment->status == 'pending')
                                <div class="comment ms-3 mb-4">
                                    <div class="profile d-flex justify-content-between">
                                        <div class="details d-flex">
                                            <i class="bi bi-person-circle me-2"></i>
                                            <h5>{{ $comment->author_name }}</h5>
                                        </div>
                                        <div class="action d-flex" style="font-size:25px; gap: 5px;">
                                            <form action="{{route('comment.update', $comment->id)}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="icon" >
                                                    <i class='icon green bx bx-check' ></i>
                                                </button>                                                
                                            </form>
                                            <form action="{{route('comment.delete', $comment->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="icon">
                                                    <i class='icon red bx bx-x' ></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            @endif
                        @endforeach
                        <!-- End Comments -->
                    </div>
                </div>
            </section>
        @endforeach
    </main>
    <!-- End #main -->

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