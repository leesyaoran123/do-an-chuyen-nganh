<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
     $category =$db->fetchAll("category");
     $sqlNew ="SELECT * FROM product where 1 ORDER BY ID DESC LIMIT 3";
     $productNew=$db->fetchsql($sqlNew);
      $sqlPay="SELECT * FROM product Where 1 ORDER BY PAY DESC LIMIT 3";
     $productPay= $db->fetchsql($sqlPay);

 ?>


<?php require_once ("layout/header.php");  ?>
 <div class="col-md-9 ">
	<div class="container">
		<div id="content">
			
			</div>

			<div class="space50">&nbsp;</div>
			<hr />
			<div class="space50">&nbsp;</div>
			<h2 class="text-center wow fadeInDown">Our Passion for What We Do Transfers Into Our Services</h2>
			<div class="space20">&nbsp;</div>
			<p class="text-center wow fadeInLeft">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br /> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
			<div class="space35">&nbsp;</div>

			<div class="row">
				<div class="col-sm-2 col-sm-push-2">
					<div class="beta-counter">
						<p class="beta-counter-icon"><i class="fa fa-user"></i></p>
						<p class="beta-counter-value timer numbers" data-to="250000" data-speed="2000">250000 </p>
						<p class="beta-counter-title">FaceBook User</p>
					</div>
				</div>

				<div class="col-sm-2 col-sm-push-2">
					<div class="beta-counter">
						<p class="beta-counter-icon"><i class="fa fa-picture-o"></i></p>
						<p class="beta-counter-value timer numbers" data-to="1500" data-speed="2000">1500</p>
						<p class="beta-counter-title">Shop</p>
					</div>
				</div>

				<div class="col-sm-2 col-sm-push-2">
					<div class="beta-counter">
						<p class="beta-counter-icon"><i class="fa fa-shopping-cart"></i></p>
						<p class="beta-counter-value timer numbers" data-to="2589340" data-speed="2000">2589340</p>
						<p class="beta-counter-title">Product Sale</p>
					</div>
				</div>

				<div class="col-sm-2 col-sm-push-2">
					<div class="beta-counter">
						<p class="beta-counter-icon"><i class="fa fa-pencil"></i></p>
						<p class="beta-counter-value timer numbers" data-to="7" data-speed="2000">7</p>
						<p class="beta-counter-title">Country</p>
					</div>
				</div>
			</div> <!-- .beta-counter block end -->

			<div class="space50">&nbsp;</div>
			<hr />
			<div class="space50">&nbsp;</div>

			<h2 class="text-center wow fadeInDownwow fadeInDown">Our Amaizing Team</h2>
			<div class="space20">&nbsp;</div>
			<h5 class="text-center other-title wow fadeInLeft">Founders</h5>
			<p class="text-center wow fadeInRight">Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia <br />consequuntur magni dolores.</p>
			<div class="space20">&nbsp;</div>
			<div class="row">
				<div class="col-sm-6 wow fadeInLeft">
					<div class="beta-person media">
					
						<img class="pull-left" src="assets/dest/images/person2.jpg" alt="">
					
						<div class="media-body beta-person-body">
							<h5>Bob Robertson</h5>
							<p class="font-large">Founder</p>
							<p>Nemo enim ipsam voluptatem quia voluptas sit asatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque por quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
							<a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 wow fadeInRight">
					<div class="beta-person media ">
					
						<img class="pull-left" src="assets/dest/images/person3.jpg" alt="">
					
						<div class="media-body beta-person-body">
							<h5>Mike Greenwood</h5>
							<p class="font-large">Founder</p>
							<p>Nemo enim ipsam voluptatem quia voluptas sit asatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque por quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
							<a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="space60">&nbsp;</div>
			<h5 class="text-center other-title wow fadeInDown">The Best of Professionals</h5>
			<p class="text-center wow fadeInUp">Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia <br />consequuntur magni dolores.</p>
			<div class="space20">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="beta-person beta-person-full">
				<div class="bets-img-hover">
						<img src="assets/dest/images/person1.jpg" alt="">
				</div>
						<div class="beta-person-body">
							<h5>Mark Priston</h5>
							<p class="font-large">Web developer</p>
							<p>Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia consequuntur magni dolores.</p>
							<a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="beta-person beta-person-full">
					<div class="bets-img-hover">
						<img src="assets/dest/images/person2.jpg" alt="">
					</div>
						<div class="beta-person-body">
							<h5>Bob Robertson</h5>
							<p class="font-large">Web developer</p>
							<p>Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia consequuntur magni dolores.</p>
							<a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="beta-person beta-person-full">
					<div class="bets-img-hover">
						<img src="assets/dest/images/person3.jpg" alt="">
					</div>
						<div class="beta-person-body">
							<h5>Mike Greenwood</h5>
							<p class="font-large">Web developer</p>
							<p>Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia consequuntur magni dolores.</p>
							<a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="beta-person beta-person-full">
					<div class="bets-img-hover">	
						<img src="assets/dest/images/person4.jpg" alt="">
					</div>
						<div class="beta-person-body">
							<h5>David Black</h5>
							<p class="font-large">Web developer</p>
							<p>Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia consequuntur magni dolores.</p>
							<a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
</div>
	<?php require_once ("layout/footer.php"); ?>