{{$massage}}
@foreach($posts as $post)
    <p>{{$post->title}} .....
    {{$post->content}} .... 
    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
    @else
        No image available</p>
    @endif
@endforeach