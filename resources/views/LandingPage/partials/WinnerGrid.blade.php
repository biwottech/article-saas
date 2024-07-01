<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Top Winners</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @for($i=5; $i>0; $i--)
            <div class="col-lg-4">
                <div class="properties properties2 mb-30">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="{{ asset('images/avatar.png') }}" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <p>User Experience</p>
                            <h3><a href="#">Fundamental of UX for Application design</a></h3>
                            <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.
                            </p>
                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                <div class="restaurant-name">
                                    <div class="rating">
                                        {{--Start Rating--}}
                                        @for ($j = 0; $j < 5; $j++) @if (floor($i) - $j>= 1)
                                            {{--Full Start--}}
                                            <i class="fas fa-star "> </i>
                                            @elseif ($i - $j > 0)
                                            {{--Half Start--}}
                                            <i class="fas fa-star-half-alt "> </i>
                                            @else
                                            {{--Empty Start--}}
                                            <i class="far fa-star "> </i>
                                            @endif
                                            @endfor
                                            {{--End Rating--}}
                                    </div>
                                    <p><span>({{ $i }})</span> based on 120</p>
                                </div>
                                <!--price here-->
                            </div>
                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                <div class="price">
                                    <span>Winning Amount</span>
                                </div>
                                <div class="price">
                                    <span>${{ $i*20}}</span>
                                </div>
                            </div>
                            <a href="#" class="border-btn border-btn2">Find out more</a>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
