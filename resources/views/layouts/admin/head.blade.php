    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/app.css" rel="stylesheet">

    <style>
        [v-cloak]>* {
            display: none;
        }

        [v-cloak]::before {
            position: relative;
            top: 10%;
            left: 35%;
            content: "";
            display: block;
            width: 150px;
            height: 150px;
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .cloak-fade:not([v-cloak]) {
            opacity: 0;
            -webkit-animation-name: cloak-fade-in;
            animation-name: cloak-fade-in;
            -webkit-animation-duration: .5s;
            animation-duration: .5s;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
        }

    </style>
