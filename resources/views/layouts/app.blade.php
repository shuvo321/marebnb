<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MareBnB &ndash; Administracijsko sučelje</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    @yield('content')

	<script>
    	window.Application = <?php echo json_encode([
        	'csrfToken' => csrf_token(),
    	]); ?>
	</script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
