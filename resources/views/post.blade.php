@extends('layouts.app')

@section('content')

    @foreach($posts as $post)
    @endforeach

    <div class="container">
        <div class="row">
            <h1 class="text-center">{{ $post->name }}</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="row row_post">
                    <div class="col-md-12">
                        <div>
                            <button data-my-post="{{$post->id}}" data-my-state="up" type="button" class="action_like btn btn-xs btn-warning" title="Like">
                                <i class="fa fa-thumbs-up"></i>
                                <span class="like">{{ ($post->likes != null) ? $post->likes->count() : 0 }}</span>
                            </button>
                            <button data-my-post="{{$post->id}}" data-my-state="down" type="button" class="action_like btn btn-xs btn-warning" title="DisLike">
                                <i class="fa fa-thumbs-down"></i>
                                <span class="dislike">{{ ($post->dislikes != null) ? $post->dislikes->count() : 0 }}</span>
                            </button>
                            <div class="response"></div>
                        </div>
                        <div>
                            <div class="text-info">{!! $post->description !!}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <p>{{ $post->user->name }}</p>
                        <p><a href="{{ "/home" }}" class="btn btn-group-justified"> <-Back </a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script type="text/javascript">

</script>
@endpush