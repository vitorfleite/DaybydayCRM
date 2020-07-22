<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">
  <title>Smart Driving Labs - CRM</title>
  <link rel="stylesheet" href="{{ asset(elixir('css/vendor.css')) }}">
  <link rel="stylesheet" href="{{ asset(elixir('css/app.css')) }}">
  <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('css/picker.classic.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset(elixir('css/bootstrap-select.min.css')) }}">
</head>
<body>
<div id="wrapper">
  <calendar></calendar>
</div>
<script>
  window.trans = <?php
  // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
  try {
      $filename = File::get(resource_path() . '/lang/' . App::getLocale() . '.json');
  } catch (\Illuminate\Contracts\Filesystem\FileNotFoundException $e) {
      return;
  }
  $trans = [];
  $entries = json_decode($filename, true);
  foreach ($entries as $k => $v) {
      $trans[$k] = trans($v);
  }
  $trans[$filename] = trans($filename);
  echo json_encode($trans);
  ?>;
</script>
<script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/picker.js') }}"></script>

</body>
</html>
