@extends('layouts.app')

@section('content')
    <div id="Background" class="absolute top-0 w-full h-[230px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]"></div>
    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <a href="{{ route('check-booking') }}" class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
            <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-[28px] h-[28px]" alt="icon">
        </a>
        <p class="font-semibold">My Booking Details</p>
        <div class="dummy-btn w-12"></div>
    </div>
    <div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
        <div class="flex flex-col w-full rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white">
            <div class="flex gap-4">
                <div class="flex w-[120px] h-[132px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                    <img src="{{ asset('assets/images/thumbnails/details-1.png') }}" class="w-full h-full object-cover" alt="icon">
                </div>
                <div class="flex flex-col gap-3 w-full">
                    <p class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">{{ $transaction->boardingHouse->name }}</p>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/location.svg') }}" class="w-5 h-5 flex shrink-0" alt="icon">
                        <p class="text-sm text-ngekos-grey">{{ $transaction->boardingHouse->city->name }} City</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="w-5 h-5 flex shrink-0" alt="icon">
                        <p class="text-sm text-ngekos-grey">In {{ $transaction->boardingHouse->category->name }}</p>
                    </div>
                </div>
            </div>
            <hr class="border-[#F1F2F6]">
            <div class="flex gap-4">
                <div class="flex w-[120px] h-[138px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                    <img src="{{ asset('storage/' . $transaction->room->images->first()->image)}}" class="w-full h-full object-cover" alt="icon">
                </div>
                <div class="flex flex-col gap-3 w-full">
                    <p class="font-semibold text-lg leading-[27px]">Executive Room</p>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="w-5 h-5 flex shrink-0" alt="icon">
                        <p class="text-sm text-ngekos-grey">{{ $transaction->room->capacity }} People</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/3dcube.svg') }}" class="w-5 h-5 flex shrink-0" alt="icon">
                        <p class="text-sm text-ngekos-grey">{{ $transaction->room->square_feet }} m<sup>2</sup></p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/shopping-bag.svg') }}" class="w-5 h-5 flex shrink-0" alt="icon">
                        <p class="text-sm text-ngekos-grey">Bonus Included</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
        <label class="relative flex items-center justify-between">
            <p class="font-semibold text-lg">Customer</p>
            <img src="{{ asset('assets/images/icons/arrow-up.svg') }}" class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
            <input type="checkbox" class="absolute hidden">
        </label>
        <div class="flex flex-col gap-4 pt-[22px]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Name</p>
                </div>
                <p class="font-semibold">{{ $transaction->name }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/sms.svg') }}" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Email</p>
                </div>
                <p class="font-semibold">{{ $transaction->email }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/call.svg') }}" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Phone</p>
                </div>
                <p class="font-semibold">{{ $transaction->phone_number }}</p>
            </div>
        </div>
    </div>
    <div class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
        <label class="relative flex items-center justify-between">
            <p class="font-semibold text-lg">Booking</p>
            <img src="{{ asset('assets/images/icons/arrow-up.svg') }}" class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
            <input type="checkbox" class="absolute hidden">
        </label>
        <div class="flex flex-col gap-4 pt-[22px]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ ('assets/images/icons/calendar.svg') }}" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Booking ID</p>
                </div>
                <p class="font-semibold">{{ $transaction->code }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/clock.svg') }}" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Duration</p>
                </div>
                <p class="font-semibold">3 Months</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/calendar.svg') }}" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Started At</p>
                </div>
                <p class="font-semibold">{{ date('d F Y', strtotime($transaction->start_date)) }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/calendar.svg') }}" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Ended At</p>
                </div>
                <p class="font-semibold">{{ date('d F Y', strtotime($transaction->start_date . '+' . $transaction->duration . 'months')) }}</p>
            </div>
        </div>
    </div>
    <div class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
        <label class="relative flex items-center justify-between">
            <p class="font-semibold text-lg">Payment</p>
            <img src="{{ asset('assets/images/icons/arrow-up.svg') }}" class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
            <input type="checkbox" class="absolute hidden">
        </label>
        <div class="flex flex-col gap-4 pt-[22px]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/card-tick.svg') }}" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Payment</p>
                </div>
                @if($transaction->payment_method === 'full_payment')
                    <p class="font-semibold">Full Payment 100%</p>
                @else
                    <p class="font-semibold">Down Payment 30%</p>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/receipt-2.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Kos Price</p>
                </div>
                <p class="font-semibold">Rp {{ number_format($transaction->room->price_per_month, '2', ',', '.') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/receipt-2.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Sub Total</p>
                </div>
                @if($transaction->payment_method === 'full_payment')
                    <p class="font-semibold">Rp {{ number_format($transaction->room->price_per_month * $transaction->duration, '2', ',', '.') }}</p>
                @else
                    <p class="font-semibold">Rp {{ number_format($room->price_per_month * $transaction['duration'] * 30/100, '2', ',', '.')}}</p>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/receipt-disscount.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">PPN 11%</p>
                </div>
                <p class="font-semibold">Rp {{ number_format($transaction->total_amount * 30/100, '2', ',', '.') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/security-user.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Insurance</p>
                </div>
                <p class="font-semibold">Rp {{ number_format($transaction->room->price_per_month * $transaction->duration * (11/100), '2', ',', '.')}}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/receipt-text.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Grand total</p>
                </div>
                @if($transaction->payment_method === 'full_payment')
                    <p class="font-semibold">Rp {{ number_format(($transaction->room->price_per_month * $transaction->duration) + ($transaction->room->price_per_month * $transaction->duration * (11/100)) + ($transaction->room->price_per_month *    $transaction->duration * (1/100)), '2', ',', '.')}}</p>
                @else
                    <p class="font-semibold">Rp {{ number_format(($transaction->room->price_per_month * $transaction->duration * 30/100) + ($transaction->room->price_per_month * $transaction->duration * (11/100)) + ($transaction->room->price_per_month *    $transaction->duration * (1/100)), '2', ',', '.')}}</p>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/security-card.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Status</p>
                </div>
                @if($transaction->payment_status === 'success')
                    <p class="rounded-full p-[6px_12px] bg-[#91BF77] font-bold text-xs leading-[18px]">SUCCESSFUL</p>
                @else
                    <p class="rounded-full p-[6px_12px] bg-ngekos-orange font-bold text-xs leading-[18px]">PENDING</p>
                @endif
            </div>
        </div>
    </div>
    
    @section('scripts')
        <script src="{{ asset('assets/js/accodion.js')}}"></script>
        <script>
            // Get all tab buttons
            const tabLinks = document.querySelectorAll('.tab-link');

            // Add click event listener to each button
            tabLinks.forEach(button => {
                button.addEventListener('click', () => {
                    // Get the target tab id from the data attribute
                    const targetTab = button.getAttribute('data-target-tab');
                    console.log(targetTab)
                    // Hide all tab contents
                    document.querySelectorAll('.tab-content').forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Show the target tab content
                    document.querySelector(targetTab).classList.toggle('hidden');
                });
            });
        </script>
    @endsection
@endsection