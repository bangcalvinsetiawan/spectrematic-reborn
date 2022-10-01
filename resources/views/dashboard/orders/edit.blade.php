<div class="modal fade" id="editOrderModal" tabindex="-1" aria-labelledby="editOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editOrderModal">Edit Order Limit</h5>

        </div>
        <div class="modal-body">
            <form method="post" action="/order">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="inputSignal" class="form-label">Order Limit</label>
                    <select class="form-select" name="signal" value="{{ $order->signal }}" id="inputSignal">
                        <option value="1">BUY LIMIT</option>
                        <option value="2">BUY STOP</option>
                        <option value="3">SELL LIMIT</option>
                        <option value="4">SELL STOP</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputPrice" class="form-label">Price</label>
                    <div class="input-group">

                        <span class="input-group-text">0.00</span>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="inputPrice" value="{{ $order->price }}" aria-label="Input Price" required>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputSignal" class="form-label">Select Market</label>
                    <select type="text" class="form-select" name="market" value="{{ $order->market }}" id="cmb_marke" aria-label="Select Market">
                        <option value="1">EPIC5000</option>
                        <option value="2">EPIC3000</option>
                        <option value="3">EPIC1000</option>
                        <option value="4">APPLE</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control @error('investment') is-invalid @enderror" name="investment" id="txt_invest" value="{{ $order->investment }}" aria-label="Input Investment" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDuration" class="form-label">Trade Duration</label>
                    <select type="text" class="form-select" name="duration" value="{{ $order->duration }}" id="cmb_time_frame" aria-label="Select Market">
                        <option value="60">1M</option>
                    </select>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Edit Order</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
