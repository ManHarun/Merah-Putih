<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/js/app.js'])
  @vite('resources/css/app.css')
</head>
<body>
    <x-navbar></x-navbar>
    {{ $slot }}
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>