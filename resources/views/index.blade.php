<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Clima Tempo</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </head>
    <body>
       <div class="container">
            <form id="search_form" name="search_form">
                <div class="mt-3 input-group mb-3">
                    <input type="text" class="form-control w-75" id="search_value" name="search_value" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                            <img src="{{asset('icons/search.png')}}" alt="" width="20">
                        </button>
                    </div>
                </div>
            </form>
            <div class="weather-locales">
                @include('locales')
            </div>
       </div>
    </body>
</html>