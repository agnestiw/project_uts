@extends('post-layout.main')
@section('content')
    {{-- <div class="row justify-content-center">
        <div class="col-3">
            <img src="https://placehold.co/400x400" alt="" class="img-fluid rounded-5">
        </div>
        <div class="col-6">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                        id="exampleInputPassword1" readonly>
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                        id="exampleInputPassword1" readonly>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Nomor Handphone</label>
                    <input type="text" name="no_hp" value="{{ $user->no_hp }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div> --}}
    <div class="row justify-content-center">
        <div class="col-9">
            <h5 class="mt-5 fw-bold">My Post</h5>
            @foreach ($posts as $item)
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="posts">
                            <div class="header">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between align-items-center gap-3">
                                        <img src="https://placehold.co/400x400" alt=""
                                            style="max-width: 50px; border-radius: 50px">
                                        <div class="d-flex flex-column">
                                            <h5 class="p-0 m-0">{{ $item->user->username }}</h5>
                                            <p class="m-0 p-0"> {{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('post.delete', $item->id) }}" class="btn"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                            <div class="content mt-3">
                                <div class="d-flex flex-column">
                                    @if ($item->post_image !== '-')
                                        <div class="image">
                                            <img src="{{ Storage::url($item->post_image) }}"
                                                class="img-fluid w-100 rounded-2">
                                        </div>
                                    @endif
                                    <p class="mt-3">
                                        {!! $item->message !!}
                                    </p>
                                    <div class="toolbar mt-3">
                                        <div class="d-flex justify-content-around gap-3">
                                            @if ($item->liked)
                                                <form action="{{ route('dislike', $item->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn">
                                                        <i class="fa-solid fa-heart me-2" style="color: #ff00f7;"></i>
                                                        Like - {{ $item->likes_count }}
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('like', $item->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn">
                                                        <i class="fa-regular fa-heart me-2"></i> Like -
                                                        - {{ $item->liked }}
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('post.show', $item->id) }}" class="btn">
                                                <i class="fa-regular fa-comment me-2"></i> Comment
                                            </a>
                                            <a href="" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#postModal">
                                                <i class="fa-regular fa-share-from-square me-2"></i> Share
                                            </a>

                                            <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    
    {{-- <div class="row">
        <h5>My Credentials</h5>
        <div class="col-4">
            <img src="https://placehold.co/400x400" alt="" class="img-fluid rounded-5">
        </div>
        <div class="col-8">
            <div class="card h-100">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Username</label>
                            <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <h5>My Post</h5>
            @foreach ($posts as $item)
                <div class="col-7">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="posts">
                                <div class="header">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between align-items-center gap-3">
                                            <img src="https://placehold.co/400x400" alt=""
                                                style="max-width: 50px; border-radius: 50px">
                                            <div class="d-flex flex-column">
                                                <h5 class="p-0 m-0">{{ $item->user->username }}</h5>
                                                <p class="m-0 p-0"> {{ $item->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('user.post.delete', $item->id) }}" class="btn"><i
                                                class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                                <div class="content mt-3">
                                    <div class="d-flex flex-column">
                                        @if ($item->post_image !== '-')
                                            <div class="image">
                                                <img src="{{ Storage::url($item->post_image) }}"
                                                    class="img-fluid w-100 rounded-2">
                                            </div>
                                        @endif
                                        <p class="mt-3">
                                            {!! $item->message !!}
                                        </p>
                                        <div class="toolbar mt-3">
                                            <div class="d-flex justify-content-around gap-3">
                                                @if ($item->liked)
                                                    <form action="{{ route('user.dislike', $item->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn">
                                                            <i class="fa-solid fa-heart me-2" style="color: #ff00f7;"></i>
                                                            Like - {{ $item->likes_count }}
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('user.like', $item->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn">
                                                            <i class="fa-regular fa-heart me-2"></i> Like -
                                                            {{ $item->likes_count }}
                                                        </button>
                                                    </form>
                                                @endif
                                                <a href="{{ route('user.post.show', $item->id) }}" class="btn">
                                                    <i class="fa-regular fa-comment me-2"></i> Comment
                                                </a>
                                                <a href="" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#postModal">
                                                    <i class="fa-regular fa-share-from-square me-2"></i> Share
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


        <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div> --}}
@endsection