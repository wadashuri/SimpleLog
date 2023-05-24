 <section class="ftco-section ftco-work">
      <div class="container-fluid">
          <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-2">事業内容</h2>
          <span class="subheading">私たちの仕事をご紹介します</span>
        </div>
      </div>
      <div class="row">
          @forelse($works as $work)
          <div class="col-md-4 ftco-animate">
              <div class="work-entry">
                  <a href="{{ route('front.post.show', $work->id) }}" class="img" style="background-image: url('{{ $work->image('image') }}');">
                      <div class="text d-flex justify-content-center align-items-center">
                          <div class="p-3">
                              <span>{{ $work->title }}</span>
                                <h3>詳しく見る</h3>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
          @empty
          <p class="test-center">事業内容がありません</p>
          @endforelse
      </div>
      </div>
  </section>