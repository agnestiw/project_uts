@extends('post-layout.main')
@section('content')
    <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
        <div class="card-body p-0 d-flex">
            <figure class="avatar me-3"><img src="{{ asset('post_assets/images/user-8.png') }}" alt="image"
                    class="shadow-sm rounded-circle w45"></figure>
            <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $post->user->name }}
                {{-- <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ Auth::user()->name }}</span> --}}
                <span
                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $post->created_at->diffForHumans() }}</span>
            </h4>
        </div>
        <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
            <a href="{{ $post->id }}" class="">
                <img src="{{ Storage::url($post->post_image) }}" class="w-100" alt="">
            </a>
        </div>
        <div class="card-body p-0 me-lg-5">
            <p class="fw-500 text-grey-500 lh-26 font-xssss w-100 mb-2">
                {{ $post->message }}
            </p>
        </div>
        <div class="card-body d-flex p-0 gap-3">
            @if ($post->likes)
                <form action="{{ route('dislike', $post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn">
                        <i class="fa-solid fa-heart me-2" style="color: #ff00f7;"></i> Like - {{ $post->likes->count() }}
                    </button>
                </form>
            @else
                <form action="{{ route('like', $post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn">
                        <i class="fa-regular fa-heart me-2"></i> Like - {{ $post->likes->count() }}
                    </button>
                </form>
            @endif
            <a href="{{ route('post.show', $post->id) }}" class="btn">
                <i class="fa-regular fa-comment me-2"></i> Commeant
            </a>
            <a class="btn" data-bs-toggle="modal" data-bs-target="#shareModal">
                <i class="fa-regular fa-share-from-square me-2"></i> Share
            </a>
        </div>
        <div class="comments-box mt-4">
            <form action="{{ route('comments.new', $post->id) }}" method="post" class="mb-4">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="comment" placeholder="your comments"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Send</button>
                </div>
            </form>
            @foreach ($comments as $item)
                <div class="d-flex align-items-start gap-2">
                    <img src="https://placehold.co/400x400" alt="" style="max-width: 30px; border-radius: 50px">
                    <div class="d-flex flex-column">
                        <p class="m-0 p-0 fw-bold">{{ $item->user->name }} |
                            {{ $item->created_at->diffForHumans() }}</p>
                        <div class="comments">
                            <p>{{ $item->comment }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Share</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" value="{{ Route::current()->getName() }}">
                    </div>
                </div>
            </div>
        </div>
    @endsection
