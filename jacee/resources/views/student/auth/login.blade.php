<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('student.login') }}">
            @csrf
            <div class="grid gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <x-label for="email" :value="__('Email')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="email" class="block w-full" type="email" name="email"
                            :value="old('email')" placeholder="{{ __('Email') }}" required autofocus />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-label for="password" :value="__('Password')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="password" class="block w-full" type="password" name="password" required
                            autocomplete="current-password" placeholder="{{ __('Password') }}" />
                    </x-input-with-icon-wrapper>
                </div>

                <div>
                    <x-button class="justify-center w-full gap-2">
                        <x-heroicon-o-login class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('Log in') }}</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
