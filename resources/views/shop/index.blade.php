@extends('layouts.shop.master')

@section('content')
<!-- Banner Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__item set-bg" data-setbg="{{ asset('ogani/img/hero/banner.jpg') }}">
                    <div class="hero__text">
                        <span>BUAH BUAHAN SEGAR</span>
                        <h2>SAYURAN <br />100% Organik</h2>
                        <p>Tersedia Pemesanan dan Pengiriman Gratis</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Product Section Begin -->
<section class="product spad pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Kategori</h4>
                        <ul>
                            <li><a href="#">Sayuran Segar</a></li>
                            <li><a href="#">Buah-Buahan</a></li>
                            <li><a href="#">Daging Segar</a></li>
                            <li><a href="#">Bumbu Dapur</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Produk Terlaris</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach ($best_sellers as $best_seller)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg" data-setbg="{{ asset('storage/' . $best_seller->goodsImages[0]->src) }}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>{{ $best_seller->user->name }}</span>
                                            <h5><a href="{{ route('shop.show', $best_seller->id) }}">{{ $best_seller->name }}</a></h5>
                                            <div class="product__item__price">{{ 'Rp ' . number_format($best_seller->price, 0, ',', '.') }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="section-title product__discount__title">
                    <h2>Semua Produk</h2>
                </div>
                <div class="row">
                    @foreach ($goods as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $item->goodsImages[0]->src) }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__discount__item__text">
                                    <span>{{ $item->user->name }}</span>
                                    <h5><a href="{{ route('shop.show', $item->id) }}">{{ $item->name }}</a></h5>
                                    <div class="product__item__price">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

@endsection