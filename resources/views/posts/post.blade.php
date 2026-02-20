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
                            <div class="flex items-center gap-2">
                                <span class="text-xl font-semibold text-slate-800 group-hover:text-indigo-600 transition-colors duration-200 block truncate">
                                    {{ $post->title }}
                                </span>
                                {{-- Active/Inactive Badge --}}
                                @if($post->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">Inactive</span>
                                @endif
                            </div>
                            <div class="mt-2 flex items-center gap-2 text-sm text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ $post->author }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center justify-between border-t border-slate-100 px-6 py-3 bg-slate-50/50">
                        {{-- View --}}
                        <a href="/posts/{{ $post->id }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            View
                        </a>

                        {{-- Edit --}}
                        <a href="/posts/{{ $post->id }}/edit" class="inline-flex items-center gap-1.5 text-sm font-medium text-amber-600 hover:text-amber-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>

                        {{-- Toggle Active --}}
                        <button type="button"
                            onclick="openModal('{{ $post->is_active ? 'Deactivate' : 'Activate' }} Post', 'Are you sure you want to {{ $post->is_active ? 'deactivate' : 'activate' }} this post?', '/posts/{{ $post->id }}/toggle-active', 'PATCH', {{ $post->id }})"
                            class="inline-flex items-center gap-1.5 text-sm font-medium {{ $post->is_active ? 'text-orange-600 hover:text-orange-800' : 'text-emerald-600 hover:text-emerald-800' }} transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728M9.172 14.828a4 4 0 010-5.656m5.656 0a4 4 0 010 5.656M12 12h.008v.008H12V12z"/>
                            </svg>
                            {{ $post->is_active ? 'Deactivate' : 'Activate' }}
                        </button>

                        {{-- Delete --}}
                        <button type="button"
                            onclick="openModal('Delete Post', 'Are you sure you want to delete this post? This action cannot be undone.', '/posts/{{ $post->id }}', 'DELETE', {{ $post->id }})"
                            class="inline-flex items-center gap-1.5 text-sm font-medium text-red-600 hover:text-red-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Confirmation Modal --}}
    <div id="confirmModal" class="fixed inset-0 z-50 hidden">
        {{-- Backdrop --}}
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

        {{-- Modal Content --}}
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl border border-slate-200 w-full max-w-md transform transition-all scale-95 opacity-0" id="modalContent">
                {{-- Modal Header --}}
                <div class="flex items-center gap-3 px-6 pt-6 pb-2">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0" id="modalIconWrapper">
                        <svg class="w-5 h-5 text-red-600" id="modalIcon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800" id="modalTitle">Confirm Action</h3>
                </div>

                {{-- Modal Body --}}
                <div class="px-6 py-4">
                    <p class="text-sm text-slate-600 leading-relaxed" id="modalMessage">Are you sure you want to proceed?</p>
                </div>

                {{-- Modal Footer --}}
                <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50/50 rounded-b-2xl">
                    <button type="button" onclick="closeModal()"
                        class="px-5 py-2.5 text-sm font-semibold text-slate-600 border border-slate-300 rounded-xl hover:bg-slate-100 transition-all duration-200">
                        Discard
                    </button>
                    <button type="button" id="modalConfirmBtn" onclick="confirmAction()"
                        class="px-5 py-2.5 text-sm font-semibold text-white rounded-xl shadow-lg transition-all duration-200 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast Notification --}}
    <div id="toast" class="fixed top-6 right-6 z-[60] hidden">
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl px-5 py-4 shadow-lg">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium text-sm" id="toastMessage"></span>
        </div>
    </div>

    <script>
        let pendingAction = { url: '', method: '', postId: null };

        function openModal(title, message, url, method, postId) {
            pendingAction = { url, method, postId };

            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalMessage').textContent = message;

            // Style based on action type
            const isDelete = method === 'DELETE';
            const iconWrapper = document.getElementById('modalIconWrapper');
            const confirmBtn = document.getElementById('modalConfirmBtn');

            if (isDelete) {
                iconWrapper.className = 'w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0';
                confirmBtn.className = 'px-5 py-2.5 text-sm font-semibold text-white rounded-xl shadow-lg transition-all duration-200 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700';
            } else {
                iconWrapper.className = 'w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center flex-shrink-0';
                confirmBtn.className = 'px-5 py-2.5 text-sm font-semibold text-white rounded-xl shadow-lg transition-all duration-200 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700';
            }

            // Show modal with animation
            const modal = document.getElementById('confirmModal');
            const content = document.getElementById('modalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeModal() {
            const content = document.getElementById('modalContent');
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                document.getElementById('confirmModal').classList.add('hidden');
            }, 200);
        }

        function confirmAction() {
            const { url, method } = pendingAction;

            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                closeModal();
                showToast(data.message || 'Action completed successfully');
                // Reload page after a short delay to reflect changes
                setTimeout(() => location.reload(), 1200);
            })
            .catch(() => {
                closeModal();
                showToast('Something went wrong. Please try again.');
            });
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            document.getElementById('toastMessage').textContent = message;
            toast.classList.remove('hidden');
            setTimeout(() => toast.classList.add('hidden'), 3000);
        }
    </script>
</x-layout>