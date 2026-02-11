<x-layout :title="$pagetitle">
    <h1>All Tags</h1>
    <br>
    <br>
    @foreach ($tags as $tag )
        <div>{{  $tag->title }}</div>
    @endforeach
</x-layout>