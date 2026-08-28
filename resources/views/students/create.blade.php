<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative min-h-screen overflow-x-hidden bg-[#FCFCFD] text-[#171717] antialiased">

    {{-- Soft background colors inspired by reference --}}
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute -left-40 -top-40 h-[520px] w-[520px] rounded-full bg-[#EEF0FF] blur-[120px]"></div>

        <div class="absolute right-[-180px] top-[-100px] h-[500px] w-[500px] rounded-full bg-[#FFF4D8] blur-[130px]"></div>

        <div class="absolute bottom-[-200px] left-[30%] h-[520px] w-[520px] rounded-full bg-[#DDEEFF] blur-[130px]"></div>

        <div class="absolute bottom-[-180px] right-[-100px] h-[420px] w-[420px] rounded-full bg-[#F5E7FF] blur-[130px]"></div>

    </div>


    {{-- Navigation --}}
    <header class="relative z-10">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-6 lg:px-8">

            {{-- Brand --}}
            <div class="flex items-center gap-2.5">

                <div class="flex h-8 w-8 items-center justify-center rounded-full border-[4px] border-[#4F46E5]">
                    <div class="h-2 w-2 rounded-full bg-[#4F46E5]"></div>
                </div>

                <div>
                    <p class="text-base font-bold tracking-tight text-[#171717]">
                        Student Portal
                    </p>
                </div>

            </div>


            <div class="hidden text-sm text-[#6B7280] sm:block">
                Student Registration System
            </div>

        </div>
    </header>


    {{-- Main --}}
    <main class="relative z-10 mx-auto max-w-5xl px-5 pb-16 pt-7 sm:px-6 lg:px-8">


        {{-- Header --}}
        <div class="mb-10 text-center">

            <span class="mb-4 inline-flex items-center rounded-full border border-[#E2E1FF] bg-[#F5F4FF] px-3.5 py-1.5 text-xs font-semibold text-[#4F46E5]">
                New Student Registration
            </span>

            <h1 class="text-3xl font-bold tracking-tight text-[#161616] sm:text-4xl">
                Let’s get you registered
            </h1>

            <p class="mx-auto mt-3 max-w-xl text-sm leading-6 text-[#777777]">
                Enter your student information below. Please make sure all required
                details are complete and accurate.
            </p>

        </div>


        {{-- Progress --}}
        <div class="mx-auto mb-12 max-w-3xl">

            <div class="flex items-center justify-between">

                {{-- Step 1 --}}
                <div class="flex shrink-0 items-center gap-3">

                    <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-[#4F46E5] bg-white text-xs font-semibold text-[#4F46E5]">
                        1
                    </div>

                    <span class="hidden text-sm font-medium text-[#3730A3] sm:block">
                        General Details
                    </span>

                </div>


                <div class="mx-4 h-px flex-1 bg-[#D6D6DC]"></div>


                {{-- Step 2 --}}
                <div class="flex shrink-0 items-center gap-3">

                    <div class="flex h-8 w-8 items-center justify-center rounded-full border border-[#BFC0C7] bg-white text-xs font-medium text-[#55565C]">
                        2
                    </div>

                    <span class="hidden text-sm text-[#8A8A90] sm:block">
                        Academic Details
                    </span>

                </div>


                <div class="mx-4 h-px flex-1 bg-[#D6D6DC]"></div>


                {{-- Step 3 --}}
                <div class="flex shrink-0 items-center gap-3">

                    <div class="flex h-8 w-8 items-center justify-center rounded-full border border-[#BFC0C7] bg-white text-xs font-medium text-[#55565C]">
                        3
                    </div>

                    <span class="hidden text-sm text-[#8A8A90] sm:block">
                        Profile & Submit
                    </span>

                </div>

            </div>

        </div>


        {{-- Error Summary --}}
        @if ($errors->any())

            <div class="mb-7 rounded-xl border border-[#F6BDBD] bg-[#FFF5F5] px-5 py-4">

                <div class="flex items-start gap-3">

                    <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#FEE2E2] text-[#DC2626]">

                        <svg class="h-4 w-4"
                             xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 9v3.75m9.303 3.376c.866 1.5-.217 3.374-1.948 3.374H4.645c-1.73 0-2.813-1.874-1.948-3.374L10.052 3.38c.866-1.5 3.032-1.5 3.898 0l7.353 12.746ZM12 16.5h.008v.008H12V16.5Z"/>
                        </svg>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-[#B91C1C]">
                            Please check your information
                        </p>

                        <ul class="mt-2 space-y-1 text-xs text-[#DC2626]">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- Success --}}
        @if (session('success'))

            <div class="mb-7 rounded-xl border border-[#B7E4C7] bg-[#F0FFF4] px-5 py-4 text-sm font-medium text-[#15803D]">
                {{ session('success') }}
            </div>

        @endif


        {{-- Form --}}
        <form
            action="{{ route('students.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- General Details --}}
            <section class="mb-11">

                <div class="mb-6">

                    <h2 class="text-lg font-semibold text-[#222222]">
                        General Details
                    </h2>

                    <p class="mt-1 text-sm text-[#8A8A8A]">
                        Enter your basic student and personal information.
                    </p>

                </div>


                <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">


                    {{-- Student ID --}}
                    <div>

                        <label
                            for="student_id"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Student ID <span class="text-[#4F46E5]">*</span>
                        </label>

                        <input
                            id="student_id"
                            type="text"
                            name="student_id"
                            value="{{ old('student_id') }}"
                            placeholder="Enter your Student ID"
                            class="w-full rounded-lg border
                            @error('student_id')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#272727]
                            placeholder:text-[#A7A7AD]
                            shadow-[0_1px_2px_rgba(0,0,0,0.02)]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                        @error('student_id')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Email --}}
                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Email Address <span class="text-[#4F46E5]">*</span>
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your Email Address"
                            class="w-full rounded-lg border
                            @error('email')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#272727]
                            placeholder:text-[#A7A7AD]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                        @error('email')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- First Name --}}
                    <div>

                        <label
                            for="first_name"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            First Name <span class="text-[#4F46E5]">*</span>
                        </label>

                        <input
                            id="first_name"
                            type="text"
                            name="first_name"
                            value="{{ old('first_name') }}"
                            placeholder="Enter your First Name"
                            class="w-full rounded-lg border
                            @error('first_name')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#272727]
                            placeholder:text-[#A7A7AD]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                        @error('first_name')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Last Name --}}
                    <div>

                        <label
                            for="last_name"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Last Name <span class="text-[#4F46E5]">*</span>
                        </label>

                        <input
                            id="last_name"
                            type="text"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            placeholder="Enter your Last Name"
                            class="w-full rounded-lg border
                            @error('last_name')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#272727]
                            placeholder:text-[#A7A7AD]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                        @error('last_name')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Middle Name --}}
                    <div>

                        <label
                            for="middle_name"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Middle Name
                            <span class="font-normal text-[#9B9B9B]">
                                (Optional)
                            </span>
                        </label>

                        <input
                            id="middle_name"
                            type="text"
                            name="middle_name"
                            value="{{ old('middle_name') }}"
                            placeholder="Enter your Middle Name"
                            class="w-full rounded-lg border border-[#D5D5DA]
                            bg-white/90 px-4 py-3 text-sm text-[#272727]
                            placeholder:text-[#A7A7AD]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                    </div>


                    {{-- Mobile --}}
                    <div>

                        <label
                            for="mobile_number"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Mobile Number <span class="text-[#4F46E5]">*</span>
                        </label>

                        <input
                            id="mobile_number"
                            type="text"
                            name="mobile_number"
                            value="{{ old('mobile_number') }}"
                            placeholder="09XXXXXXXXX"
                            inputmode="numeric"
                            class="w-full rounded-lg border
                            @error('mobile_number')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#272727]
                            placeholder:text-[#A7A7AD]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                        @error('mobile_number')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Gender --}}
                    <div>

                        <label
                            for="gender"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Gender <span class="text-[#4F46E5]">*</span>
                        </label>

                        <select
                            id="gender"
                            name="gender"
                            class="w-full rounded-lg border
                            @error('gender')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#555555]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                            <option value="">Select</option>

                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>

                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>

                            <option value="Prefer not to say" {{ old('gender') == 'Prefer not to say' ? 'selected' : '' }}>
                                Prefer not to say
                            </option>

                        </select>

                        @error('gender')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Birthday --}}
                    <div>

                        <label
                            for="date_of_birth"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Date of Birth <span class="text-[#4F46E5]">*</span>
                        </label>

                        <input
                            id="date_of_birth"
                            type="date"
                            name="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                            class="w-full rounded-lg border
                            @error('date_of_birth')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#555555]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                        @error('date_of_birth')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

            </section>


            {{-- Divider --}}
            <div class="mb-10 h-px bg-[#E8E8EC]"></div>


            {{-- Academic Details --}}
            <section class="mb-11">

                <div class="mb-6">

                    <h2 class="text-lg font-semibold text-[#222222]">
                        Academic Details
                    </h2>

                    <p class="mt-1 text-sm text-[#8A8A8A]">
                        Provide your current academic information.
                    </p>

                </div>


                <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">


                    {{-- Program --}}
                    <div>

                        <label
                            for="program"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Program <span class="text-[#4F46E5]">*</span>
                        </label>

                        <select
                            id="program"
                            name="program"
                            class="w-full rounded-lg border
                            @error('program')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#555555]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                            <option value="">Select Program</option>

                            <option value="BSIT" {{ old('program') == 'BSIT' ? 'selected' : '' }}>
                                BS Information Technology
                            </option>

                            <option value="BSCS" {{ old('program') == 'BSCS' ? 'selected' : '' }}>
                                BS Computer Science
                            </option>

                            <option value="BSIS" {{ old('program') == 'BSIS' ? 'selected' : '' }}>
                                BS Information Systems
                            </option>

                        </select>

                        @error('program')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Year --}}
                    <div>

                        <label
                            for="year_level"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Year Level <span class="text-[#4F46E5]">*</span>
                        </label>

                        <select
                            id="year_level"
                            name="year_level"
                            class="w-full rounded-lg border
                            @error('year_level')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#555555]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >

                            <option value="">Select Year Level</option>

                            <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>
                                1st Year
                            </option>

                            <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>
                                2nd Year
                            </option>

                            <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>
                                3rd Year
                            </option>

                            <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>
                                4th Year
                            </option>

                        </select>

                        @error('year_level')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Address --}}
                    <div class="md:col-span-2">

                        <label
                            for="address"
                            class="mb-2 block text-xs font-semibold text-[#333333]"
                        >
                            Complete Address <span class="text-[#4F46E5]">*</span>
                        </label>

                        <textarea
                            id="address"
                            name="address"
                            rows="4"
                            placeholder="Enter your complete address"
                            class="w-full resize-none rounded-lg border
                            @error('address')
                                border-[#EF4444]
                            @else
                                border-[#D5D5DA]
                            @enderror
                            bg-white/90 px-4 py-3 text-sm text-[#272727]
                            placeholder:text-[#A7A7AD]
                            outline-none transition
                            focus:border-[#4F46E5]
                            focus:ring-2
                            focus:ring-[#4F46E5]/10"
                        >{{ old('address') }}</textarea>

                        @error('address')
                            <p class="mt-1.5 text-[11px] font-medium text-[#DC2626]">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

            </section>


            <div class="mb-10 h-px bg-[#E8E8EC]"></div>


            {{-- Profile --}}
            <section>

                <div class="mb-6">

                    <h2 class="text-lg font-semibold text-[#222222]">
                        Profile Picture
                    </h2>

                    <p class="mt-1 text-sm text-[#8A8A8A]">
                        Upload a clear student profile image.
                    </p>

                </div>


                <label
                    for="profile_picture"
                    class="group flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed
                    @error('profile_picture')
                        border-[#EF4444] bg-[#FFF7F7]
                    @else
                        border-[#D5D5DA] bg-white/70
                    @enderror
                    px-6 py-10 text-center transition
                    hover:border-[#6366F1]
                    hover:bg-[#F8F7FF]"
                >

                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-[#EEEEFF] text-[#4F46E5]">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="h-5 w-5"
                        >
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M7.5 9 12 4.5m0 0L16.5 9M12 4.5V16.5"/>
                        </svg>

                    </div>

                    <p class="text-sm font-semibold text-[#333333]">
                        Upload your profile picture
                    </p>

                    <p class="mt-1 text-xs text-[#919197]">
                        Click to browse from your device
                    </p>

                    <p class="mt-3 text-[11px] text-[#A3A3A8]">
                        JPG, JPEG or PNG · Maximum 2MB
                    </p>

                </label>


                <input
                    id="profile_picture"
                    type="file"
                    name="profile_picture"
                    accept=".jpg,.jpeg,.png"
                    class="sr-only"
                >

                @error('profile_picture')
                    <p class="mt-2 text-[11px] font-medium text-[#DC2626]">
                        {{ $message }}
                    </p>
                @enderror

            </section>


            {{-- Submit --}}
            <div class="mt-10 flex justify-center">

                <button
                    type="submit"
                    class="inline-flex min-w-40 items-center justify-center gap-2 rounded-lg
                    bg-[#4F46B8]
                    px-7 py-3
                    text-sm font-semibold text-white
                    shadow-[0_8px_20px_rgba(79,70,184,0.18)]
                    transition
                    hover:bg-[#4338A8]
                    focus:outline-none
                    focus:ring-4
                    focus:ring-[#4F46E5]/15
                    active:translate-y-[1px]"
                >
                    Register Student

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="h-4 w-4"
                    >
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>

                </button>

            </div>


        </form>

    </main>


    <footer class="relative z-10 py-8 text-center">

        <p class="text-xs text-[#A0A0A5]">
            Student Registration System · Secure Laravel Registration
        </p>

    </footer>

</body>
</html>