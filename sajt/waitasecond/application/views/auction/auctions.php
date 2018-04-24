		<div class="container mt-5">
			<div class="row ">
				<div class="col-md-5">
					<div class="card">
						<img class="rounded border card-img-top" src="/waitasecond/assets/images/maglia.png">
					</div>
				</div>
				<div class="col-md-3  text-center bg-light">
					<h3 class="mt-2 text-center"><?php echo $auctions['title'] ?></h3><br>
					<div class="float-left">Estimated Price:</div><div id="price"></div><br><br>
					<div class="float-left">Start Price:</div>
					<div class="d-inline-flex float-right"><?php echo $auctions['startPrice'] ?><i class="fa fa-eur" aria-hidden="true"></i></div><br><br>
					<div class="float-left">Reserve Price:</div>
					<div class="d-inline-flex float-right mb-lg-5"><?php echo $auctions['reservePrice'] ?><i class="fa fa-eur" aria-hidden="true"></i></div><br><br>
					
					<div class="text" style="visibility: hidden;">Here comes date
					</div>
					<button class="mt-lg-5 obracun btn btn-danger btn-block">Auction is active.</button>
				</div>
				<div class="col-12 col-md-2 offset-md-2 mt-5">
					<div class="ml-md-5 ml-2 pl-md-5" id="datepicker"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 mt-5 bg-light">
					<h5 class="card-title pt-2 px-2">Description:</h5>
					<p class="card-text  p-2"><?php echo $auctions['description'] ?></p>
				</div>
			</div>
		</div>
<script type="text/javascript">
	//Calendar script that calculates the estimated price. It isn't at the bottom of the page, in the footer, because I do not want to load it with other pages.
	$(function()
		{
			var start = "<?php echo $auctions['startPrice'] ?>";
			var konacna = "<?php echo $auctions['reservePrice'] ?>";
			var dat = new Date(format("<?php echo $auctions['current'] ?>"));
			var last = new Date(format("<?php echo $auctions['duration'] ?>"));
			var cur = new Date();
			var datMin = getMinutes(dat.getTime());
			var lastMin = getMinutes(last.getTime());
			var percentage = calculatePer(start,konacna,datMin,lastMin);
			var curMinut = getMinutes(0);
			$("#datepicker").datepicker({
				onSelect: function(date){
					$(".text").html(date);
					cur = new Date($(".text").text());
					curMinut = getMinutes(cur.getTime());

					if(curMinut <= lastMin && curMinut >= datMin)
					{
						if(calculatePrice(curMinut,lastMin,percentage,konacna).toFixed(2) >= 0 && curMinut != lastMin)
						{
							$("#price").html(function()
							{
								return "<div class='d-inline-flex float-right'>" + parseFloat(calculatePrice(curMinut,lastMin,percentage,konacna)).toFixed(2) + "<i class='fa fa-eur' aria-hidden='true'></i></div>"; 
							});
							$(".obracun").html("Auction is active.");
						}
						else
						{
							$(".obracun").html("Auction is finished.");
						}
					}
					else if(curMinut <= datMin)
					{
						$(".obracun").html("Auction is not started yet.");
					}	
					else
					{
						$(".obracun").html("Auction is finished.");
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

			function calculatePrice(minutes,reserveminutes,percentage,reserveprice)
			{
				var result = parseFloat((reserveminutes - minutes - 1440) * percentage)+ parseFloat(reserveprice);;
				 
				return result;
			}

			function calculatePer(price,reserve,startminutes,reserveminutes)
			{
				return (price-reserve) / (reserveminutes - startminutes)
			}
		});
</script>