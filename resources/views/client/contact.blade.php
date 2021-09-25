@section('title', 'Liên Hệ')
@extends('client.layouts.master-1')

@section('custom-style')

@endsection

@section('main-content')

    <section class="breadcrumb-section set-bg" data-setbg="/libs/client/img/banner/img.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Liên Hệ Chúng Tôi</h2>
                        <div class="breadcrumb__option">
                            <a href="./">Trang Chủ</a>
                            <span>Liên Hệ Chúng Tôi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Điện Thoại</h4>
                        <p>+84 88.888.888</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa Chỉ</h4>
                        <p>8 Tôn Thất Thuyết, Mỹ Đình, Cầu Giấy, Hà Nội, Vietnam</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Giờ Hoạt Động</h4>
                        <p>Cả Ngày</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>eproject@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0969666091723!2d105.78049781476332!3d21.02880578599839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cd0c66f05%3A0xea31563511af2e54!2zOCBUw7RuIFRo4bqldCBUaHV54bq_dCwgTeG7uSDEkMOsbmgsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1632295666401!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
{{--        <div class="map-inside">--}}
{{--            <i class="icon_pin"></i>--}}
{{--            <div class="inside-widget">--}}
{{--                <h4>New York</h4>--}}
{{--                <ul>--}}
{{--                    <li>Phone: +12-345-6789</li>--}}
{{--                    <li>Add: 16 Creek Ave. Farmingdale, NY</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>


    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Để Lại Lời Nhắn</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Tên Của Bạn">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Email Của Bạn">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Lời Nhắn Của Bạn"></textarea>
                        <button type="submit" class="site-btn">Gừi Lời Nhắn</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('custom-js')

@endsection
