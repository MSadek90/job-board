<x-layout :title="$pagetitle">
    <div>Comments</div>
    <br>


    @foreach ( $comments as $comment )
    <div>This is the comment : {{  $comment->body }}</div>
    @endforeach

</x-layout>