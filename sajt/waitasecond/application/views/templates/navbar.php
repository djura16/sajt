<!-- The navbar of the page. Login and logout logic with sessions is done through php -->
<div class="container-fluid bg-light border-bottom rounded-bottom px-0">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="<?php echo site_url('auctions/index'); ?>">
				<img class="rounded" src="/waitasecond/assets/brand/logo.png" width="30" height="30" alt="">
			</a>
			<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation" type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">
				<span class="navbar-toggler-icon"></span>
			</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDopdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a href="#" class="dropdown-item">Pants</a>
						<a href="#" class="dropdown-item">Shoes</a>
						<a href="#" class="dropdown-item">Jackets</a>
						<a href="#" class="dropdown-item">T-Shirts</a>
					</div>
				</li>
				<?php if($_SESSION['logged_in']== 'true'){ ?>
				<li class="nav-item active">
					<a class="nav-link" href="" data-toggle="modal" data-target="#createModal">Create an auction</a>
				</li>
				<?php } ?>

			</ul>
			<?php if($_SESSION['logged_in'] == 'false') { ?>
			<ul class="nav navbar-nav pr-2">
				<li class="nav-item d-none d-sm-block my-auto">
					<i class="fa fa-user" aria-hidden="true"></i>
				</li>
				<li class="nav-item active mr-3">
					<a class="nav-link" href="<?php echo site_url('auctions/register') ?>">Sign Up</a>
				</li>
				<li class="nav-item d-none d-sm-block my-auto">
					<i class="fa fa-sign-in" aria-hidden="true"></i>
				</li>
				<li class="nav-item active">
					<a id="login" data-toggle="modal" data-target="#loginModal" class="nav-link" href=''>Login</a>
				</li>
			</ul>
			<?php } else{ ?>
			<ul class="nav navbar-nav pr-2">
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" id="logoutMenu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></a>
					<div class="dropdown-menu" aria-labelledby="logoutMenu">
						<a id="signOut" href="<?php echo site_url('/auctions/logout') ?>" class="dropdown-item">Logout</a>
					</div>
				</li>
			</ul>
			<?php } ?>
			</div>
		</nav>
	</div>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
    		<div class="modal-header">
        		<h5 class="modal-title" id="loginModalLabel">Sign In</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
      				<?php echo validation_errors(); ?>
					<?php echo form_open('auctions/login'); ?>
					<div class="form-group">
						<label for="loginName">Username</label>
						<input type="text" class="form-control" id="lgUsername" name="lgUsername" placeholder="Enter your username here...">
					</div>
					<div class="form-group">
						<label for="loginPassword">Password</label>
						<input type="password" class="form-control" id="lgPassword" name="lgPassword" placeholder="Enter your password here...">
					</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="submit" name="submit" id="signIn" class="btn btn-danger">Submit</button>
      		</div>
      		</form>
   		 </div>
 	 </div>
</div>
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
    		<div class="modal-header">
        		<h5 class="modal-title" id="createModalLabel">Create an auction:</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
      				<?php echo validation_errors(); ?>
					<?php echo form_open('auctions/create'); ?>
					<div class="form-group">
						<label for="aTitle">Auction title:</label>
						<input type="text" class="form-control" id="aTitle" name="aTitle" placeholder="Enter your title here...">
					</div>
					<div class="form-group">
						<label for="aDescription">Auction description:</label>
						<input type="text" class="form-control" id="aDescription" name="aDescription" placeholder="Enter your description here...">
					</div>
					<div class="form-group">
						<label for="aStartPrice">Auction start price:</label>
						<input type="text" id="aStartPrice" name="aStartPrice" class="form-control" placeholder="Enter start price your here">
					</div>
					<div class="form-group">
						<label for="aReservePrice">Auction reserve price:</label>
						<input type="text" id="aReservePrice" name="aReservePrice" class="form-control" placeholder="Enter reserve price your here">
					</div>
					<div class="form-group">
						<label for="aDuration">Auction duration:</label>
						<input type="date" id="aDuration" name="aDuration" class="form-control">
					</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="submit" id="create" name="submit" class="btn btn-danger">Submit</button>
      		</div>
      		</form>
   		 </div>
 	 </div>
</div>