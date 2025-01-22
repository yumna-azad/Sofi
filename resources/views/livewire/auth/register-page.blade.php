<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="flex h-full items-center">
    <main class="w-full max-w-md mx-auto p-6">
      <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800">Submit</h1>
            <p class="mt-2 text-sm text-gray-600">
              Already have an account?
              <a class="text-blue-600 decoration-2 hover:underline font-medium" href="/login">
                Sign in here
              </a>
            </p>
          </div>
          <hr class="my-5 border-slate-300">
          <!-- Form -->
          <form wire:submit.prevent="submit">

            <div class="grid gap-y-4">
              <!-- Form Group for Name -->
              <div>
                <label for="name" class="block text-sm mb-2">Name</label>
                <div class="relative">
                  <input type="text" id="name" wire:model="name" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" aria-describedby="name-error">
                  @error('name')
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                  </div>
                  @enderror
                </div>
                @error('name')
                <p class="text-xs text-red-600 mt-2" id="name-error">{{ $message }}</p>
                @enderror
              </div>

              <!-- Form Group for Email -->
              <div>
                <label for="email" class="block text-sm mb-2">Email</label>
                <div class="relative">
                  <input type="email" id="email" wire:model="email" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" aria-describedby="email-error">
                  @error('email')
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                  </div>
                  @enderror
                </div>
                @error('email')
                <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                @enderror
              </div>

              <!-- Form Group for Password -->
              <div>
                <label for="password" class="block text-sm mb-2">Password</label>
                <div class="relative">
                  <input type="password" id="password" wire:model="password" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" aria-describedby="password-error">
                  @error('password')
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                  </div>
                  @enderror
                </div>
                @error('password')
                <p class="text-xs text-red-600 mt-2" id="password-error">{{ $message }}</p>
                @enderror
              </div>

              <!-- Sign-up Button -->
              <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">submit</button>
            </div>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </main>
  </div>
</div>
