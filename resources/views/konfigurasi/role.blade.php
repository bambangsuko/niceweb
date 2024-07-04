@extends('admin.admin_master')
@section('admin')

<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Konfigurasi
        </h2>
        <!-- 
        @php
        $id = Auth::user()->id;
        $adminData = App\Models\User::find($id);
        @endphp -->

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h3 class="m-3 text-xl font-normal text-gray-700 dark:text-gray-200">
                Role
            </h3>

        </div>
    </div>
</main>


@endsection