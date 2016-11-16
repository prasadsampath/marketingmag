<?php
	include("../includes/header.php");
 ?>
	<!-- Container -->
	<div class="content-container">
		<div class="container admin-dashboard">
			<!-- Welcome text -->
	        <h3 class="welcome-text">Admin dashboard - Closure dates</h3>
	        <div class="col-sm-6 clearfix">
		        <div class="year-holder pull-left">
		        	<div class="form-group">
						<label for="fac_year">Choose Year</label>
						<select id="fac_year" name="fac_year" class="form-control">
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
							<option value="1999">1999</option>
							<option value="1998">1998</option>
							<option value="1997">1997</option>
							<option value="1996">1996</option>
							<option value="1995">1995</option>
							<option value="1994">1994</option>
							<option value="1993">1993</option>
							<option value="1992">1992</option>
							<option value="1991">1991</option>
						</select>
					</div>
		        </div>
		        <div class="date-holder pull-right">
		        	<div class="form-group">
			        	<label for="fac_date">Choose date</label>
		  				<input type="date" name="fac_date" id="fac_date" class="form-control">
		        	</div>
		        </div>	        	
	        </div>
		</div>
	</div>
 <?php
	include("../includes/footer.php");
 ?>