<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <!-- Styles -->
    <link defer href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css"
          rel="stylesheet"/>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div class="container">
    <div class="card mt-5 p-5">
        <form method="POST" action="{{ route('image_generate') }}" files="true" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" name="mobile_number" class="form-control"
                               value=""
                               data-validation="required">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control"
                               value=""
                               data-validation="required">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="form-control" data-validation="required" name="logo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Product 1</label>
                        <input type="text" name="product_titles[]" class="form-control"
                               value=""
                               data-validation="required">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Product 1 Image</label>
                        <input type="file" class="form-control" data-validation="required" name="product_images[]">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Product 2</label>
                        <input type="text" name="product_titles[]" class="form-control"
                               value=""
                               data-validation="required">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Product 2 Image</label>
                        <input type="file" class="form-control" data-validation="required" name="product_images[]">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-xs-12 mt-5">
                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
    $.validate();
</script>
</body>
</html>
