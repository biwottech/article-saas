<footer>
    <div class="footer-wrappper footer-bg">
        {{--
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                @if(!is_null(Website::Info()))
                                <div class="footer-logo mb-25">
                                    <a href="{{ url('/') }}"><img src="{{ asset('images/'.Website::Info()->logo) }}" alt=""></a>
                                </div>
                                @else
                                <div class="footer-logo mb-25">
                                    <a href="{{ url('/') }}">Home</a>
                                </div>
                                @endif
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Follow Us on Social Media</p>
                                    </div>
                                </div>
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter text-white"></i></a>
                                    <a href="#"><i class="fab fa-facebook text-white"></i></a>
                                    <a href="#"><i class="fab fa-pinterest text-white"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                        <div class="single-footer-caption mb-50 float-right">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    @if(Auth::user())
                                    <li><a href="{{ route('login') }}">Dashboard</a></li>
                                    @else
                                    <li><a href="{{ route('JoinUs') }}">Join</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p>
                                    Copyright &copy;<script>
                                    document.write(new Date().getFullYear());

                                    </script> All rights reserved</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
