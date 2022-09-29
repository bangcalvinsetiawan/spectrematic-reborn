@extends('dashboard.layouts.token')

@section('content')

<main class="col-lg-8">


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-4 pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        Place Order
    </h1>

</div>
<div class="mb-3 row">
    <label for="trader" class="col-sm-2 col-form-label">Trader</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="trader" value="Calvin">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword">
    </div>
  </div>
</main>

@endsection
