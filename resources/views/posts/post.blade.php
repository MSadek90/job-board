<x-layout :title="$page_title">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-10 px-4">
        <div class="max-w-4xl mx-auto">

            {{-- Page Header --}}
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-slate-800 tracking-tight"> All Posts</h1>
                <p class="mt-2 text-slate-500 text-sm">Browse through all published posts</p>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
            <div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl px-5 py-4 shadow-sm">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            @endif

            {{-- Posts Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach ($posts as $post)
                <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl border border-slate-200 hover:border-indigo-300 transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                    <div class="flex items-start gap-4 p-6">
                        {{-- Post Number Badge --}}
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200">
                            <span class="text-white font-bold text-lg">#{{ $post->id }}</span>
                        </div>

                        {{-- Post Content --}}
                        <div class="flex-1 min-w-0">
                            <a href="{{ route('comment.index', $post->id) }}" class="text-xl font-semibold text-slate-800 group-hover:text-indigo-600 transition-colors duration-200 block truncate">
                                {{ $post->title }}
                            </a>
                            <div class="mt-2 flex items-center gap-2 text-sm text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ $post->author }}</span>
                            </div>
                        </div>

                        {{-- Arrow Icon --}}
                        <div class="flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</x-layout>