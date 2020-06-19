<?php if (isset($valid)) {
						echo $valid;
						} ?>
						
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" >
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" type="text" name="phone">
					</div>
					<div class="form-group">
						
						<label>Email Address</label>
						<input class="form-control" type="email" name="email" >
						<small><?php if (isset($valid_email)) {
						echo $valid_email;
						} ?></small>
							  
					</div>
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" name="username">
						
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" type="password" name="password">

					</div>		
					<div class="form-group">
    					<input class="form-control" type="file" name="photo1">
    					</div>
					</div>

					<div class="form-group">
    					<input class="form-control" type="file" name="photo2">
    					</div>
					</div>
					<div class="form-group">
						<input class="btn btn-outline-info" type="submit" name="submit" value="Sign Up">
					</div>