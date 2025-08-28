<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | UangKu</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex items-center justify-center px-4">

  <main class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">

    <h1 class="text-3xl font-bold text-center text-indigo-700 mb-8">Masuk ke UangKu</h1>

    <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
      @csrf
      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
        <input
          id="email"
          name="email"
          type="email"
          required
          autofocus
          autocomplete="username"
          value="{{ old('email') }}"
          class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
          placeholder="email@example.com"
        />
        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-600 text-xs" />
      </div>

      <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
        <input
          id="password"
          name="password"
          type="password"
          required
          autocomplete="current-password"
          class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
          placeholder="********"
        />
        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-600 text-xs" />
      </div>

      <div class="flex items-center">
        <input
          id="remember_me"
          name="remember"
          type="checkbox"
          class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
        />
        <label for="remember_me" class="ml-2 block text-sm text-gray-700 select-none">Ingat saya</label>
      </div>

      <div class="flex justify-between items-center">
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-900">
            Lupa password?
          </a>
        @endif

        <button
          type="submit"
          class="bg-indigo-600 text-white rounded-md px-5 py-2 text-sm font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          Masuk
        </button>
      </div>
    </form>

  </main>

</body>
</html>
