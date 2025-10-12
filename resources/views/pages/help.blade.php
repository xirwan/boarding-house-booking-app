@extends('layouts.app')

@section('content')
    <div id="Background"
        class="absolute top-0 w-full h-[570px] rounded-bl-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]">
    </div>
    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <a href="{{ route('home') }}"
                class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-[28px] h-[28px]" alt="icon">
        </a>
        <p class="font-semibold">Help</p>
        <div class="dummy-btn w-12"></div>
    </div>
    <div id="Header" class="relative flex items-center justify-center gap-2 px-5 mt-[18px]">
        <div class="flex flex-col gap-[6px]">
            <h1 class="font-bold text-[32px] leading-[48px]">How to booking boarding house</h1>
        </div>
    </div>
    <section class=" relative flex flex-col gap-4 px-5 mt-5 mb-9">
        <div
            class="flex rounded-[30px] border border-[#FF801A] p-4 gap-4 bg-white">
            <div class="flex flex-col gap-3 w-full">
                <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">1. Search for a boarding house that suits your preferences on the Discover tab.</h3>
                <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">2. Click the Book Now button.</h3>
                <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">3. Select the room you want.</h3>
                <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">4. Fill in your personal information and rental duration.</h3>
                <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">5. Select the type of payment: down payment or full payment.</h3>
                <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">6. Select the payment method on Midtrans.</h3>
                <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">7. Make the payment based on the selected payment method.</h3>
            </div>
        </div>
    </section>
    @include('includes.navigation')
@endsection