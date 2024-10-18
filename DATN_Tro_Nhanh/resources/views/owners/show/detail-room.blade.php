@extends('layouts.owner')
@section('titleOwners', $data->title . ' | TRỌ NHANH')
@section('contentOwners')

  @livewire('room-detail', ['slug' => $data->slug])
@endsection

@push('styleOwners')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome-pro-5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.min.css') }}">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Invoice Listing">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="images/homeid-social-logo.png">
    <!-- Facebook -->
    <meta property="og:url" content="dashboard-invoice-listing.html">
    <meta property="og:title" content="Invoice Listing">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/homeid-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Chi tiết khu trọ tại TRỌ NHANH, bao gồm thông tin về tiện nghi, giá thuê, và vị trí. Tìm hiểu thêm về khu trọ và xem các thông tin quan trọng để đưa ra quyết định tốt nhất cho bạn.">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">
    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome-pro-5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.min.css') }}">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TroNanh">
    <meta name="twitter:creator" content="@TroNanh">
    <meta name="twitter:title" content="Chi Tiết Khu Trọ | TRỌ NHANH">
    <meta name="twitter:description"
        content="Chi tiết khu trọ tại TRỌ NHANH, bao gồm thông tin về tiện nghi, giá thuê, và vị trí. Tìm hiểu thêm về khu trọ và xem các thông tin quan trọng để đưa ra quyết định tốt nhất cho bạn.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Chi Tiết Khu Trọ | TRỌ NHANH">
    <meta property="og:description"
        content="Chi tiết khu trọ tại TRỌ NHANH, bao gồm thông tin về tiện nghi, giá thuê, và vị trí. Tìm hiểu thêm về khu trọ và xem các thông tin quan trọng để đưa ra quyết định tốt nhất cho bạn.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endpush
@push('scriptOwners')
    <!-- Vendors scripts -->
    <script src="{{ asset('assets/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/counter/countUp.js') }}"></script>
    <script src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropzone/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/hc-sticky/hc-sticky.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jparallax/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    {{-- <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script> --}}
    <!-- Theme scripts -->

    <script src="{{ asset('assets/js/theme.js') }}"></script>
    {{--  trả succces --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>
    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/alert-report.js') }}"></script> --}}
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Tùy chọn của Fancybox
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    {{-- <script>
         document.addEventListener('DOMContentLoaded', function() {
            var downloadButtons = document.querySelectorAll('.download-all-images');
            downloadButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var tenantId = this.getAttribute('data-tenant-id');
                    downloadImages(tenantId);
                });
            });
        });

        function downloadImages(tenantId) {
            var zip = new JSZip();
            var imagePromises = [];

            // Tìm tất cả các ảnh trong modal của tenant cụ thể
            var modal = document.getElementById('identityModal' + tenantId);
            var images = modal.querySelectorAll('img');

            images.forEach(function(img, index) {
                var imageUrl = img.src;
                var fileExtension = imageUrl.split('.').pop().split(/\#|\?/)[0];
                var imageName = 'anh_' + (index + 1) + '.' + fileExtension;

                imagePromises.push(
                    fetch(imageUrl)
                        .then(response => response.blob())
                        .then(blob => {
                            // Sử dụng MIME type của blob để xác định định dạng file
                            var mimeType = blob.type;
                            var fileExtension = mimeType.split('/')[1];
                            if (fileExtension === 'jpeg') fileExtension = 'jpg';
                            imageName = 'anh_' + (index + 1) + '.' + fileExtension;
                            return zip.file(imageName, blob);
                        })
                );
            });
            Promise.all(imagePromises).then(() => {
                zip.generateAsync({
                    type: 'blob'
                }).then(function(content) {
                    saveAs(content, '{{ $tenant->name }}_identity_images.zip');
                });
            });
        }
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var downloadButtons = document.querySelectorAll('.download-all-images');
            downloadButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var tenantId = this.getAttribute('data-tenant-id');
                    // Kiểm tra xem tenantId có tồn tại không
                    if (tenantId) {
                        downloadImages(tenantId);
                    } else {
                        alert('Không có thông tin người ở để tải ảnh.');
                    }
                });
            });
        });

        function downloadImages(tenantId) {
            var zip = new JSZip();
            var imagePromises = [];

            // Tìm tất cả các ảnh trong modal của tenant cụ thể
            var modal = document.getElementById('identityModal' + tenantId);
            if (!modal) {
                alert('Không tìm thấy modal cho tenant này.');
                return; // Dừng hàm nếu không tìm thấy modal
            }

            var images = modal.querySelectorAll('img');

            if (images.length === 0) {
                alert('Không có ảnh định danh để tải xuống.');
                return; // Dừng hàm nếu không có ảnh
            }

            images.forEach(function(img, index) {
                var imageUrl = img.src;
                var fileExtension = imageUrl.split('.').pop().split(/\#|\?/)[0];
                var imageName = 'anh_' + (index + 1) + '.' + fileExtension;

                imagePromises.push(
                    fetch(imageUrl)
                    .then(response => response.blob())
                    .then(blob => {
                        // Sử dụng MIME type của blob để xác định định dạng file
                        var mimeType = blob.type;
                        var fileExtension = mimeType.split('/')[1];
                        if (fileExtension === 'jpeg') fileExtension = 'jpg';
                        imageName = 'anh_' + (index + 1) + '.' + fileExtension;
                        return zip.file(imageName, blob);
                    })
                );
            });

            Promise.all(imagePromises).then(() => {
                zip.generateAsync({
                    type: 'blob'
                }).then(function(content) {
                    saveAs(content, '{{ $tenant->name ?? 'tenant' }}_identity_images.zip');
                });
            });
        }
    </script>
@endpush
