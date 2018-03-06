@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="text-center">Nami posts</h1>
        <div class="col-md-8 col-md-offset-2">
            @foreach($posts as $post)
                <div class="row row_post">
                    <div class="col-md-3">
                        <h2 class="text-warning text-capitalize">
                            <a href="{{ "/post" }}/{{$post->slug}}">{{ $post->name }}</a>
                        </h2>
                        <br>
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
                    </div>
                    <div class="col-md-6">
                        <div class="text-info">{!! str_limit($post->description, 200, '...') !!}</div>
                    </div>
                    <div class="col-md-3">
                        <p>{{ $post->user->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">

</script>
@endpush