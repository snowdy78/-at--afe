<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap demo</title>
<link href="/css/custom.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
<!-- Bootstrap Font Icon CSS -->
<link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
<script>
	if (!("<?echo $_COOKIE['user_id']?>"))
	{
		let path = window.location.pathname;
		let page = path.split('/').pop();
		if (page !== "login.php")
		{
			window.location = "login.php";
		}
	}
</script>