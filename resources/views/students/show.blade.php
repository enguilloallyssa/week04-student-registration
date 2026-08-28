<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $student->first_name }} {{ $student->last_name }} | Student Profile</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative min-h-screen overflow-x-hidden bg-[#FCFCFD] text-[#171717] antialiased">

    {{-- Soft Background Glow --}}
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute -left-40 -top-40 h-[500px] w-[500px] rounded-full bg-[#EEF0FF] blur-[120px]"></div>

        <div class="absolute right-[-180px] top-[-120px] h-[500px] w-[500px] rounded-full bg-[#FFF4D8] blur-[130px]"></div>

        <div class="absolute bottom-[-200px] left-[25%] h-[520px] w-[520px] rounded-full bg-[#DDEEFF] blur-[130px]"></div>

        <div class="absolute bottom-[-180px] right-[-100px] h-[420px] w-[420px] rounded-full bg-[#F5E7FF] blur-[130px]"></div>

    </div>


    {{-- Navigation --}}
    <header class="relative z-10">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-6 lg:px-8">

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


            <a
                href="{{ route('students.create') }}"
                class="hidden items-center gap-2 text-sm font-medium text-[#4F46B8] transition hover:text-[#3730A3] sm:inline-flex"
            >
                Register another student

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="h-4 w-4"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"
                    />
                </svg>
            </a>

        </div>

    </header>


    <main class="relative z-10 mx-auto max-w-5xl px-5 pb-16 pt-7 sm:px-6 lg:px-8">


        {{-- Success Message --}}
        @if (session('success'))

            <div class="mb-8 rounded-xl border border-[#CDE9D5] bg-[#F2FFF6]/90 px-5 py-4">

                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#DDF7E5] text-[#16803A]">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="h-4 w-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m4.5 12.75 6 6 9-13.5"
                            />
                        </svg>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-[#166534]">
                            Registration Successful
                        </p>

                        <p class="mt-1 text-xs leading-5 text-[#3F7E51]">
                            {{ session('success') }}
                        </p>

                    </div>

                </div>

            </div>

        @endif


        {{-- Page Heading --}}
        <div class="mb-9 text-center">

            <span class="mb-4 inline-flex items-center rounded-full border border-[#E2E1FF] bg-[#F5F4FF] px-3.5 py-1.5 text-xs font-semibold text-[#4F46E5]">
                Registration Complete
            </span>

            <h1 class="text-3xl font-bold tracking-tight text-[#161616] sm:text-4xl">
                Student Profile
            </h1>

            <p class="mx-auto mt-3 max-w-xl text-sm leading-6 text-[#777777]">
                Your student information has been successfully saved.
                Review the details below.
            </p>

        </div>


        {{-- Main Profile Card --}}
        <div class="overflow-hidden rounded-2xl border border-[#E5E5EA] bg-white/85 shadow-[0_15px_45px_rgba(79,70,184,0.07)] backdrop-blur-sm">


            {{-- Profile Header --}}
            <div class="border-b border-[#EEEEF2] px-6 py-8 sm:px-8">

                <div class="flex flex-col items-center gap-6 sm:flex-row">


                    {{-- Photo --}}
                    <div class="relative shrink-0">

                        <div class="absolute -inset-2 rounded-2xl bg-[#EEEEFF]"></div>

                        @if ($student->profile_picture)

                            <img
                                src="{{ asset('storage/' . $student->profile_picture) }}"
                                alt="{{ $student->first_name }} {{ $student->last_name }}"
                                class="relative h-32 w-32 rounded-2xl border border-white object-cover shadow-md"
                            >

                        @else

                            <div class="relative flex h-32 w-32 items-center justify-center rounded-2xl border border-white bg-[#F3F2FF] text-3xl font-bold text-[#4F46B8] shadow-md">

                                {{ strtoupper(substr($student->first_name, 0, 1)) }}
                                {{ strtoupper(substr($student->last_name, 0, 1)) }}

                            </div>

                        @endif


                        {{-- Status Dot --}}
                        <div class="absolute -bottom-1 -right-1 flex h-7 w-7 items-center justify-center rounded-full border-4 border-white bg-[#22C55E]"></div>

                    </div>


                    {{-- Student Main Information --}}
                    <div class="flex-1 text-center sm:text-left">

                        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-[#DEDDFB] bg-[#F6F5FF] px-3 py-1 text-xs font-semibold text-[#4F46B8]">

                            <span class="h-1.5 w-1.5 rounded-full bg-[#4F46E5]"></span>

                            Registered Student

                        </div>


                        <h2 class="text-2xl font-bold tracking-tight text-[#191919] sm:text-3xl">

                            {{ $student->first_name }}

                            @if ($student->middle_name)
                                {{ $student->middle_name }}
                            @endif

                            {{ $student->last_name }}

                        </h2>


                        <div class="mt-3 flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-sm text-[#77777E] sm:justify-start">

                            <div class="flex items-center gap-2">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.7"
                                    stroke="currentColor"
                                    class="h-4 w-4 text-[#4F46B8]"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 19.5Z"
                                    />
                                </svg>

                                <span>
                                    {{ $student->student_id }}
                                </span>

                            </div>


                            <div class="flex items-center gap-2">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.7"
                                    stroke="currentColor"
                                    class="h-4 w-4 text-[#4F46B8]"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                    />
                                </svg>

                                <span>
                                    Registered {{ $student->created_at->format('F d, Y') }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Information Body --}}
            <div class="grid lg:grid-cols-2">


                {{-- Personal Information --}}
                <section class="border-b border-[#EEEEF2] px-6 py-8 sm:px-8 lg:border-b-0 lg:border-r">

                    <div class="mb-7 flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F0EFFF] text-[#4F46B8]">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.7"
                                stroke="currentColor"
                                class="h-5 w-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"
                                />
                            </svg>

                        </div>

                        <div>

                            <h3 class="text-base font-semibold text-[#222222]">
                                Personal Information
                            </h3>

                            <p class="mt-0.5 text-xs text-[#929299]">
                                Basic student details
                            </p>

                        </div>

                    </div>


                    <div class="space-y-6">


                        {{-- Full Name --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9B9BA2]">
                                Full Name
                            </p>

                            <p class="mt-1.5 text-sm font-semibold text-[#292929]">

                                {{ $student->first_name }}

                                @if ($student->middle_name)
                                    {{ $student->middle_name }}
                                @endif

                                {{ $student->last_name }}

                            </p>

                        </div>


                        {{-- Birthday --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9B9BA2]">
                                Date of Birth
                            </p>

                            <p class="mt-1.5 text-sm font-semibold text-[#292929]">
                                {{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}
                            </p>

                        </div>


                        {{-- Gender --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9B9BA2]">
                                Gender
                            </p>

                            <p class="mt-1.5 text-sm font-semibold text-[#292929]">
                                {{ $student->gender }}
                            </p>

                        </div>


                        {{-- Address --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9B9BA2]">
                                Complete Address
                            </p>

                            <p class="mt-1.5 max-w-md text-sm font-medium leading-6 text-[#4F4F53]">
                                {{ $student->address }}
                            </p>

                        </div>

                    </div>

                </section>


                {{-- Academic and Contact --}}
                <section class="px-6 py-8 sm:px-8">

                    <div class="mb-7 flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FFF5DD] text-[#A66B12]">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.7"
                                stroke="currentColor"
                                class="h-5 w-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 14.25 4.5 10.5 12 6.75l7.5 3.75L12 14.25Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6.75 11.625v4.125c0 .621 2.35 2.25 5.25 2.25s5.25-1.629 5.25-2.25v-4.125"
                                />
                            </svg>

                        </div>

                        <div>

                            <h3 class="text-base font-semibold text-[#222222]">
                                Academic & Contact
                            </h3>

                            <p class="mt-0.5 text-xs text-[#929299]">
                                Academic and contact details
                            </p>

                        </div>

                    </div>


                    <div class="space-y-6">


                        {{-- Student ID --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9B9BA2]">
                                Student ID
                            </p>

                            <p class="mt-1.5 text-sm font-semibold text-[#292929]">
                                {{ $student->student_id }}
                            </p>

                        </div>


                        {{-- Program --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9B9BA2]">
                                Program
                            </p>

                            <p class="mt-1.5 text-sm font-semibold text-[#292929]">
                                {{ $student->program }}
                            </p>

                        </div>


                        {{-- Year Level --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9B9BA2]">
                                Year Level
                            </p>

                            <p class="mt-1.5 text-sm font-semibold text-[#292929]">
                                {{ $student->year_level }}
                            </p>

                        </div>


                        {{-- Email --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9B9BA2]">
                                Email Address
                            </p>

                            <p class="mt-1.5 break-all text-sm font-semibold text-[#292929]">
                                {{ $student->email }}
                            </p>

                        </div>


                        {{-- Mobile --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9B9BA2]">
                                Mobile Number
                            </p>

                            <p class="mt-1.5 text-sm font-semibold text-[#292929]">
                                {{ $student->mobile_number }}
                            </p>

                        </div>

                    </div>

                </section>

            </div>


            {{-- Footer --}}
            <div class="border-t border-[#EEEEF2] bg-[#FAFAFD]/80 px-6 py-5 sm:px-8">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div class="flex items-center gap-3">

                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#EEEEFF] text-[#4F46B8]">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                class="h-4 w-4"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m4.5 12.75 6 6 9-13.5"
                                />
                            </svg>

                        </div>

                        <p class="text-xs leading-5 text-[#7D7D84]">
                            Student record successfully stored in the database.
                        </p>

                    </div>


                    <a
                        href="{{ route('students.create') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#4F46B8] px-5 py-2.5 text-sm font-semibold text-white shadow-[0_8px_18px_rgba(79,70,184,0.15)] transition hover:bg-[#4338A8] focus:outline-none focus:ring-4 focus:ring-[#4F46E5]/15"
                    >
                        Register Another Student

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="h-4 w-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"
                            />
                        </svg>
                    </a>

                </div>

            </div>

        </div>


        {{-- Bottom Back Button --}}
        <div class="mt-7 text-center sm:hidden">

            <a
                href="{{ route('students.create') }}"
                class="text-sm font-semibold text-[#4F46B8]"
            >
                ← Register another student
            </a>

        </div>

    </main>


    {{-- Footer --}}
    <footer class="relative z-10 py-7 text-center">

        <p class="text-xs text-[#A0A0A5]">
            Student Registration System · Secure Laravel Registration
        </p>

    </footer>

</body>
</html>