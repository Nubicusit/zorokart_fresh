<section>
    <header>
        <h2 class="profile-head">
            {{ __('Verify My Account') }}
        </h2>

        <p class="profile-sub-head">
            {{ __("Verify your account so that you can eligible to use all the features.") }}
        </p>
    </header>

    <form method="post" action="{{ route('verificationData.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="form-group">
            <x-input-label for="business_pan" :value="__('Business PAN Number')" class="profile-label" />
            <x-text-input id="business_pan" name="business_pan" type="text" class="profile-input mt-1 block w-full" :value="old('business_pan', $v_data?->business_pan)" :disabled="$user->flag == 1" required autocomplete="business_pan" autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('business_pan')" />
        </div>

        <div class="form-group">
            <x-input-label for="gstin" :value="__('GSTIN Number')" class="profile-label" />
            <x-text-input id="gstin" name="gstin" type="text" class="profile-input mt-1 block w-full" :value="old('gstin', $v_data?->gstin)" :disabled="$user->flag == 1" required autocomplete="gstin" />
            <x-input-error class="mt-2" :messages="$errors->get('gstin')" />
        </div>

        <div class="form-group">
            <x-input-label for="aadhar" :value="__('Aadhar Number')" class="profile-label" />
            <x-text-input id="aadhar" name="aadhar" type="text" class="profile-input mt-1 block w-full" :value="old('aadhar', $v_data?->aadhar)" :disabled="$user->flag == 1" required autocomplete="aadhar" />
            <x-input-error class="mt-2" :messages="$errors->get('aadhar')" />
        </div>

        <div class="flex items-center gap-4">
            @if ($user->flag == 1)
                <p class="text-green-600 font-medium">{{ __('Your Account is Verified') }}</p>
            @else
                <x-primary-button class="profile-button">{{ __('Verify') }}</x-primary-button>
            @endif

            @if (session('status') === 'verification-data-submitted')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Verification data submitted.') }}</p>
            @endif
        </div>
    </form>
</section>
