<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{--  <x-jet-authentication-card-logo />--}}
        </x-slot>

        <div style="text-align: center;">
            <a href="{{ route('registration',  ['client']) }}" class="ml-4 text-sm text-gray-700 underline">Register for client</a>
            <a href="{{ route('registration',  ['agent']) }}" class="ml-4 text-sm text-gray-700 underline">Register for agent</a>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
