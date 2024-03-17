@extends('auth.templates.main')

@section('container')
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-6">Register</h2>
        @if ($errors->any())
            <div class="mb-4">
                <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 block w-full rounded border-gray-300">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email" class="mt-1 p-2 block w-full rounded border-gray-300">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 block w-full rounded border-gray-300">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 p-2 block w-full rounded border-gray-300">
            </div>
            <button type="submit"
            id="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Register</button>
            <br>
            <br>
            <a href="/login">
                <p class="text-sm ">Have an account?</p>
            </a>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#password_confirmation").on('input', function () {
                const password = $("#password");
                const passwordConfirmation = $("#password_confirmation");
                if(password.val() == passwordConfirmation.val()){
                    console.log("benar");
                    $("#password_confirmation").removeClass("bg-red-700");
                    $("#submit").prop("disabled", false);
                } else {
                    $("#password_confirmation").addClass("bg-red-700");
                    $("#submit").prop("disabled", true);
                }
            });
        });
    </script>
@endsection
