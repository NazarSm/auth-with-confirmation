<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_PLACES_API_KEY') }}&libraries=places&language=en">
    </script>
</head>

<body>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('msg'))
    <div class="alert alert-danger">
        {{ session('msg') }}
    </div>
@endif

<div class="container">
    <div id="reg" class="row">
        <div class="col-md-11 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="text"
                               id="role"
                               name="role"
                               value="{{ $role }}"
                               hidden
                        >
                        @isset($idInvitingAgent)
                            <input type="text"
                                   id="agent_id"
                                   name="agent_id"
                                   value="{{ $idInvitingAgent }}"
                                   hidden
                            >
                        @endif

                        <div class="mt-4">
                            <x-jet-input id="email"
                                         class="block mt-1 w-full"
                                         type="email" name="email"
                                         required
                                         placeholder="Email"
                            ></x-jet-input>
                        </div>

                        <div class="mt-4">
                            <x-jet-input id="password"
                                         class="block mt-1 w-full"
                                         type="password"
                                         name="password"
                                         required
                                         placeholder="Password"
                            ></x-jet-input>
                        </div>

                        <div class="mt-4">
                            <x-jet-input id="password_confirmation"
                                         class="block mt-1 w-full"
                                         type="password"
                                         name="password_confirmation"
                                         required
                                         placeholder="Confirm password"
                            ></x-jet-input>
                        </div>

                        <div class="mt-4">
                            <x-jet-input id="siret_number"
                                         class="block mt-1 w-full"
                                         type="number"
                                         name="siret_number"
                                         required
                                         placeholder="Siret number"
                            ></x-jet-input>
                        </div>
                        <div class="mt-4">
                            <x-jet-input id="company_name"
                                         class="block mt-1 w-full"
                                         type="text"
                                         name="company_name"
                                         required
                                         placeholder="Company name"
                                         readonly
                            ></x-jet-input>
                        </div>
                        <div class="mt-4">
                            <x-jet-input id="address"
                                         class="block mt-1 w-full"
                                         type="text"
                                         name="address"
                                         required
                                         placeholder="Address"
                            ></x-jet-input>
                        </div>

                        <div class="mt-4">
                            <p>Gender</p>
                            <label for="ms">Ms</label>
                            <input type="radio" id="ms" name="gender" value="Ms"
                                   checked>

                            <label for="mrs">Mrs</label>
                            <input type="radio" id="mrs" name="gender" value="Mrs">
                        </div>

                        <div class="mt-4">
                            <x-jet-input id="name"
                                         class="block mt-1 w-full"
                                         type="text"
                                         name="name"
                                         required
                                         placeholder="Name"
                            ></x-jet-input>
                        </div>

                        <div class="mt-4">
                            <x-jet-input id="first_name"
                                         class="block mt-1 w-full"
                                         type="text"
                                         name="first_name"
                                         required
                                         placeholder="First name"
                            ></x-jet-input>
                        </div>

                        <div class="mt-4">
                            <x-jet-input id="phone"
                                         class="block mt-1 w-full"
                                         type="number"
                                         name="phone"
                                         required
                                         placeholder="Phone"
                            ></x-jet-input>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="categories">Please choose categories:</x-jet-label>
                            <div>
                                <select name="categories[]" id="categories" multiple required>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="photo">Please add a logo</x-jet-label>
                            <p><input type="file"
                                      id="photo"
                                      name="photo"
                                      accept="image/*"
                                />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button
                                class="ml-4">
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
        <script src="https://unpkg.com/vue@next"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
        <script src="{{ asset('js/register-client.js') }}"></script>
    </x-jet-authentication-card>
</x-guest-layout>

