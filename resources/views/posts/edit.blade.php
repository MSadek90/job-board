<x-layout :title="$page_title ?? 'Edit Post'">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-10 px-4">
        <div class="max-w-2xl mx-auto">

            {{-- Page Header --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Edit Post</h1>
                <p class="mt-2 text-slate-500 text-sm">Update the details below to modify this post.</p>
            </div>

            {{-- Form Card --}}
            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-8">
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $post->id }}">

                    {{-- Title --}}
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Title</label>
                        <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" required
                            placeholder="Post Title"
                            class="block w-full bg-slate-50 border {{ $errors->has('title') ? 'border-red-400' : 'border-slate-200' }} text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl py-3 px-4 text-sm outline-none transition-all duration-200" />
                        @error('title')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Author --}}
                    <div class="mb-6">
                        <label for="author" class="block text-sm font-semibold text-slate-700 mb-2">Author</label>
                        <input id="author" type="text" name="author" value="{{ old('author', $post->author) }}" required
                            placeholder="Author Name"
                            class="block w-full bg-slate-50 border {{ $errors->has('author') ? 'border-red-400' : 'border-slate-200' }} text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl py-3 px-4 text-sm outline-none transition-all duration-200" />
                        @error('author')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-8">
                        <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="5" required
                            placeholder="Write your post description..."
                            class="block w-full bg-slate-50 border {{ $errors->has('description') ? 'border-red-400' : 'border-slate-200' }} text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl py-3 px-4 text-sm outline-none transition-all duration-200 resize-none">{{ old('description', $post->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="flex items-center justify-end gap-3">
                        <a href="/posts" class="text-sm font-semibold text-slate-600 border border-slate-300 px-5 py-2.5 rounded-xl hover:bg-slate-50 transition-all duration-200">Cancel</a>
                        <button type="submit" class="rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-2.5 text-sm font-semibold text-white hover:from-indigo-600 hover:to-purple-700 shadow-lg shadow-indigo-200 transition-all duration-200">Update Post</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-layout>
