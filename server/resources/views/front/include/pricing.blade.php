<section class="ftco-section bg-light" id="plans">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-3">価格</h2>
                <span class="subheading">Pricing Plans</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 ftco-animate">
                <div class="block-7">
                    <div class="text-center">
                        <h2 class="heading">FREE</h2>
                        <span class="price"><sup>¥</sup> <span class="number">0</span></span>
                        <span class="excerpt d-block">全ての機能</span>
                        <a href="{{ route('admin.register') }}" class="btn btn-primary d-block px-2 py-3 mb-4">Get Started</a>

                        <ul class="pricing-text">
                            <li><strong>プロジェクトの登録、分析</strong></li>
                            <li><strong>タスク管理</strong></li>
                            <li><strong>顧客登録</strong></li>
                            <li>永続無料</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="block-7">
                    <div class="text-center">
                        <h2 class="heading">STANDARD</h2>
                        <span class="price"><sup>¥</sup> <span class="number">3,000</span></span>
                        <span class="excerpt d-block">全ての機能</span>
                        <a href="{{ route('admin.register') }}" class="btn btn-primary btn-outline-primary d-block px-3 py-3 mb-4">Get
                            Started</a>

                        <h3 class="heading-2 mb-4">FREEの全ての機能</h3>

                        <ul class="pricing-text">
                            <li><strong>20名</strong> ユーザー</li>
                            <li><strong>ユーザー登録</strong></li>
                            <li><strong>チーム管理</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="block-7">
                    <div class="text-center">
                        <h2 class="heading">Premium</h2>
                        <span class="price"><sup>¥</sup> <span class="number">7,500</span></span>
                        <span class="excerpt d-block">全ての機能</span>
                        <a href="{{ route('admin.register') }}" class="btn btn-primary btn-outline-primary d-block px-3 py-3 mb-4">Get
                            Started</a>

                        <h3 class="heading-2 mb-4">STANDARDの全ての機能</h3>

                        <ul class="pricing-text">
                            <li><strong>50名</strong> ユーザー</li>
                            <li><strong>プロジェクト<br>csvエクスポート</strong></li>
                            <li><strong>顧客<br>csvエクスポート<br>インポート</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="block-7">
                    <div class="text-center">
                        <h2 class="heading">Pro</h2>
                        <span class="price"><sup>¥</sup> <span class="number">22,500</span></span>
                        <span class="excerpt d-block">全ての機能</span>
                        <a href="{{ route('admin.register') }}" class="btn btn-primary btn-outline-primary d-block px-3 py-3 mb-4">Get
                            Started</a>

                        <h3 class="heading-2 mb-4">Proの全ての機能</h3>

                        <ul class="pricing-text">
                            <li><strong>150名</strong> ユーザー</li>
                            <li><strong>ユーザー毎に権限付与</strong></li>
                            <li><strong>カスタマーサポート</strong>導入サポート</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-5 justify-conten-center">
            <div class="col-md-8 ftco-animate">
                <p>※アップグレードやダウングレードなどのサブスクリプションへの変更によって、比例配分による請求が発生することがあります。<br>
                    たとえば、月額 3000jpy のサブスクリプションから 7500jpy のオプションに変更した場合、各オプションの使用時間に対して比例配分が適用された金額が請求されます。請求期間の半ばで変更が発生した場合は、顧客は 2250 jpy の追加請求を受けます (最初の価格の未使用時間分が -1500 jpy で、新しい価格の残り時間分が 3750 jpy)。
            </div>
        </div>
    </div>
</section>

{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
