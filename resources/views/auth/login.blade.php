<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- JASPER Logo -->
        <div class="m-2 p-4 flex justify-center items-center">
          <img class="h-10 w-15" src='../../images/Logo.PNG'>
          <h1 class="text-white text-4xl font-sans-roboto font-bold">JASPER</h1>
        </div>
        
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm font-sans-roboto text-gray-200">{{ __('Remember me') }}</span>
                </label>
            </div>
              <x-button>
                    {{ __('Login') }}
              </x-button>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm font-sans-roboto text-gray-200 hover:text-gray-400" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <div class="flex items-center justify-center mt-4">
                <span class="mr-2 text-sm font-sans-roboto text-gray-200">Don't have an account?</span>
                <a class="underline text-sm font-sans-roboto text-gray-200 hover:text-gray-400" href="{{ route('register') }}">
                  {{ __('Register') }}
                </a>
            </div> 
        </form>
    </x-auth-card>
</x-guest-layout>
