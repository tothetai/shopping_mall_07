@foreach($comment as $cmt)
    <div class="media-body avatar">
    	<img src="{{url('assets/uploads').'/'.$cmt->avatar}}" alt="">
        <h4 class="media-heading">
            {{$cmt->name}}
            <small>{{ $cmt->created_at }}</small>
        </h4>
        <p>{{$cmt->content}}</p>
    </div>
@endforeach