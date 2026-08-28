<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $student->first_name }} {{ $student->last_name }} | Student Profile</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-100 px-4 py-10">

    <div class="mx-auto max-w-5xl">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-green-100">
                        ✓
                    </div>

                    <div>
                        <p class="font-semibold">
                            Registration Successful
                        </p>

                        <p class="text-sm">
                            {{ session('success') }}
                        </p>
                    </div>

                </div>
            </div>
        @endif


        {{-- Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="mb-1 text-sm font-medium text-blue-600">
                    Student Registration System
                </p>

                <h1 class="text-3xl font-bold text-gray-900">
                    Student Profile
                </h1>

                <p class="mt-1 text-gray-500">
                    Registered student information
                </p>
            </div>


            <a
                href="{{ route('students.create') }}"
                class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50"
            >
                + Register Another Student
            </a>

        </div>


        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">


            {{-- Profile Header --}}
            <div class="border-b border-gray-200 px-6 py-8 sm:px-8">

                <div class="flex flex-col items-center gap-6 sm:flex-row sm:items-center">

                    {{-- Profile Picture --}}
                    <div class="shrink-0">

                        @if ($student->profile_picture)

                            <img
                                src="{{ asset('storage/' . $student->profile_picture) }}"
                                alt="{{ $student->first_name }} {{ $student->last_name }}"
                                class="h-32 w-32 rounded-2xl border border-gray-200 object-cover shadow-sm"
                            >

                        @else

                            <div class="flex h-32 w-32 items-center justify-center rounded-2xl bg-gray-100 text-4xl font-bold text-gray-400">
                                {{ strtoupper(substr($student->first_name, 0, 1)) }}
                                {{ strtoupper(substr($student->last_name, 0, 1)) }}
                            </div>

                        @endif

                    </div>


                    {{-- Student Name --}}
                    <div class="text-center sm:text-left">

                        <div class="mb-2 inline-flex rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                            Registered Student
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900">

                            {{ $student->first_name }}

                            @if ($student->middle_name)
                                {{ $student->middle_name }}
                            @endif

                            {{ $student->last_name }}

                        </h2>

                        <p class="mt-2 text-gray-500">
                            Student ID:
                            <span class="font-medium text-gray-700">
                                {{ $student->student_id }}
                            </span>
                        </p>

                        <p class="mt-1 text-sm text-gray-400">
                            Registered {{ $student->created_at->format('F d, Y') }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Student Information --}}
            <div class="p-6 sm:p-8">

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">


                    {{-- Personal Information --}}
                    <div>

                        <h3 class="mb-5 border-b border-gray-100 pb-3 text-lg font-semibold text-gray-900">
                            Personal Information
                        </h3>

                        <div class="space-y-5">


                            <div>
                                <p class="text-sm text-gray-500">
                                    Full Name
                                </p>

                                <p class="mt-1 font-medium text-gray-900">

                                    {{ $student->first_name }}

                                    @if ($student->middle_name)
                                        {{ $student->middle_name }}
                                    @endif

                                    {{ $student->last_name }}

                                </p>
                            </div>


                            <div>
                                <p class="text-sm text-gray-500">
                                    Date of Birth
                                </p>

                                <p class="mt-1 font-medium text-gray-900">
                                    {{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}
                                </p>
                            </div>


                            <div>
                                <p class="text-sm text-gray-500">
                                    Gender
                                </p>

                                <p class="mt-1 font-medium text-gray-900">
                                    {{ $student->gender }}
                                </p>
                            </div>


                            <div>
                                <p class="text-sm text-gray-500">
                                    Address
                                </p>

                                <p class="mt-1 leading-relaxed text-gray-900">
                                    {{ $student->address }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Academic / Contact Information --}}
                    <div>

                        <h3 class="mb-5 border-b border-gray-100 pb-3 text-lg font-semibold text-gray-900">
                            Academic & Contact Information
                        </h3>

                        <div class="space-y-5">


                            <div>
                                <p class="text-sm text-gray-500">
                                    Student ID
                                </p>

                                <p class="mt-1 font-medium text-gray-900">
                                    {{ $student->student_id }}
                                </p>
                            </div>


                            <div>
                                <p class="text-sm text-gray-500">
                                    Program
                                </p>

                                <p class="mt-1 font-medium text-gray-900">
                                    {{ $student->program }}
                                </p>
                            </div>


                            <div>
                                <p class="text-sm text-gray-500">
                                    Year Level
                                </p>

                                <p class="mt-1 font-medium text-gray-900">
                                    {{ $student->year_level }}
                                </p>
                            </div>


                            <div>
                                <p class="text-sm text-gray-500">
                                    Email Address
                                </p>

                                <p class="mt-1 break-all font-medium text-gray-900">
                                    {{ $student->email }}
                                </p>
                            </div>


                            <div>
                                <p class="text-sm text-gray-500">
                                    Mobile Number
                                </p>

                                <p class="mt-1 font-medium text-gray-900">
                                    {{ $student->mobile_number }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="border-t border-gray-200 bg-gray-50 px-6 py-5 sm:px-8">

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <p class="text-sm text-gray-500">
                        Student record successfully stored in the database.
                    </p>

                    <a
                        href="{{ route('students.create') }}"
                        class="text-sm font-semibold text-blue-600 hover:text-blue-700"
                    >
                        Register another student →
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>
</html>