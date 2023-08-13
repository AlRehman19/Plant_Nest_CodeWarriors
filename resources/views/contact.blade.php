@extends('layouts.header_footer')

@section('theme')
 


<br><br>
 <!-- ##### Breadcrumb Area Start ##### -->
  <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
       

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    @if (session('success'))
        <div class="alert alert-success" >{{ session('success') }}</div>
        
    @endif
    <!-- ##### Contact Area Info Start ##### -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Contact Thumbnail -->
                <div class="col-12 col-md-6">
                    <div class="contact--thumbnail">
                        <img src="theme/img/bg-img/25.jpg" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>CONTACT US</h2>
                        <p>We are improving our services to serve you better.</p>
                    </div>
                    <!-- Contact Information -->
                    <div class="contact-information">
                        <p><span>Address:</span> Garden West Shoe Market Karachi, Pakistan</p>
                        <p><span>Phone:</span> +92 320 205 147 9</p>
                        <p><span>Email:</span> codewarriors@aptechgdn.net</p>
                        <p><span>Open days:</span> Mon - Sun </p>
                        <p><span>Open hours:</span> 24 h</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area Info End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>GET IN TOUCH</h2>
                        <p>Send us a message, we will call back later</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                    <form action="{{ route('store-message') }}" method="POST">
    @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $userId }}" name="userid" class="form-control" id="contact-name" >
                                    </div>
                                </div>
                                
                                <div class="col-12">
        <div class="form-group">
            <input type="text" name="subject" class="form-control" id="contact-subject" placeholder="Subject">
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn alazea-btn mt-15" style="background: #70c745; color: white;">Send Message</button>
    </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->




    @endsection