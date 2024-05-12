@extends('layouts/default')
@section('pageTitle')
Jadwal
@endsection

<!-- @section('homeRef')
/home
@endsection

@section('jadwalRef')
/Jadwal
@endsection -->

@section('isiPage')
<div class="cards w-screen flex-1 flex items-center justify-evenly">

    <div class="block w-full max-w-[18rem] rounded-lg bg-yellow-900 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
        <div class="border-b-2 font-bold border-neutral-100 border-opacity-100 p-4  dark:border-white/10">
            Senin
        </div>
        <ul class="w-full">
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
                Kuliah (12:00 - 19:00)
            </li>
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
                Free (19:00 - 23:59) </li>
        </ul>
    </div>
    <div class="block w-full max-w-[18rem] rounded-lg bg-yellow-900 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
        <div class="border-b-2 font-bold border-neutral-100 border-opacity-100 p-4  dark:border-white/10">
            Selasa
        </div>
        <ul class="w-full">
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
            Kuliah (07:30 - 19:30)
            </li>
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
            Free (19:30 - 23:59)
            </li>
        </ul>
    </div>
    <div class="block w-full max-w-[18rem] rounded-lg bg-yellow-900 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
        <div class="border-b-2 font-bold border-neutral-100 border-opacity-100 p-4  dark:border-white/10">
            Rabu
        </div>
        <ul class="w-full">
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
                Kuliah (08:30 - 15:30)
            </li>
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
            Free (15:30 - 23:59)
            </li>
        </ul>
    </div>
    <div class="block w-full max-w-[18rem] rounded-lg bg-yellow-900 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
        <div class="border-b-2 font-bold border-neutral-100 border-opacity-100 p-4  dark:border-white/10">
            Kamis
        </div>
        <ul class="w-full">
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
                Kuliah (07:30 - 17:00)
            </li>
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
            Free (17:00 - 23:59)
            </li>
        </ul>
    </div>
    <div class="block w-full max-w-[18rem] rounded-lg bg-yellow-900 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
        <div class="border-b-2 font-bold border-neutral-100 border-opacity-100 p-4  dark:border-white/10">
            Jumat
        </div>
        <ul class="w-full">
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
                Family Time & Kerja (09:00 - 21:00)
            </li>
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
            Free (21:00 - 23:59)
            </li>
        </ul>
    </div>

    <div class="block w-full max-w-[18rem] rounded-lg bg-yellow-900 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
        <div class="border-b-2 font-bold border-neutral-100 border-opacity-100 p-4  dark:border-white/10">
            Sabtu
        </div>
        <ul class="w-full">
        <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
                Family Time & Kerja (09:00 - 21:00)
            </li>
            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 px-4 py-3  dark:border-white/10">
            Free (21:00 - 23:59)
            </li>
        </ul>
    </div>

</div>
@endsection