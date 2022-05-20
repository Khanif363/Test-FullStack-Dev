@extends('website')

@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">

                <!-- Featured blog post-->
                <article class="card mb-4" style="border: none">
                    <a
                        href="https://th.bing.com/th/id/R.87be1e36f6c586837ab823f260862de2?rik=c7DUWrU1qvDhgg&riu=http%3a%2f%2f2.bp.blogspot.com%2f-fRdbGsuEOwk%2fVYew8nGoADI%2fAAAAAAAAAFc%2fw13H1_n6EC0%2fs1600%2fSayur-sayuran-1050x1680.jpg&ehk=kcenUQAdAxXsP%2bcp2m5X55fD8anNUgevdLE%2f3mLx7AM%3d&risl=&pid=ImgRaw&r=0"><img
                            class="card-img-top"
                            src="https://th.bing.com/th/id/R.87be1e36f6c586837ab823f260862de2?rik=c7DUWrU1qvDhgg&riu=http%3a%2f%2f2.bp.blogspot.com%2f-fRdbGsuEOwk%2fVYew8nGoADI%2fAAAAAAAAAFc%2fw13H1_n6EC0%2fs1600%2fSayur-sayuran-1050x1680.jpg&ehk=kcenUQAdAxXsP%2bcp2m5X55fD8anNUgevdLE%2f3mLx7AM%3d&risl=&pid=ImgRaw&r=0"
                            alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ showDateTime($post->updated_at) }}</div>
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text">{{ $post->content }}</p>
                        <p><strong>Author: </strong>{{ $post->user->name }}<br>
                            <strong>Email: </strong>{{ $post->user->email }}
                        </p>
                    </div>

                    <section>
                        <div class="container my-4 py-4 text-dark">
                            <div class="row d-flex justify-content-left">
                                <div class="col-md-12 col-lg-10 col-xl-8">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4 class="text-dark mb-0">List comment:</h4>
                                    </div>
                                    @forelse ($comment as $item)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex flex-start">
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                        src="https://cutewallpaper.org/21/hd-profile-pic/Top-50-Instagram-profile-pictures-for-Boys-and-Girls-FB-.jpg"
                                                        alt="avatar" width="40" height="40" />
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h6 class="text-primary mb-0">
                                                                <a href="/">{{ $item->name }}</a>
                                                                <span class="ms-2"
                                                                    style="font-weight: normal; color: #3d3f50;">{{ $item->comment }}</span>
                                                            </h6>

                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex flex-row">
                                                                <p class="mb-0 text-muted" style="font-size: 13px">
                                                                    {{ showDateTime($item->updated_at) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p style="color: #3d3f50;">No comment yet...</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </section>

                    <div style="margin-top: 80px">
                        <div class="section-header">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h3 class="text-center mb-3">Send Comment</h3>
                        </div>
                        <form action="{!! url('/comment', $post->id) !!}" method="POST">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input style="height: 50px" type="text" name="name" class="form-control mb-2"
                                        placeholder="Enter Name" id="name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input style="height: 50px" type="email" name="email" class="form-control"
                                        placeholder="Enter Email" id="email">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input id="invisible_id" name="website" type="hidden"
                                        value="<?= URL::to('/', $post->id) ?>">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <textarea style="height: 100px" type="text" class="form-control" name="comment"
                                    placeholder="Comment here.."></textarea>
                            </div>
                            <div class="text-center mt-4"><button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </article>
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
                    <div class="card-header">List Blog</div>
                    <div class="card-body">
                        <div class="input-group">
                            <list-blog>
                                <div class="list-group">
                                    @foreach ($listpost as $i)
                                        <a href="/{{ $i->id }}"
                                            class="list-group-item list-group-item-action">{{ $i->title }}</a>
                                    @endforeach
                                </div>
                            </list-blog>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
