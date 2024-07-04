@extends('admin.admin_master')
@section('admin')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Your Profile
        </h2>

        <!-- @php
        $id = Auth::user()->id;
        $adminData = App\Models\User::find($id);
        @endphp -->

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <!-- Avatar view -->
            <div class="flex bg-gray-100 rounded-full">
                <div class="image flex-initial">
                    <img class="m-3 object-cover w-40 h-40 rounded-full" src="{{ isset($adminData->profile_image) ? url('upload/admin_images/') . $adminData->profile_image : url ('upload/no_image.png') }}" alt="User Image">
                </div>
                <div class="flex-initial mb-16 mt-16">
                    <h3 class="text-xl font-bold">{{ $adminData->name }}</h3>
                    <h3 class="text-xl font-normal">{{ $adminData->email }}</h3>
                </div>


            </div>

            <h3 class="mt-3 text-gray-600">Berikut informasi tentang profil anda!</h3>

            <!-- Nama view -->
            <label class="mt-3 block text-sm">
                <span class="text-gray-700 font-semibold dark:text-gray-400">
                    Nama : <span class="font-normal">{{ $adminData->name }}</span>
                </span>
                <span class="block w-full border"></span>
            </label>

            <!-- Email view -->
            <label class="mt-2 block text-sm">
                <span class="text-gray-700 font-semibold dark:text-gray-400">
                    Email : <span class="font-normal">{{ $adminData->email }}</span>
                </span>
                <span class="block w-full border"></span>
            </label>

            <!-- Edit button -->
            <button class="mt-4 mb-2 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                <a href="{{ route('edit.profile') }}">Edit Profile</a>
            </button>

        </div>
    </div>
</main>
@endsection