	$(function()
		{
			var start = "<?php echo $auctions['startPrice'] ?>";
			var konacna = "<?php echo $auctions['reservePrice'] ?>";
			var dat = new Date(format("<?php echo $auctions['current'] ?>"));
			var last = new Date(format("<?php echo $auctions['duration'] ?>"));
			var cur = new Date();
			var datMin = getMinutes(dat.getTime());
			var lastMin = getMinutes(last.getTime());
			var percentage = calculatePer(start,datMin,lastMin);
			var curMinut = getMinutes(0);
			$("#datepicker").datepicker({
				onSelect: function(date){
					$(".text").html(date);
					cur = new Date($(".text").text());
					curMinut = getMinutes(cur.getTime());

					if(curMinut <= lastMin && curMinut >= datMin)
					{
						$("#price").html(function()
							{
								return "<p>Price: " + calculatePrice(curMinut,lastMin,percentage).toFixed(2) + "</p>" + "<i class='fa fa-eur' aria-hidden='true'></i>"; 
							});
					}	
					else
					{
						$(".obracun").html("Auction is not active.");
					}
				}
			});
			
			function format(date)
			{
				var today = new Date(date);
				var dd = today.getDate();
				var mm = today.getMonth()+1;
				var yyyy = today.getFullYear();

				if(dd<10)
				{
					dd='0'+dd;
				}

				if(mm<10)
				{
					mm = '0'+mm;
				}

				today = mm+'/'+dd+'/'+yyyy;
				return today;
			}

			function getMinutes(Mili)
			{
				return (Mili / 1000)/60;
			}

			function calculatePrice(minutes,reserveminutes,percentage)
			{
				return (reserveminutes - minutes) * percentage;
			}

			function calculatePer(price,startminutes,reserveminutes)
			{
				return price / (reserveminutes - startminutes);
			}
		});