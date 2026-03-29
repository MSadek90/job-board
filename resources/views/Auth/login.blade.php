<x-auth :title="$page_title">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-md border border-slate-200 p-6">

            <h2 class="text-2xl font-bold text-slate-800 mb-6 text-center">Login</h2>

            {{-- Errors --}}
            @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-2 rounded-xl text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-600 mb-1">Email</label>
                    <input type="email"
                        name="email"
                        value="{{ old('email', '') }}"
                        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-indigo-500 {{ $errors->has('email') ? 'border-red-400' : 'border-slate-300' }}"
                        required>
                    @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-600 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-indigo-500 @error('password') border-red-400 @else border-slate-300 @enderror"
                        required>
                    @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Button --}}
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-xl font-medium hover:bg-indigo-700 transition">
                    Login
                </button>
            </form>

            <p class="text-sm text-center text-slate-500 mt-4">
                Don't have an account?
                <a href="{{ route('signup.show') }}" class="text-indigo-600 hover:underline">Sign up</a>
            </p>

        </div>
    </div>
    </x-layout>