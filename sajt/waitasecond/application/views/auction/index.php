<!-- Using php to to cricle through the data and populate the page -->
		<div class="container">		
			<div class="row">
				<?php foreach ($auctions as $key ) { ?>
					<div class="col-lg-3 col-sm-6 col-md-6 pt-5">
						<div class="card text-center">
							<img class="card-img-top" src="<?php echo $key['img'] ?>" alt="Shoes">
							<div class="card-body pt-0">
								<h6 class="card-title border-bottom pb-2"><?php echo $key['title'] ?></h6>
								<h2 id="price<?php echo $key['ID'] ?>" class="card-title py-0"><?php echo $key['startPrice']; ?><i class="fa fa-eur" aria-hidden="true"></i></h2>
								<p id="id<?php echo $key['ID']; ?>" class="card-text border-top">1:22:10s</p>
								<form action="">
									<a href="<?php echo site_url('auctions/auctions/' . $key['ID']) ?>"><button type="button" class="btn btn-danger btn-block">Buy</button></a>
								</form>
								<script type="text/javascript">
									/*The price logic for the index page. It takes the current date and it calculates the price*/
									$(function()
										{
											var start = "<?php echo $key['startPrice'] ?>";
											var konacna = "<?php echo $key['reservePrice'] ?>";
											var dat = new Date(format("<?php echo $key['current'] ?>"));
											var last = new Date(format("<?php echo $key['duration'] ?>"));
											var cur = new Date("<?php echo date('m/d/Y'); ?>");
											var datMin = getMinutes(dat.getTime());
											var lastMin = getMinutes(last.getTime());
											var percentage = calculatePer(start,konacna,datMin,lastMin);
											var curMinut = getMinutes(cur.getTime());


											$("#price<?php echo $key['ID'] ?>").html(function()
												{
													return  parseFloat(calculatePrice(curMinut,lastMin,percentage,konacna)).toFixed(2)  + "<i class='fa fa-eur' aria-hidden='true'></i>"; 
												});

											$('#id<?php echo $key['ID'] ?>').html(function()
												{
													return "<h6 class='card-text border-top'>" + getDuration(lastMin,curMinut) + "</h6>";
												});

											function getDuration(last,cur)
											{
												var result = last - cur;
												var days = 0;
												var hours = 0;
												var minutes = 0;

												hours = result / 60;
												days = hours / 24;
												minutes = result - (hours * 60);
												hours = hours - (days * 24);

												if(minutes == 0)
												{
													return days + " d " + hours + " h left";
												}
												else if(hours == 0 && minutes == 0)
												{
													return days + " d left";
												}
												else
												{
													return days + " d " + hours + " h " + minutes + " min left";
												}
											}

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
						</div>
					</div>
					</div>
				<?php } ?>
			</div>
		</div>
