<x-layout :title="$pagetitle">
    <strong> All Posts</strong>
    <br>
    <br>

    @foreach ($posts as $post)
    <div>
        
        <a href="{{ route('comment.index',$post->id )}}">
            Title of Post {{ $post->id }} is: {{ $post->title }} 
        </a>
    </div>

    <div>Author of post is: {{ $post->author }}</div>
   <br>
    @endforeach
 
</x-layout>