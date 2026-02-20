<x-layout :title="$page_title ?? 'View Post'">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-10 px-4">
        <div class="max-w-2xl mx-auto">

            {{-- Back Link --}}
            <a href="/posts" class="inline-flex items-center gap-2 text-sm text-indigo-600 hover:text-indigo-800 font-medium mb-6 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Posts
            </a>

            {{-- Post Card --}}
            <div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden">
                {{-- Header --}}
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-6">
                    <div class="flex items-center gap-3">
                        <h1 class="text-2xl font-bold text-white">{{ $post->title }}</h1>
                        @if($post->is_active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-white/20 text-white">Active</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-400/30 text-white">Inactive</span>
                        @endif
                    </div>
                    <div class="mt-2 flex items-center gap-2 text-indigo-100 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>{{ $post->author }}</span>
                    </div>
                </div>

                {{-- Body --}}
                <div class="px-8 py-6">
                    <h2 class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-3">Description</h2>
                    <p class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $post->description }}</p>
                </div>

                {{-- Footer Actions --}}
                <div class="flex items-center gap-3 border-t border-slate-100 px-8 py-4 bg-slate-50/50">
                    <a href="{{ route('posts.edit', $post->id) }}" class="inline-flex items-center gap-1.5 rounded-xl bg-amber-50 border border-amber-200 text-amber-700 hover:bg-amber-100 px-4 py-2 text-sm font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center gap-1.5 rounded-xl bg-red-50 border border-red-200 text-red-700 hover:bg-red-100 px-4 py-2 text-sm font-medium transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-layout>
