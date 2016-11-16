<?php
	include("../includes/header.php");
 ?>
	<!-- Container -->
	<div class="content-container">
		<div class="container admin-dashboard">
			<!-- Welcome text -->
	        <h3 class="welcome-text">Admin dashboard - Users</h3>
	        <div class="sidebar-holder col-sm-3">
		        <div id="side-block" class="user-list-holder">
	                <div class="user-block active" id="block4">
	                    <a href="?userId=4">
	                        <p class="user-name"><span class="field-name">Name: </span>charitha madushan</p>
	                        <p class="faculty-name"><span class="field-name">Faculty: </span>MIT</p>
	                        <p class="user-role"><span class="field-name">User Role: </span>guest</p>
	                    </a>
	                </div>
	                <div class="user-block" id="block5">
	                    <a href="?userId=5">
	                        <p class="user-name"><span class="field-name">Name: </span>chathura priyasad</p>
	                        <p class="faculty-name"><span class="field-name">Faculty: </span>MIT</p>
	                        <p class="user-role"><span class="field-name">User Role: </span>guest</p>
	                    </a>
	                </div>
	            </div>	        	
	        </div>
            <div class="content-holder col-sm-9">
            <h4 class="sub-title">User Details</h4>
	            <div class="form-holder">
	                <form role="form" method="post" class="user-list-form">
	                	<div class="form-group">
	                        <label for="name">Name *:</label>
	                        <input type="text" class="form-control" name="first_name" id="name" disabled>
	                    </div>
	                    <div class="form-group">
	                        <label for="email">Email address *:</label>
	                        <input type="email" class="form-control" name="email" id="email" disabled>
	                    </div>
	                    <div class="form-group">
	                        <label for="faculty">Faculty *:</label>
	                        <select class="form-control" name="faculty" id="faculty" disabled>
	                        	
	                        </select>
	                    </div>
	                    <div class="form-group user-roles">
	                        <label for="uRole">User role *:</label>
	                        <select class="form-control" name="user_role" id="uRole"></select>
	                    </div>
	                    <div class="btn-holder">
	                    	<button type="submit" class="btn pull-left btn-danger" name="deny">Deny</button>
		                    <button type="submit" class="btn btn-primary pull-right" name="update">Update</button>
	                    </div>
	                </form>            
	            </div>
        </div>
		</div>
	</div>
 <?php
	include("../includes/footer.php");
 ?>