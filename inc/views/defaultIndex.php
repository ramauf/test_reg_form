<div id="content">

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-file-o"></i> <?php echo la::ng('Профиль');?> <span> </span></h1>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

						<ul class="header-dropdown-list">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="/design/img/flags/us.png"> <span> US </span> <i class="fa fa-angle-down"></i> </a>
								<ul class="dropdown-menu pull-right">
									<li class="active">
										<a href="?lang=en"><img alt="" src="/design/img/flags/us.png"> US</a>
									</li>
									<li>
										<a href="?lang=ru"><img alt="" src="/design/img/flags/ru.png"> RU</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">

					<div class="col-sm-12">


							<div class="well well-sm">

								<div class="row">

									<div class="col-sm-12 col-md-12 col-lg-6">
										<div class="well well-light well-sm no-margin no-padding">

											<div class="row">

												<div class="col-sm-12">
													<div id="myCarousel" class="carousel fade profile-carousel">

														<div class="air air-bottom-right padding-10">
															<a href="/logout" class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-power-off"></i> <?php echo la::ng('Выход');?></a>
														</div>
														<div class="air air-top-left padding-10">
															<h4 class="txt-color-white font-md"><?php echo date('Y-m-d H:i');?></h4>
														</div>
														<ol class="carousel-indicators">
															<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
															<li data-target="#myCarousel" data-slide-to="1" class=""></li>
															<li data-target="#myCarousel" data-slide-to="2" class=""></li>
														</ol>
														<div class="carousel-inner">
															<!-- Slide 1 -->
															<div class="item active">
																<img src="/design/img/demo/s1.jpg" alt="">
															</div>
															<!-- Slide 2 -->
															<div class="item">
																<img src="/design/img/demo/s2.jpg" alt="">
															</div>
															<!-- Slide 3 -->
															<div class="item">
																<img src="/design/img/demo/m3.jpg" alt="">
															</div>
														</div>
													</div>
												</div>

												<div class="col-sm-12">

													<div class="row">

														<div class="col-sm-3 profile-pic">
															<!--<img src="/design/img/avatars/sunny-big.png">-->
														</div>
														<div class="col-sm-6">
															<h1><?php echo $_SESSION['users']['firstName'];?> <span class="semi-bold"><?php echo $_SESSION['users']['lastName'];?></span>
															<br>
															<small><?php echo la::ng(usersModel::$userTypes[$_SESSION['users']['status']]);?></small></h1>

															<ul class="list-unstyled">
																<li>
																	<p class="text-muted">
																		<i class="fa fa-phone"></i>&nbsp;&nbsp; <span class="txt-color-darken"><?php echo $_SESSION['users']['phone'];?></span><span class="txt-color-darken"></span>
																	</p>
																</li>
																<li>
																	<p class="text-muted">
																		<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:<?php echo $_SESSION['users']['email'];?>"><?php echo $_SESSION['users']['email'];?></a>
																	</p>
																</li>
															</ul>

														</div>

													</div>

												</div>

											</div>


										</div>

									</div>
								<div class="col-sm-12 col-md-12 col-lg-6">     <?php if (!empty($_SESSION['users']['avatar'])) echo '<img src = "/images/'.$_SESSION['users']['avatar'].'" />';?></div>
								</div>

							</div>


					</div>

				</div>

			</div>