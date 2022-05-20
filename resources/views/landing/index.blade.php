@extends('website')

@section('content')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5" style="color: white">
                <h1 class="fw-bolder">Welcome to Blog Project!</h1>
                <p class="lead mb-0">Everything you want is here</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">

                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="/{{ $up->id }}"><img class="card-img-top"
                            src="https://th.bing.com/th/id/R.e86ca88420cedafc9db2d105d5a78215?rik=K1mX3Uu%2b0u8qxg&riu=http%3a%2f%2f3.bp.blogspot.com%2f-nDBJXOcnogY%2fUd009GmRX2I%2fAAAAAAAAGL0%2fZd3NkJW9DKo%2fs1600%2fcity.jpg&ehk=WjsqArMcY3o%2ftmv%2fAwZcP1E0OCwpJuio8WFZFUYeX08%3d&risl=&pid=ImgRaw&r=0"
                            alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ showDateTime($up->updated_at) }}</div>
                        <h2 class="card-title">{{ $up->title }}</h2>
                        <p class="card-text">{{ $up->content }}</p>
                        <a class="btn btn-primary" href="/{{ $up->id }}">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                @foreach ($post->chunk(2) as $posts)
                    <div class="row">
                        @foreach ($posts as $i)
                            <div class="col-lg-6">
                                <!-- Blog post-->
                                <div class="card mb-4">
                                    <a href="/{{ $i->id }}"><img class="card-img-top"
                                            src="https://th.bing.com/th/id/R.87be1e36f6c586837ab823f260862de2?rik=c7DUWrU1qvDhgg&riu=http%3a%2f%2f2.bp.blogspot.com%2f-fRdbGsuEOwk%2fVYew8nGoADI%2fAAAAAAAAAFc%2fw13H1_n6EC0%2fs1600%2fSayur-sayuran-1050x1680.jpg&ehk=kcenUQAdAxXsP%2bcp2m5X55fD8anNUgevdLE%2f3mLx7AM%3d&risl=&pid=ImgRaw&r=0"
                                            alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted">{{ showDateTime($i->updated_at) }}</div>
                                        <h2 class="card-title h4">{{ $i->title }}</h2>
                                        <p class="card-text">{{ $i->content }}</p>
                                        <a class="btn btn-primary" href="/{{ $i->id }}">Read more →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <!-- Pagination-->
                {{-- <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav> --}}

            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <form action="{{ url('/') }}" method="GET" class="input-group">
                            <input class="form-control" type="text" name="search" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                        </form>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">List Blog</div>
                    <div class="card-body">
                        <div class="input-group">
                            <list-blog>
                                <div class="list-group">
                                    @forelse ($result as $i)
                                        <a href="/{{ $i->id }}"
                                            class="list-group-item list-group-item-action">{{ $i->title }}</a>
                                    @empty
                                        <p>No posts found..</p>
                                    @endforelse
                                </div>
                            </list-blog>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Attention!</div>
                    <div class="card-body">Find the latest news from us, about information technology.</div>
                </div>
            </div>
        </div>
    </div>
@endsection
