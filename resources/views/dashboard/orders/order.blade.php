@extends('dashboard.layouts.token')

@section('content')

<main class="mt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-4 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            List Order
        </h1>

    </div>
    <main class="col-lg-8">
        <div class="container-fluid px-4">
          <div class="card mt-4 mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Order List
            </div>

            <div class="card-body">
                <a href="/order/create" class="btn btn-primary mb-3">Place new order</a>

                @if(session()->has('success'))
                    <div class="alert alert-success" id="alertSuccess" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session()->has('samedata'))
                    <div class="alert alert-warning" id="alertSamedata" role="alert">
                        {{ session('samedata') }}
                    </div>
                @endif
                @if(session()->has('problem'))
                    <div class="alert alert-danger" id="problem" role="alert">
                        {{ session('problem') }}
                    </div>
                @endif
              <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Signal</th>
                    <th>Price</th>
                    <th>Market</th>
                    <th>Investment</th>
                    <th>Duration</th>
                    <th>Result</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Signal</th>
                    <th>Price</th>
                    <th>Market</th>
                    <th>Investment</th>
                    <th>Duration</th>
                    <th>Result</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach ($orders as $order )
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $order->signal }}</td>
                      <td>{{ $order->price }}</td>
                      <td>{{ $order->market }}</td>
                      <td>{{ $order->investment }}</td>
                      <td>{{ $order->duration }}</td>
                      <td>Result</td>
                      <td>
                        <button type="button" href="#" class="badge bg-info border-0" data-bs-toggle="modal" data-bs-target="#editOrderModal" data-id='{{ $order->id }}'><i class="fas fa-edit"></i></button>
                        <form action="/order/{{ $order->id }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button href="" class="badge bg-danger border-0"><i class="fas fa-trash-alt"></i></i></button>
                        </form>
                      </td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
        @include('dashboard.orders.edit')
    </main>


</main>

<script>
    setTimeout(function() {
    $('#alertSuccess').hide();
    }, 3000);


    setTimeout(function() {
    $('#alertSamedata').hide();
    }, 3000);

</script>

@endsection
