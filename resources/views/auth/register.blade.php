<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        
 
 
        <!-- address1 -->
        <div class="mt-4">
            <x-input-label for="address1" :value="__('address1')" />
            <x-text-input id="address_id" class="block mt-1 w-full" type="text" name="address1" :value="old('address1')" required autocomplete="address1" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        
        
        <!-- Country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('country')" />
            <x-text-input id="address_id" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autocomplete="country" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        
        <!-- postal_code -->
        <div class="mt-4">
            <x-input-label for="postal_code" :value="__('postal_code')" />
            <x-text-input id="address_id" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" required autocomplete="postal_code" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        
        <!-- state -->
        <div class="mt-4">
            <x-input-label for="state" :value="__('state')" />
            <x-text-input id="address_id" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autocomplete="state" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <!-- city -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('city')" />
            <x-text-input id="address_id" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="city" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        
        <!-- street -->
        <div class="mt-4">
            <x-input-label for="street" :value="__('street')" />
            <x-text-input id="address_id" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required autocomplete="street" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        
        
        
        
        

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
