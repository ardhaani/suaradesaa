<section class="flex items-center justify-center min-h-screen bg-gray-50 px-4">
  <div class="w-full max-w-xl bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold text-center mb-6">Registrasi</h2>

    <form action="/register" method="POST" class="space-y-4">
      @csrf

      <div>
        <label for="name" class="block mb-1 font-medium">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"
          class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror" required>
        @error('name')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="nik" class="block mb-1 font-medium">NIK</label>
        <input type="number" id="nik" name="nik" value="{{ old('nik') }}"
          class="w-full px-4 py-2 border rounded-lg @error('nik') border-red-500 @enderror" required>
        @error('nik')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="tgl_lahir" class="block mb-1 font-medium">Tanggal Lahir</label>
        <input type="text" id="tgl_lahir" name="tgl_lahir"
          class="w-full px-4 py-2 border rounded-lg @error('tgl_lahir') border-red-500 @enderror" required>
        @error('tgl_lahir')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="umur" class="block mb-1 font-medium">Umur</label>
        <input type="text" id="umur" name="umur" readonly
          class="w-full px-4 py-2 border rounded-lg bg-gray-100 @error('umur') border-red-500 @enderror" required>
        @error('umur')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="username" class="block mb-1 font-medium">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}"
          class="w-full px-4 py-2 border rounded-lg @error('username') border-red-500 @enderror" required>
        @error('username')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="email" class="block mb-1 font-medium">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
          class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror" required>
        @error('email')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password" class="block mb-1 font-medium">Password</label>
        <input type="password" id="password" name="password"
          class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror" required>
        @error('password')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
        Register
      </button>

      <p class="text-sm text-center mt-2">Sudah punya akun? <a href="/login" class="text-blue-600 hover:underline">Login Sekarang!</a></p>
    </form>
  </div>
</section>
