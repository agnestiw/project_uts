@extends('post-layout.main')
@section('content')
    <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
        <div class="card-body p-0">
            <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i
                    class="fa-regular fa-newspaper"></i> Create Post</a>
        </div>
        <div class="card-body p-0 mt-3 position-relative">
            <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{ asset('post_assets/images/user-8.png') }}"
                    alt="image" class="shadow-sm rounded-circle w30"></figure>
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <textarea name="message"
                    class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg"
                    cols="30" rows="10" placeholder="What's on your mind?"></textarea>

                <div class="card-body d-flex">
                    <input type="file" class="form-control" name="post_image">
                    <button type="submit" class="btn btn-primary text-white"><span class="d-none-xs">Send</span></button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($posts as $item)
        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
            <div class="card-body p-0 d-flex">
                <figure class="avatar me-3"><img src="{{ asset('post_assets/images/user-8.png') }}" alt="image"
                        class="shadow-sm rounded-circle w45"></figure>
                <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $item->user->name }}<span
                        class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $item->created_at->diffForHumans() }}</span>
                </h4>
            </div>
            @if ($item->post_image !== '-')
                <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
                    <a href="{{ $item->id }}" class="">
                        <img src="{{ Storage::url($item->post_image) }}" class="w-100" alt="">
                    </a>
                </div>
            @endif
            <div class="card-body p-0 me-lg-5">
                <p class="fw-500 text-grey-500 lh-26 font-xssss w-100 mb-2">
                    {{ $item->message }}
                </p>
            </div>
            <div class="card-body d-flex p-0 gap-3">
                @if ($item->liked)
                    <form action="{{ route('dislike', $item->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-heart me-2" style="color: #ff00f7;"></i> Like -  {{ $item->likes_count }}
                        </button>
                    </form>
                @else
                    <form action="{{ route('like', $item->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn">
                            <i class="fa-regular fa-heart me-2"></i> Like - {{ $item->likes_count }}
                        </button>
                    </form>
                @endif
                <a href="{{ route('post.show', $item->id) }}" class="btn">
                    <i class="fa-regular fa-comment me-2"></i> Comment
                </a>
                <a href="javascript:void(0);" class="btn" onclick="copyUrl({{ $item->id }})"
                    id="url-{{ $item->id }}">
                    <i class="fa-regular fa-share-from-square me-2"></i> Share
                </a>
            </div>
        </div>

        <script>
            function copyUrl(userId) {
                var urlInput = document.getElementById('url-' + userId);

                urlInput.select();
                urlInput.setSelectionRange(0, 99999);

                navigator.clipboard.writeText(urlInput.value)
                    .then(() => {
                        alert('URL copied to clipboard!');
                    })
                    .catch(err => {
                        console.error('Error copying URL: ', err);
                    });
            }
        </script>
    @endforeach
@endsection
