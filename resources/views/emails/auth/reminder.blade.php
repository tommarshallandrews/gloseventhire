<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{ Config::get('app.companyName') }} - Password Reset</h2>

		<div>
			To reset your password, click on the link below and complete this form:  <br><br>{{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>