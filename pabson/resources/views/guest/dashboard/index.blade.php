@extends('guest.main')
@section('title')
    Guest | Dashboard
@endsection

@section('content')
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <h2><span class="theme-cl">Blogs</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="education_block_grid style_2">

                            <div class="education_block_thumb n-shadow">
                                <a href="course-detail.html">
                                    <img src="https://via.placeholder.com/700x500"
                                         class="img-fluid" alt="">
                                </a>
                            </div>

                            <div class="education_block_body">
                                <h4 class="bl-title">
                                    <a href="{{ route('guest.blog.show', $blog->id) }}">
                                        {{ $blog->name }}
                                    </a>
                                </h4>
                            </div>

                            <div class="cources_info">
                                <div class="cources_info_first">
                                    <ul>
                                        <li><strong>1,84684 Views</strong></li>
                                        <li class="theme-cl">3h 30min</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            {{ $blogs->links() }}

        </div>
    </section>
@endsection
