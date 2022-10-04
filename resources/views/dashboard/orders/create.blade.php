@extends('dashboard.layouts.order')

@section('content')

{{-- <span>{{ $user->token }}</span> --}}
<main class="col-lg-8">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-4 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Place Order Limit
        </h1>
        <span id="spot">0.0000</span>

    </div>
    <form method="post" action="/order">
        @csrf
        <div class="mb-3">
            <label for="inputSignal" class="form-label">Order Limit</label>
            <select class="form-select" name="signal" id="inputSignal">
                <option value="BL">BUY LIMIT</option>
                <option value="BS">BUY STOP</option>
                <option value="SL">SELL LIMIT</option>
                <option value="SS">SELL STOP</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="inputPrice" class="form-label">Price</label>
            <div class="input-group">

                <span class="input-group-text">00.000</span>
                <input type="number" step="0.0000000001" class="form-control @error('price') is-invalid @enderror" name="price" id="inputPrice" aria-label="Input Price" required>
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="inputSignal" class="form-label">Select Market</label>
            <select type="text" class="form-select" name="market" id="cmb_market" aria-label="Select Market">
                <option value="1">EPIC5000</option>
                <option value="2">EPIC3000</option>
                <option value="3">EPIC1000</option>
                <option value="4">APPLE</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="number" step="0.001" class="form-control @error('investment') is-invalid @enderror" name="investment" id="txt_invest" aria-label="Input Investment" required>
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputDuration" class="form-label">Trade Duration</label>
            <select type="text" class="form-select" name="duration" id="cmb_time_frame" aria-label="Select Market">
                <option value="60">1M</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Order</button>
    </form>
</main>



@endsection


