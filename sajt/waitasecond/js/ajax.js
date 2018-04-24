$(function()
	{
		$("#signIn").click(function()
			{
				event.preventDefault();
				var username = $("#lgUsername").val();
				var password = $("#lgPassword").val();
				var url = "http://localhost/waitasecond/index.php/auctions/login";

				$.ajax(
				{
					method: "post",
					url: url,
					data: {username:username,
							password:password},
					success: successFn,
					error: errorFn
				});

				function successFn(response)
					{
						location.reload();
					}

				function errorFn()
					{
					}
			});

		$("#signOut").click(function()
			{
				event.preventDefault();

				$.ajax(
				{
					method: "post",
					url: "http://localhost/waitasecond/index.php/auctions/logout",
					success: successFn,
					error: errorFn
				});

				function successFn(response)
					{
						location.reload();
					}

				function errorFn()
					{
					}
			});

		$("#create").click(function()
			{
				event.preventDefault();
				var title = $("#aTitle").val();
				var description = $("#aDescription").val();
				var startPrice = $("#aStartPrice").val();
				var reservePrice = $("#aStartPrice").val();
				var duration = $("#aDuration").val();

				$.ajax(
				{
					method: "post",
					url: "http://localhost/waitasecond/index.php/auctions/create",
					data: {title:title,
						description:description,
						startPrice:startPrice,
						reservePrice:reservePrice,
						duration:duration},
					success: successFn,
					error: errorFn
				});

				function successFn(response)
					{
						location.reload();
					}

				 function errorFn()
					{
					}
			});
	});