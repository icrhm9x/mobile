@extends('client.layouts.master',['title' => 'Checkout'])
@section('content')
    		<!-- breadcrumbs area start -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="index.html">Home</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Checkout</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- START MAIN CONTAINER -->
		<div class="main-container">
			<div class="product-cart">
				<div class="container">		
					<div class="row">
						<div class="checkout-content">	
							<div class="col-md-9 check-out-blok">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel checkout-accordion">
										<div class="panel-heading" role="tab" id="headingOne">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#checkoutMethod" aria-expanded="true" aria-controls="checkoutMethod">
													<span>1</span> Checkout method
												</a>
											</h4>
										</div>
										<div id="checkoutMethod" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="content-info">
												<div class="col-md-6">
													<div class="checkout-reg">
														<div class="checkReg commonChack">
															<div class="checkTitle">
																<h2 class="ct-design">CHECKOUT AS A GUEST OR REGISTER</h2>
															</div>
															<p>Register with us forfuture convenience</p>
															<div class="reginputlabel">
																<input type="radio">&nbsp;&nbsp;<label>Checkout as Guest</label><br>
																<input type="radio">&nbsp;&nbsp;<label>Register</label>
															</div>
															<p class="savetime">Register and save time!</p>
														</div>
														<div class="regSaveTime commonChack">
															<p>Register with us for future convenience:</p>
															<ul class="reginputlabel">
																<li>Fast and easy checkout</li>
																<li>Easy access to your history and status</li>
															</ul>
														</div>


														<a href="#" class="checkPageBtn">CONTINUE</a>
													</div>
												</div>
												<div class="col-md-6">
													<div class="checkout-login">
															<div class="checkTitle">
																<h2 class="ct-design">Login</h2>
															</div>
														<p class="alrdyReg">Already registered?</p>
														<p class="plxLogin">Please log in below:</p>
														<div class="loginFrom">
															<p class="plxLoginP"><span>*</span> Email Address</p>
															<input type="text"><br>
															<p class="plxLoginP"><span>*</span> Password</p>
															<input type="text">
															<p class="plxrequired"><span>*</span> Required Field</p>
															<p class="fgetpass">Forgot your password ?</p>
														</div>
														<a href="#" class="checkPageBtn">Login</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel checkout-accordion">
										<div class="panel-heading" role="tab" id="headingTwo">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#billingInformation" aria-expanded="false" aria-controls="billingInformation">
													<span>2</span> Billing Information
												</a>
											</h4>
										</div>
										<div id="billingInformation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
											<div class="content-info">
												<div class="col-md-12">
													<div>Sample Content</div>
													<p>Nunc Facilisis Sagittis Ullamcorper. Proin Lectus Ipsum, Gravida Et Mattis Vulputate, Tristique Ut Lectus. Sed Et Lorem Nunc.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="panel checkout-accordion">
										<div class="panel-heading" role="tab" id="headingThree">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#shippingMethod" aria-expanded="false" aria-controls="shippingMethod">
													<span>3</span> Shipping Method
												</a>
											</h4>
										</div>
										<div id="shippingMethod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
											<div class="content-info">
												<div class="col-md-12">
													<div>Sample Content</div>
													<p>Nunc Facilisis Sagittis Ullamcorper. Proin Lectus Ipsum, Gravida Et Mattis Vulputate, Tristique Ut Lectus. Sed Et Lorem Nunc.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="panel checkout-accordion">
										<div class="panel-heading" role="tab" id="headingFour">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paymentInformation" aria-expanded="false" aria-controls="paymentInformation">
													<span>4</span> Payment Information
												</a>
											</h4>
										</div>
										<div id="paymentInformation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
											<div class="content-info">
												<div class="col-md-12">
													<div>Sample Content</div>
													<p>Nunc Facilisis Sagittis Ullamcorper. Proin Lectus Ipsum, Gravida Et Mattis Vulputate, Tristique Ut Lectus. Sed Et Lorem Nunc.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="panel checkout-accordion">
										<div class="panel-heading" role="tab" id="headingFive">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#orderReview" aria-expanded="false" aria-controls="orderReview">
													<span>5</span> Order Review
												</a>
											</h4>
										</div>
										<div id="orderReview" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
											<div class="content-info">
												<div class="col-md-12">
													<div>Sample Content</div>
													<p>Nunc Facilisis Sagittis Ullamcorper. Proin Lectus Ipsum, Gravida Et Mattis Vulputate, Tristique Ut Lectus. Sed Et Lorem Nunc.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						<div class="col-md-3 category-checkout">
							<h5>YOUR CHECKOUT PROGRESS</h5>
							<ul>
								<li><a href="#" class="link-hover">Billing address</a></li>
								<li><a href="#" class="link-hover">Shipping address</a></li>
								<li><a href="#" class="link-hover">shipping method</a></li>
								<li><a href="#" class="link-hover">payment methor</a></li>
							</ul>
						</div>
					</div>
					<!-- div.info-section -->	
				</div>
				<!-- Checkout Container -->
				<div class="clearfix"></div>
			</div><!-- product-cart -->
		</div>
		<!-- END MAIN CONTAINER -->
		<div class="clearfix"></div>
@endsection