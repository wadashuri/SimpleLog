<div class="hero-wrap hero-wrap-2" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container-fluid">
      <div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('front.pages.index') }}">Home</a></span> <span class="mr-2">{{ $title1 }}</span>@isset($title2)<span>{{ $title2 }}</span>@endisset</p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ $main_title }}</h1>
        </div>
      </div>
    </div>
  </div>