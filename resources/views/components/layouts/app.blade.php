<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.11.1/font/bootstrap-icons.css">

    </head>
    <body>
        <div class="container">
            <h3 class=" mt-3">Simple Laravel 11 CRUD Application
                Tutorial</h3>
            @auth
                <div>
                <a href="/logout" class="btn btn-danger btn-sm my-2">
                    <i class="bi bi-plus-circle"></i> Logout</a>
                </div>
            @endauth
            {{ $slot }}
            <div class="row justify-content-center text-center mt-3">
            <div class="col-md-12">
                <p>
                    Return to Website: <a href="https://www.usjr.edu.ph/"><strong>University of San Jose - Recoletos</strong></a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
