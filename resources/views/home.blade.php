@extends('layouts.template')

@section('content')
    <div class="pageheader__container" style="height: auto;">
        <div class="pageheader__wrapper">
            <div class="introduction">
                <div class="introduction__headline">
                    <h1 class="headline1 headline--pageMain active" data-active-switch=""
                        style="margin-top: -10px; translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                        All Models.
                    </h1>
                    <div class="headline headline--pageSub active" data-active-switch=""
                        style="margin-top: 0px; translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                        Find your <span style="white-space: nowrap;">Uung Motorrad</span> bike.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="msiHome__container">
        <div class="spotLight">

            <div class="spotLight__row">
                <div class="spotLight__col">
                    <div class="spotLightCard"></div>
                    <a href="" class="cardWrapper">
                        <picture class="spotLightImageWrapper">
                            <source media="(min-width:768px)"
                                srcset="https://www.yamaha-motor.co.id/uploads/products/featured_image/2023120909435736066O45589.png" />
                            <img width="1040" height="490" class="spotLightImage"
                                src="{{ asset('img/yamaha/xmax.png') }}" alt="Yamaha XMAX" loading="lazy" />
                        </picture>
                        <div class="card__body center">
                            <h3 class="title">Yamaha XMAX</h3>
                            <p class="context">Luxury Commuting Experience</p>
                        </div>
                    </a>
                </div>

                <div class="spotLight__col">
                    <div class="spotLightCard"></div>
                    <a href="" class="cardWrapper">
                        <picture class="spotLightImageWrapper">
                            <source media="(min-width:768px)"
                                srcset="https://www.yamaha-motor.co.id/uploads/products/featured_image/2024061210152169565J90266.png" />
                            <img width="1040" height="490" class="spotLightImage"
                                src="{{ asset('img/yamaha/xmax.png') }}" alt="Yamaha XMAX" loading="lazy" />
                        </picture>
                        <div class="card__body center">
                            <h3 class="title">Yamaha NMAX</h3>
                            <p class="context">Brilliance on the Road</p>
                        </div>
                    </a>
                </div>

                <div class="spotLight__col">
                    <div class="spotLightCard"></div>
                    <a href="" class="cardWrapper">
                        <picture class="spotLightImageWrapper">
                            <source media="(min-width:768px)"
                                srcset="https://www.yamaha-motor.co.id/uploads/products/featured_image/2023022109402492083O46474.png" />
                            <img width="1040" height="490" class="spotLightImage"
                                src="{{ asset('img/yamaha/xmax.png') }}" alt="Yamaha XMAX" loading="lazy" />
                        </picture>
                        <div class="card__body center">
                            <h3 class="title">Yamaha MT-25</h3>
                            <p class="context">Smooth and Comfortable</p>
                        </div>
                    </a>
                </div>

                <div class="spotLight__col">
                    <div class="spotLightCard"></div>
                    <a href="" class="cardWrapper">
                        <picture class="spotLightImageWrapper">
                            <source media="(min-width:768px)"
                                srcset="https://www.yamaha-motor.co.id/uploads/products/featured_image/2023102519190474792T91675.png" />
                            <img width="1040" height="490" class="spotLightImage"
                                src="{{ asset('img/yamaha/lexi.png') }}" alt="Yamaha Lexi" loading="lazy" />
                        </picture>
                        <div class="card__body center">
                            <h3 class="title">Yamaha Aerox</h3>
                            <p class="context">Compact and Stylish</p>
                        </div>
                    </a>
                </div>

                <div class="spotLight__col">
                    <div class="spotLightCard"></div>
                    <a href="" class="cardWrapper">
                        <picture class="spotLightImageWrapper">
                            <source media="(min-width:768px)"
                                srcset="https://www.yamaha-motor.co.id/uploads/products/featured_image/2024011218055599711U37222.png" />
                            <img width="1040" height="490" class="spotLightImage"
                                src="{{ asset('img/yamaha/freego.png') }}" alt="Yamaha FreeGo" loading="lazy" />
                        </picture>
                        <div class="card__body center">
                            <h3 class="title">Yamaha Lexi</h3>
                            <p class="context">Convenience and Performance</p>
                        </div>
                    </a>
                </div>

                <div class="spotLight__col">
                    <div class="spotLightCard"></div>
                    <a href="" class="cardWrapper">
                        <picture class="spotLightImageWrapper">
                            <source media="(min-width:768px)"
                                srcset="https://www.yamaha-motor.co.id/uploads/products/featured_image/202302210941109431L81474.png" />
                            <img width="1040" height="490" class="spotLightImage"
                                src="{{ asset('img/yamaha/gear125.png') }}" alt="Yamaha Gear 125" loading="lazy" />
                        </picture>
                        <div class="card__body center">
                            <h3 class="title">Yamaha R25</h3>
                            <p class="context">Play Hard Stay Silent</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
