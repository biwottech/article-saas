<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Our Plans & Pricing</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @for($i=3; $i>0; $i--)
            <div class="col-lg-4 m-auto">
                <div class="properties properties2 mb-30">
                    <div class="properties__card" style="box-shadow: 6px 6px 6px 6px rgb(2 25 65 / 8%);">
                        <div class="card-header text-center bg-transparent">
                            <span class="fas fa-spa fa-5x" style="color: #4255A4;"></span>
                        </div>
                        <div class="properties__caption">
                            <h3 class="text-center">Silver Plan</h3>
                            <p><i class="fas fa-check"></i> Discover tools
                            </p>
                            <p><i class="fas fa-check"></i> The automated process
                            </p>
                            <p><i class="fas fa-check"></i> The automated process
                            </p>
                            <p><i class="fas fa-check"></i> The automated process
                            </p>
                            <p><i class="fas fa-times"></i> The automated process
                            </p>
                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                <div class="price">
                                    <span>Monthly</span>
                                </div>
                                <div class="price">
                                    <span>${{ $i*4}}</span>
                                </div>
                            </div>
                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                <div class="price">
                                    <span>Yearly</span>
                                </div>
                                <div class="price">
                                    <span>${{ $i*2}}</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-lg btn-block">Find out more</a>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
