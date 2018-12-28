<!doctype html>
<html ng-app="app" ng-strict-di style="overflow:hidden">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test Mail Preview</title>
</head>
<body>
	<div style="padding-left: 20px">
		<h4>Mail List</h4>
	    @foreach($mails as $mail)
	        <div>
	            <a href="{{asset('mail-preview/'.$mail)}}">{{$mail}}</a>
	        </div>
	    @endforeach

	</div>
		
</body>
</html>