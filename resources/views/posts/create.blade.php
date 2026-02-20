<x-layout :title="$page_title ?? 'Create Post'">
    <div class="bg-slate-900 min-h-screen p-8 text-white">
        <div class="max-w-4xl mx-auto">
            <form action="/posts" method="POST">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-white/10 pb-12">
                        <h2 class="text-base/7 font-semibold text-white">{{ $page_title ?? 'Create Post' }}</h2>
                        <p class="mt-1 text-sm/6 text-gray-400">Fill in the details below to publish a new post.</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="title" class="block text-sm font-medium text-white">Title</label>
                                <div class="mt-2">
                                    <input id="title" type="text" name="title" value="{{ old('title') }}" required placeholder="{{ $title_placeholder ?? 'Post Title' }}" class=" {{ $errors->has('title') ? 'border-red-500' : ''}} block w-full bg-white/5 border border-white/10 text-white focus:ring-indigo-500 focus:border-indigo-500 rounded-md py-2 px-3 sm:text-sm/6 outline-none" />
                                    @error('title')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="author" class="block text-sm font-medium text-white">Author</label>
                                <div class="mt-2">
                                    <input id="author" type="text" name="author" value="{{ old('author') }}" required placeholder="{{ $author_placeholder ?? 'Author Name' }}" class=" {{ $errors->has('author') ? 'border-red-500' : ''}} block w-full bg-white/5 border border-white/10 text-white focus:ring-indigo-500 focus:border-indigo-500 rounded-md py-2 px-3 sm:text-sm/6 outline-none" />
                                    @error('author')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm font-medium text-white">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="6" placeholder="{{ $description_placeholder ?? 'Description' }}" class="block w-full bg-white/5 border border-white/10 text-white focus:ring-indigo-500 focus:border-indigo-500 rounded-md py-2 px-3 sm:text-sm/6 outline-none" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold text-white border border-white/20 px-4 py-2 rounded-md hover:bg-white/10 transition">Cancel</button>
                        <button type="submit" class="rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 transition">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>