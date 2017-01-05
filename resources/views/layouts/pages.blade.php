<!--

     __   __   __  _________  __   __   __  __       __         _________   __          __
    / /  / /  / / / _______/ / /  / /  / / / /      / /        / _______/  / /         / /
   / /  / /  / / / /______  / /  / /  / /   / /    / /        / /         / / / /     / /
  / /  / /  / / / /______/ / /  / /  / /     / // /          / /         / /   / /   / /
 / /__/ /__/ / / /_______ / /__/ /__/ /   / /    / /    __  / /_______  / /     / / / /
 \__________/  \________/ \__________/   /_/      /_/  /_/ /_________/ /_/         /_/
 __________________________________________________________________________________________
                                                                                    wewe.cn
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title')微信小程序商店@show - WX小程序 - Powered by WxStore</title>
    <meta name="keywords" content="@section('keywords') @show小程序, 微信小程序, wewx, WX小程序, 开发, 教程, 推广, 微信应用号, 微信, 商店, 市场, 小程序商店, 小程序大全, 小程序发布站" />
    <meta name="author" content="WxStore" />
    <meta name="description" content="@section('description') WX小程序，微信小程序商店。您可以第一时间体验到最新最好的小程序。您可以在这里发布您的小程序，让你的小程序无人不知。 @show" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ cdn(elixir('css/app.css')) }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    @include('layouts.partials.header')

    @yield('content')

    <!-- Scripts -->
    <script src="{{ cdn(elixir('/js/app.js')) }}"></script>

    @include('layouts.partials.footer')
</div>


</body>
</html>
