@section('header')
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> customerservice@viggy.com</li>
                            <li>Sekarang Anda bisa berbelanja dimana saja dan kapan saja.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="#">
                        <img src="{{ asset('adminmart/assets/images/text-logo.png') }}" alt="" width="124" height="40">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 mt-2">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" placeholder="Apa yang Anda butuhkan?">
                            <button type="submit" class="site-btn">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__cart" style="padding-top: 18px !important">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-heart" style="font-size: 24px"></i>
                                <span style="font-size: 12px; height: 16px; width: 16px; line-height: 15px; top: -5px">1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-shopping-bag" style="font-size: 24px"></i>
                                <span style="font-size: 12px; height: 16px; width: 16px; line-height: 15px; top: -5px">3</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
@show
