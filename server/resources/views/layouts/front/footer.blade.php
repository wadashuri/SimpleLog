<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">SincerityLab</h2>
                    {{-- <p>各種SNSに制作楽曲を掲載しておりますのでご確認ください</p> --}}
                </div>
                {{-- <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
                    <li class="ftco-animate">
                        <a href="https://www.tiktok.com/@shuri_slab?_t=8kGK47AeCx8&_r=1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="38" style="padding-top: 10px; padding-left: 5px;"  fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="ftco-animate"><a href="https://www.youtube.com/@shuri-slab"><span
                                class="icon-youtube"></span></a></li>
                    <li class="ftco-animate"><a href="https://www.instagram.com/slab0108?igsh=MWxsOWt6MjFpMjJmeQ%3D%3D&utm_source=qr"><span
                                class="icon-instagram"></span></a></li>
                </ul> --}}
            </div>
            <div class="col-md-2">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">リンク</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('front.pages.about') }}" class="py-2 d-block">事務所概要</a></li>
                        <li><a href="{{ route('front.work.index') }}" class="py-2 d-block">事業内容</a></li>
                        <li><a href="{{ route('front.pages.team') }}" class="py-2 d-block">プロフィール</a></li>
                        <li><a href="{{ route('front.contact.index') }}" class="py-2 d-block">お問い合わせ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 pr-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">新しい投稿</h2>
                    @forelse($footer_recent_posts as $recent_post)
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ $recent_post->image('image') }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="{{ route('front.post.show', $recent_post->id) }}">{{ $recent_post->title }}</a></h3>
                                <div class="meta">
                                    <div><a href="{{ route('front.post.show', $recent_post->id) }}"><span class="icon-calendar"></span> {{ $recent_post->created_at }}</a></div>
                                    {{-- <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div> --}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>新しい投稿がありません</p>
                    @endforelse
                </div>
            </div>
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">お問い合わせ情報</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <span class="icon icon-map-marker"></span>
                                <span class="text">神奈川県横浜市西区戸部町２丁目４７</span>
                            </li>
                            <li>
                                <a href="tel://07085815236">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">070-8581-5236</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@sinceritylab.com">
                                    <span class="icon icon-envelope"></span>
                                    <span class="text">info@sinceritylab.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
