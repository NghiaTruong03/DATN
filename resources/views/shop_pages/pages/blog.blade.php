@extends('shop_pages.master')
@section('content')

    <!-- Blog Area Start -->
    <div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page">
        <div class="container">
            <div class="row">
                @foreach($blog as $value)
                <div class="col-lg-6 col-md-6 col-xl-4 mb-50px">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="{{  route('blog.detail',$value->id )}}"><img src="{{ url('storage/'.$value->blog_image) }}" style="height:250px;object-fit:cover;"
                                class="card-img-top"></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                        aria-hidden="true"></i>{{ $value->created_at->format('d/m/Y') }}</a>
                                <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                    K</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link"
                                    href="{{  route('blog.detail',$value->id )}}">{{ $value->blog_title }}</a></h5>

                            <p>{{ $value->blog_summary }}</p>

                            <a href="{{  route('blog.detail',$value->id )}}" class="btn btn-primary blog-btn"> Read More<i class="fa fa-arrow-right ml-5px"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- End single blog -->
            </div>

            <!--  Pagination Area Start -->
                <div class="pro-pagination-style text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="pages">
                    <ul>
                        <li class="li"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="li"><a class="page-link active" href="#">1</a></li>
                        <li class="li"><a class="page-link" href="#">2</a></li>
                        <li class="li"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--  Pagination Area End -->
        </div>
    </div>
    <!-- Blag Area End -->

@endsection