<!DOCTYPE html>
<html>
<head>
    <title></title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container mt-4">
    <div class="row">
      <div class="col-md-8 offset-2">
        <div class="card">
          <div class="card-header bg-success text-white ">
            <strong>Search with Laravel Livewire - Nicesnippets.com</strong>
          </div>
          <div class="card-body">
            @livewire('search')
          </div>
        </div>
      </div>
    </div>
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
@livewireScripts
</html>
