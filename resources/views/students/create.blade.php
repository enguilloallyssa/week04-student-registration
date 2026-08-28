<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen py-10 px-4">

<div class="max-w-4xl mx-auto">

    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900">
            Student Registration
        </h1>

        <p class="text-gray-500 mt-2">
            Fill out the form below to register a student.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl p-4">
                <h2 class="font-semibold mb-2">
                    Please correct the following errors:
                </h2>

                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if (session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-xl p-4">
                {{ session('success') }}
            </div>
        @endif


        <form
            action="{{ route('students.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf


            {{-- Student Information --}}
            <div class="mb-8">

                <h2 class="text-lg font-semibold text-gray-900 mb-5">
                    Student Information
                </h2>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Student ID
                        </label>

                        <input
                            type="text"
                            name="student_id"
                            value="{{ old('student_id') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter student ID"
                        >

                        @error('student_id')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="student@example.com"
                        >

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

            </div>


            {{-- Personal Information --}}
            <div class="mb-8">

                <h2 class="text-lg font-semibold text-gray-900 mb-5">
                    Personal Information
                </h2>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            First Name
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            value="{{ old('first_name') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                            placeholder="First name"
                        >

                        @error('first_name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Middle Name
                        </label>

                        <input
                            type="text"
                            name="middle_name"
                            value="{{ old('middle_name') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                            placeholder="Middle name"
                        >
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Last Name
                        </label>

                        <input
                            type="text"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                            placeholder="Last name"
                        >

                        @error('last_name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

            </div>


            {{-- Contact and Personal Details --}}
            <div class="mb-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Mobile Number
                        </label>

                        <input
                            type="text"
                            name="mobile_number"
                            value="{{ old('mobile_number') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                            placeholder="09XXXXXXXXX"
                        >

                        @error('mobile_number')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            name="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        >

                        @error('date_of_birth')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Gender
                        </label>

                        <select
                            name="gender"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        >
                            <option value="">Select gender</option>

                            <option value="Male"
                                {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>

                            <option value="Female"
                                {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>

                            <option value="Prefer not to say"
                                {{ old('gender') == 'Prefer not to say' ? 'selected' : '' }}>
                                Prefer not to say
                            </option>
                        </select>

                        @error('gender')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Program
                        </label>

                        <select
                            name="program"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        >
                            <option value="">Select program</option>

                            <option value="BSIT"
                                {{ old('program') == 'BSIT' ? 'selected' : '' }}>
                                BS Information Technology
                            </option>

                            <option value="BSCS"
                                {{ old('program') == 'BSCS' ? 'selected' : '' }}>
                                BS Computer Science
                            </option>

                            <option value="BSIS"
                                {{ old('program') == 'BSIS' ? 'selected' : '' }}>
                                BS Information Systems
                            </option>
                        </select>

                        @error('program')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Year Level
                        </label>

                        <select
                            name="year_level"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        >
                            <option value="">Select year level</option>

                            <option value="1st Year"
                                {{ old('year_level') == '1st Year' ? 'selected' : '' }}>
                                1st Year
                            </option>

                            <option value="2nd Year"
                                {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>
                                2nd Year
                            </option>

                            <option value="3rd Year"
                                {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>
                                3rd Year
                            </option>

                            <option value="4th Year"
                                {{ old('year_level') == '4th Year' ? 'selected' : '' }}>
                                4th Year
                            </option>

                        </select>

                        @error('year_level')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

            </div>


            {{-- Address --}}
            <div class="mb-8">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Address
                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    placeholder="Enter complete address"
                >{{ old('address') }}</textarea>

                @error('address')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Profile Picture --}}
            <div class="mb-8">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Profile Picture
                </label>

                <input
                    type="file"
                    name="profile_picture"
                    accept=".jpg,.jpeg,.png"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white"
                >

                <p class="text-sm text-gray-500 mt-2">
                    JPG, JPEG, or PNG only. Maximum size: 2MB.
                </p>

                @error('profile_picture')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="flex justify-end">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-7 py-3 rounded-lg transition"
                >
                    Register Student
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>