<!-- Here we have the sign up page. I am using powerful Codeigniter API to register an user and to show that I have mastered it -->
<div class="container mt-5">
	<div class="row">
		<div class="col-12 text-center">
			<a href="<?php echo site_url('auctions/index') ?>"><img class="rounded" src="/waitasecond/assets/brand/logo.png"></a>
		</div>
	</div>
	<div class="row mt-5 pt-5">
		<div class="col-md-6 col-sm-12">
			<h3 class="text-center">
				Sign Up
			</h3>
			<?php echo form_open('auctions/register'); ?>
				<div class="form-group">
					<label for="registerName">Name</label>
					<input type="text" id="registerName" class="form-control" name="registerName" placeholder="Enter your full namehere">
				</div>
				<div class="form-group">
					<label for="registerUsername">Username</label>
					<input type="text" id="registerUsername" class="form-control" name="registerUsername" placeholder="Enter your username here">
				</div>
				<div class="form-group">
					<label for="registerPassword">Password</label>
					<input type="password" id="registerPassword" class="form-control" name="registerPassword" placeholder="Enter your password here">
					<small>Your password should be long and diverse!/small>
				</div>
					<button type="submit" id="signUp" name="submit" class="btn btn-danger float-right">Sign Up</button>
			</form>
		</div>
		<div class="col-md-6 col-sm-12">
			<h3 class="text-center">
				Sign In
			</h3>
			<?php echo form_open('auctions/login'); ?>
				<div class="form-group">
					<label class="float-right">Username</label>
					<input type="text" id="lgUsername" class="form-control" name="lgUsername">
				</div>
				<div class="form-group">
					<label class="float-right">Password</label>
					<input class="form-control" id="lgPassword" type="password" name="lgPassword">
				</div>
				<div class="form-group" style="visibility: hidden;">
					<label>Placeholder</label>
					<input type="text" class="form-control" >
					<small>Enter placeholder</small>
				</div>
				<div class="col-6">
					<button type="submit" id="signIn" class="btn btn-danger">Sign In</button>
				</div>	
			</form>
		</div>
	</div>
</div>
