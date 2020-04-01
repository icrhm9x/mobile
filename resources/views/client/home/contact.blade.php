@extends('client.layouts.master', ['title' => 'Contact Us'])
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
                        <li class="category3"><span>Contact-us</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- contact-details start -->
<div class="main-contact-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="page-sidebar-area">					
                    <!-- popular tag start -->
                    <aside class="widge-topbar">
                        <div class="bar-title">
                            <div class="bar-ping"><img src="/assets/client/img/bar-ping.png" alt=""></div>
                            <h2>Popular Tags</h2>
                        </div>
                        <div class="exp-tags">
                            <div class="tags">
                                <a href="#">camera</a>
                                <a href="#">mobile</a>
                                <a href="#">electronic</a>
                                <a href="#">destop</a>
                                <a href="#">tablet</a>
                                <a href="#">accessories</a>
                                <a href="#">camcorder</a>
                                <a href="#">laptop</a>
                            </div>
                        </div>
                    </aside>
                    <aside class="sidebar-content">
                        <div class="bar-title">
                            <div class="bar-ping"><img src="/assets/client/img/bar-ping.png" alt=""></div>
                            <h2>Categories</h2>
                        </div>
                        <ul class="sidebar-tags">
                            <li><a href="#">Acsessories</a><span> (14)</span></li>
                            <li><a href="#">Afternoon</a><span> (14)</span></li>
                            <li><a href="#">Attachment</a><span> (14)</span></li>
                            <li><a href="#">Beauty</a><span> (14)</span></li>
                        </ul>
                    </aside>
                    <!-- popular tag end -->
                    <!-- vote area start -->
                    <div class="community-vote single-sidebar">
                        <div class="bar-title">
                            <div class="bar-ping"><img src="/assets/client/img/bar-ping.png" alt=""></div>
                            <h2>Community</h2>
                        </div>
                        <p>What is your favorite color ?</p>
                        <div class="vote-area">
                            <p><input type="radio" value="1" name="vote"><label>Green</label></p>
                            <p><input type="radio" value="1" name="vote"><label>Blue</label></p>
                            <p><input type="radio" value="1" name="vote"><label>Yellow</label></p>
                            <p><input type="radio" value="1" name="vote"><label>Black</label></p>
                            <a href="#">Vote</a>
                        </div>
                    </div>
                    <!-- vote area end -->								
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="contact-us-area">
                    <!-- google-map-area start -->
                    <div class="google-map-area">
                        <!--  Map Section -->
                        <div id="contacts" class="map-area">
                            <div id="map" class="map" data-lat="43.6532" data-lng="-79.3832"></div>
                        </div>

                    </div>
                    <!-- google-map-area end -->
                    <!-- contact us form start -->
                    <div class="contact-us-form">
                        <div class="sec-heading-area">
                            <h2>Contact US</h2>
                        </div>
                        <div class="contact-form">
                            <span class="legend">Contact Information</span>
                            <form action="#" method="post">
                                <div class="form-top">
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>First Name <sup>*</sup></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>Last Name <sup>*</sup></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>Fax<sup>*</sup></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>Email <sup>*</sup></label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>Subject <sup>*</sup></label>
                                        <input type="text" class="form-control">
                                    </div>											
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>Telephone <sup>*</sup></label>
                                        <input type="text" class="form-control">
                                    </div>	
                                    <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                        <label>Comment <sup>*</sup></label>
                                        <textarea class="yourmessage"></textarea>
                                    </div>												
                                </div>
                                <div class="submit-form form-group col-sm-12 submit-review">
                                    <p><sup>*</sup> Required Fields</p>
                                    <a href="#" class="add-tag-btn">Submit</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- contact us form end -->
                </div>					
            </div>
        </div>
    </div>	
</div>
<!-- contact-details end -->
@endsection