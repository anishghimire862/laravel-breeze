<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile avatar.") }}
        </p>
    </header>


    <form method="post" action="{{ route('profile.update.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        @if (Auth::user()->avatar)
            <div class="flex inline-block">
                <img class="h-8 w-8 mr-2" src="/avatars/{{ Auth::user()->avatar }}" />
                <x-text-input id="avatar" name="avatar" type="file" class="block w-full " required autofocus />
            </div>
        @endif

        <div>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'avatar-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Avatar updated.') }}</p>
            @endif
        </div>
    </form>
</section>
