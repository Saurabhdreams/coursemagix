<select required name="payment_method" id="payment-gateway" class="form_control">
    <option value="" selected disabled>
        {{ $keywords['Choose_an_option'] ?? __('Choose an option') }}
    </option>
    @foreach ($payment_gateways as $payment)
        <option value="{{ $payment->name }}" {{ old('payment_method') == $payment->name ? 'selected' : '' }}>
            {{ $payment->name }}
        </option>
    @endforeach
    @foreach ($offlines as $offline)
        <option value="{{ $offline->name }}" {{ old('payment_method') == $offline->name ? 'selected' : '' }}>
            {{ $offline->name }}
        </option>
    @endforeach
</select>


{{-- START: Stripe Card Details Form --}}
<div>
    <div id="stripe-element" class="mb-2 mt-2">
        <!-- A Stripe Element will be inserted here. -->
    </div>
    <!-- Used to display form errors -->
    <div id="stripe-errors" role="alert" class="mb-2"></div>
</div>
{{-- END: Stripe Card Details Form --}}

{{-- START: Authorize.net Card Details Form --}}
<div class="row gateway-details py-3" id="tab-anet" style="display: none;">
    <div class="col-lg-6">
        <div class="form_group mb-3">
            <input class="form-control" type="text" name="anetCardNumber" id="anetCardNumber"
                placeholder="Card Number" disabled />
        </div>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="form_group">
            <input class="form-control" type="text" name="anetExpMonth" id="anetExpMonth"
                placeholder="{{ $keywords['Expire_Month'] ?? __('Expire Month') }}" disabled />
        </div>
    </div>
    <div class="col-lg-6 ">
        <div class="form_group">
            <input class="form-control" type="text" name="anetExpYear" id="anetExpYear"
                placeholder=" {{ $keywords['Expire_Year'] ?? __('Expire Year') }} " disabled />
        </div>
    </div>
    <div class="col-lg-6 ">
        <div class="form_group">
            <input class="form-control" type="text" name="anetCardCode" id="anetCardCode"
                placeholder="{{ $keywords['Card_Code'] ?? __('Card Code') }}" disabled />
        </div>
    </div>
    <input type="hidden" name="opaqueDataValue" id="opaqueDataValue" disabled />
    <input type="hidden" name="opaqueDataDescriptor" id="opaqueDataDescriptor" disabled />
    <ul id="anetErrors"></ul>
</div>
{{-- END: Authorize.net Card Details Form --}}

<div id="instructions"></div>
<input type="hidden" name="is_receipt" value="0" id="is_receipt">

@if ($errors->has('receipt'))
    <p class="text-danger mb-4">{{ $errors->first('receipt') }}</p>
@endif
{{-- End: Offline Gateways Area --}}
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="lc" value="UK">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="ref_id" id="ref_id" value="">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">
<input type="hidden" name="currency_sign" value="$">
