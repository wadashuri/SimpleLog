@extends('layouts.front.app')

@section('content')

@include('front.include.content_header',[
    'title1' => 'Blog',
    'title2' => 'Blog Single',
    'main_title' => 'お知らせ詳細',
    'route' => 'front.post.index',
  ])
  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ftco-animate">
          {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p> --}}
          <p>
            <img src="{{ $post->image('image') }}" alt="" class="img-fluid w-100">
          </p>
          {{-- <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p> --}}
          <h2 class="mb-3 mt-5">{{ $post->title }}</h2>
          <p>{!! nl2br(e($post->content)) !!}</p>
          <div class="tag-widget post-tag-container mb-5 mt-5">
            <div class="tagcloud">
              @foreach($post->categories as $category)
              <a href="{{ route('front.post.index',['category_name' => $category->name])}}" class="tag-cloud-link">{{ $category->name }}</a>
              @endforeach
            </div>
          </div>

          {{-- <div class="about-author d-flex p-5 bg-light">
            <div class="bio align-self-md-center mr-5">
              <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
            </div>
            <div class="desc align-self-md-center">
              <h3>Michael Buff</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div> --}}


          {{-- <div class="pt-5 mt-5">
            <h3 class="mb-5">6 Comments</h3>
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta">June 27, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>
              </li>

              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta">June 27, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>

                <ul class="children">
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="images/person_1.jpg" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>John Doe</h3>
                      <div class="meta">June 27, 2018 at 2:21pm</div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                      <p><a href="#" class="reply">Reply</a></p>
                    </div>


                    <ul class="children">
                      <li class="comment">
                        <div class="vcard bio">
                          <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                          <h3>John Doe</h3>
                          <div class="meta">June 27, 2018 at 2:21pm</div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                          <p><a href="#" class="reply">Reply</a></p>
                        </div>

                          <ul class="children">
                            <li class="comment">
                              <div class="vcard bio">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                              </div>
                              <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">June 27, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                              </div>
                            </li>
                          </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta">June 27, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>
              </li>
            </ul>
            <!-- END comment-list -->

            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="#">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                      <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                  </form>
            </div>
          </div> --}}

        </div> <!-- .col-md-8 -->
        <div class="col-md-4 sidebar ftco-animate">
          {{-- <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div> --}}
          <div class="sidebar-box ftco-animate">
            <div class="categories">
              <h3>カテゴリー一覧</h3>
              @forelse($categories as $category)
              <li><a href="{{ route('front.post.index',['category_name' => $category->name])}}">{{ $category->name }} <span>({{ $category->posts->count() }})</span></a></li>
              @empty
              <li>カテゴリーはありません</li>
              @endforelse
            </div>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>新しい投稿</h3>
            @forelse($recent_posts as $recent_post)
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

          {{-- <div class="sidebar-box ftco-animate">
            <h3>Tag Cloud</h3>
            <div class="tagcloud">
              <a href="#" class="tag-cloud-link">dish</a>
              <a href="#" class="tag-cloud-link">menu</a>
              <a href="#" class="tag-cloud-link">food</a>
              <a href="#" class="tag-cloud-link">sweet</a>
              <a href="#" class="tag-cloud-link">tasty</a>
              <a href="#" class="tag-cloud-link">delicious</a>
              <a href="#" class="tag-cloud-link">desserts</a>
              <a href="#" class="tag-cloud-link">drinks</a>
            </div>
          </div> --}}

          {{-- <div class="sidebar-box ftco-animate">
            <h3>Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div> --}}
        </div>

      </div>
    </div>
  </section> <!-- .section -->
{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
@endsection