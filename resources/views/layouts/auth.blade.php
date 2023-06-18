<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="BCPS ERP Solution">
  <meta name="author" content="Md. Asif Iqbal">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('public/images/bcps.png') }}">
  <link href="{{ asset('css/icons/font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

  <!-- Styles -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
    }

    .wrapper {
      display: grid;
      grid-template: none;
      height: 100vh;
      justify-content: center;
      align-content: center;
    }

    .container {
      background: linear-gradient(#5f76e8, #4c5eba);
      font-family: 'Titillium Web', sans-serif;
      padding: 15px;
      border: 1px solid #4c5eba;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      /*min-width: 420px;*/
      min-height: 300px;
      display: grid;
      /*grid-template-columns: 1fr 1fr;*/
      grid-template-columns: 1fr;
      align-items: center;
    }

    .container .signup-icon {
      color: #fff;
      font-size: 13px;
      text-align: center;
      text-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      vertical-align: top;
      display: inline-block;
    }

    .container .signup-icon i {
      font-size: 124px;
      margin: 0 0 15px;
      display: block;
    }

    .container .signup-icon .signup a {
      color: #fff;
      text-transform: capitalize;
      transition: all 0.3s ease;
    }

    .container .signup-icon .signup a:hover {
      text-decoration: underline;
    }

    .form-login {
      background: rgba(255, 255, 255, 0.99);
      min-width: 300px;
      min-height: 340px;
      padding: 20px 30px;
      margin-top: -30px;
      margin-bottom: -30px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      display: grid;
      grid-template-columns: 1fr;
      justify-items: center;
    }

    .form-login .title {
      color: #000;
      font-size: 25px;
      font-weight: 600;
      text-transform: capitalize;
      padding: 10px 0px 10px 0px;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <div class="wrapper">
    @yield('content')
  </div>
</body>

</html>