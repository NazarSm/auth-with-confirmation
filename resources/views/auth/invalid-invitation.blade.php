<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <p style="text-align: center;" >
            The invitation is not valid
        </p>
        <x-jet-label style="text-align: center;">
            If you want to go to the home page, <a href="{{ url('/') }}"><b>click here</b></a>
        </x-jet-label>
    </x-jet-authentication-card>
</x-guest-layout>
