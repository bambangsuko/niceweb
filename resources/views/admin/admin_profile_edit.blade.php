@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Profile
        </h2>
        <!-- 
        @php
        $id = Auth::user()->id;
        $adminData = App\Models\User::find($id);
        @endphp -->

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <form action="{{ route('web.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Avatar view -->
                <div class="image bg-gray-100 rounded-full">
                    <img id="showImage" class="m-4 object-cover w-40 h-40 rounded-full" src="{{ isset($adminData->profile_image) ? url('upload/admin_images/') . $adminData->profile_image : url ('upload/no_image.png') }}" alt="User Image">
                </div>

                <h3 class="text-gray-600">Silahkan edit nama dan email anda!</h3>

                <!-- Nama input -->
                <label for="name" class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="name" name="name" value="{{ $editData->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />

                <!-- Email input -->
                <label for="email" class="mt-3 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email" value="{{ $editData->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />

                <!-- Avatar input -->

                <label class="mt-3 block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload avatar :</label>
                <input class="block w-full text-sm text-green-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400" id="image" type="file" name="profile_image">

                <!-- Edit button -->
                <button type="submit" class="mt-4 mb-2 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                    Update Profile
                </button>
            </form>

        </div>
    </div>
</main>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader()
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>

@endsection