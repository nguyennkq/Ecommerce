<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home | Sun Shopping</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('client/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('client.body.header')

    @yield('content')


    @include('client.body.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('client/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('client/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('client/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('client/mail/contact.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('client/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#header-carousel').on('slide', function(event) {
                let activeSlide = event.to;
                $(this).find('.carousel-item').removeClass('active');
                $(this).find('.carousel-item').eq(activeSlide).addClass('active');
            });
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function addToCart(id) {
            let product_name = $('#name').text();
            let color = $('input[name="color"]:checked').val();
            let size = $('input[name="size"]:checked').val();
            let quantity = $('#quantity').val();
            $.ajax({
                url: '{{ route('client.addToCart') }}',
                type: 'post',
                data: {
                    id: id,
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name
                },
                dataType: 'json',
                success: function(data) {

                }
            })
        }

        function cartView() {
            $.ajax({
                type: 'get',
                url: '{{ route('client.getCart') }}',
                dataType: 'json',
                success: function(response) {
                    let rows = "";
                    $.each(response.carts, function(key, value) {
                        rows += /*html*/ `
                        <tr>
                            <td class="align-middle"><img src="storage/${value.options.image}" alt="" style="width: 100px;">${value.name}</td>
                            <td class="align-middle">${value.price}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                        value="${value.qty}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">${value.options.color == null ? `...` : `${value.options.color}`}</td>
                            <td class="align-middle">${value.options.size == null ? `...` : `${value.options.size}`}</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-times"></i></button></td>
                        </tr>
                        `
                    });
                    $('#cart').html(rows);
                }
            })
        }
        cartView();
    </script>
</body>

</html>
