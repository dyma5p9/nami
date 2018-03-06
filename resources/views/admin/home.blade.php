@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Nami Users</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3>All users</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered table-hover table-condensed">
                                @if($users)
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Posts</th>

                                    </tr>
                                    </thead>
                                    @foreach($users as $user)
                                        <tr class="tr">
                                            <td>{{$user->id or ''}}</td>
                                            <td>{{$user->name or ''}}</td>
                                            <td>{{ ($user->posts != null) ? $user->posts->count() : 0 }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
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