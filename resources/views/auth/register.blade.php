@extends('layouts.auth')

@section('content')

    @auth
    <h1>Hi, you are logged in</h1>
    @endauth

    @guest
    <div>
        {{-- <img src="{{ url('auth/assets/images/moonton-white.svg') }}" alt=""> --}}
        <div class="font-semibold text-[30px] mb-3">
            Spectrematic
        </div>
        <div class="my-[70px]">
            <div class="font-semibold text-[26px] mb-3">
                Sign Up
            </div>
            <p class="text-base text-[#767676] leading-7">
                Get more profitable with us <br>
                Register Spectrematic
            </p>
        </div>
        <form class="w-[370px]" action="/register" method="post">
            @csrf
            <div class="flex flex-col gap-6">
                <div>
                    <label class="text-base block mb-2" for="name">Full Name</label>
                    <input type="text" name="name"
                        class="rounded-2xl bg-form-bg py-[13px] px-7 w-full focus:outline-alerange focus:outline-none @error('name') is-invalid @enderror" id="name" required value="{{ old('name') }}"
                        placeholder="Your fullname..." />
                        @error('name')
                            <div class="invalid-feedback text-red-600/100">
                            {{ $message }}
                            </div>
                        @enderror
                </div>
                <div>
                    <label class="text-base block mb-2" for="username">Username</label>
                    <input type="text" name="username"
                        class="rounded-2xl bg-form-bg py-[13px] px-7 w-full focus:outline-alerange focus:outline-none @error('username') is-invalid @enderror" id="username" required value="{{ old('username') }}"
                        placeholder="Your username" />
                        @error('username')
                            <div class="invalid-feedback text-red-600/100">
                            {{ $message }}
                            </div>
                        @enderror
                </div>
                <div>
                    <label class="text-base block mb-2" for="email">Email Address</label>
                    <input type="email" name="email"
                        class="rounded-2xl bg-form-bg py-[13px] px-7 w-full focus:outline-alerange focus:outline-none @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}"
                        placeholder="Your Email Address" />
                        @error('email')
                            <div class="invalid-feedback text-red-600/100">
                            {{ $message }}
                            </div>
                        @enderror
                </div>
                <div>
                    <label class="text-base block mb-2" for="password">Password</label>
                    <input type="password" name="password"
                        class="rounded-2xl bg-form-bg py-[13px] px-7 w-full focus:outline-alerange focus:outline-none @error('password') is-invalid @enderror" id="password"
                        placeholder="Your Password" required />
                        @error('password')
                            <div class="invalid-feedback text-red-600/100">
                            {{ $message }}
                            </div>
                        @enderror
                </div>
            </div>
            <div class="grid space-y-[14px] mt-[30px]">
                <button type="submit" class="rounded-2xl bg-alerange py-[13px] text-center">
                    <span class="text-base font-semibold">
                        Sign Up
                    </span>
                </button>
                <a href="/login" class="rounded-2xl border border-white py-[13px] text-center">
                    <span class="text-base text-white">
                        Sign In to My Account
                    </span>
                </a>
            </div>
        </form>
    </div>
    @endguest
@endsection
