@extends('layouts.auth')

@section('content')

    @auth


    <div class="grid space-y-[14px] mt-[30px]">
        <h1>Hi, you are logged in</h1>
        <a href="/dashboard" class="rounded-2xl bg-alerange py-[13px] text-center">
            <span class="text-base font-semibold">
                Continue Trade
            </span>
        </a>
    </div>

    @endauth

    @guest
    <div>
        {{-- <img src="{{ url('auth/assets/images/moonton-white.svg') }}" alt=""> --}}
        <div class="font-semibold text-[30px] mb-3">
            Spectrematic
        </div>
        <div class="my-[70px]">
            <div class="font-semibold text-[26px] mb-3">
                Welcome Back
            </div>
            <p class="text-base text-[#767676] leading-7">
                Explore our new trading bot <br>
                the get more profit in your life
            </p>
        </div>
        @if(session()->has('success'))
         <div class="alert alert-success alert-dismissible fade show text-green-600/100" role="alert">
           {{ session('success') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        @endif

        @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show text-red-600/100" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form class="w-[370px]" action="/login" method="post">
            @csrf
            <div class="flex flex-col gap-6">
                <div>
                    <label class="text-base block mb-2" for="email">Email Address</label>
                    <input type="email" name="email"
                        class="rounded-2xl bg-form-bg py-[13px] px-7 w-full focus:outline-alerange focus:outline-none"
                        placeholder="Email Address" @error('email') is-invalid @enderror" id="email" autofocus required value="{{ old('email') }}" />
                        @error('email')
                        <div class="invalid-feedback text-red-600/100">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div>
                    <label class="text-base block mb-2" for="password">Password</label>
                    <input type="password" name="password"
                        class="rounded-2xl bg-form-bg py-[13px] px-7 w-full focus:outline-alerange focus:outline-none"
                        placeholder="Password" id="password" required />
                </div>
            </div>
            <div class="grid space-y-[14px] mt-[30px]">
                <button type="submit" class="rounded-2xl bg-alerange py-[13px] text-center">
                    <span class="text-base font-semibold">
                        Let's Trading
                    </span>
                </button>
                <a href="/register" class="rounded-2xl border border-white py-[13px] text-center">
                    <span class="text-base text-white">
                        Create New Account
                    </span>
                </a>
            </div>
        </form>
    </div>
    @endguest
@endsection
