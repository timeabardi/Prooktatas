<div class="billing-addresss-wrapper">
    <form id="billing-address-form">
        <div class="row">
            <div class="col-12">
                <h5>Számlázási cím megadása</h5>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Vezetéknév</label>
                            <input type="text" class="form-control" name="firstname" value="{{ $test['payment_address']['firstname']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefonszám</label>
                            <input type="text" class="form-control" name="phone" value="{{ $test['payment_address']['phone']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cégnév</label>
                            <input type="text" class="form-control" name="company" value="{{ $test['payment_address']['company']}}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Keresztnév</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $test['payment_address']['lastname']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $test['payment_address']['email']}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Ország</label>
                            <input type="text" class="form-control" name="country" value="{{ $test['payment_address']['country']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">irányítószám</label>
                            <input type="text" class="form-control" name="zipcode" value="{{ $test['payment_address']['zipcode']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Közterület neve</label>
                            <input type="text" class="form-control" name="street_name" value="{{ $test['payment_address']['street_name']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Házszám</label>
                            <input type="number" class="form-control" name="house_number" value="{{ $test['payment_address']['house_number']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Emelet</label>
                            <input type="text" class="form-control" name="floor_number" value="{{ $test['payment_address']['floor_number']}}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Megye</label>
                            <input type="text" class="form-control" name="state" value="{{ $test['payment_address']['state']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Város</label>
                            <input type="text" class="form-control" name="city" value="{{ $test['payment_address']['city']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Közterület jellege</label>
                            <input type="text" class="form-control" name="street_type" value="{{ $test['payment_address']['street_type']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Épület</label>
                            <input type="text" class="form-control" name="building_number" value="{{ $test['payment_address']['building_number']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ajtó</label>
                            <input type="text" class="form-control" name="apartment_number" value="{{ $test['payment_address']['apartment_number']}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button id="send-billing-address-btn" type="button"  class="btn btn-primary float-end">Tovább</button>
            </div>
        </div>
    </form>
</div>
@push('scripts')
<script>

    function tooglePanelsForBillingEnd(){

        const panelAccount = document.getElementById('panel-billing-address');
        const panelAccountCollapse = new bootstrap.Collapse(panelAccount, {
            toggle: true
        });

        const panelBillingAddress = document.getElementById('panel-shipping-address');
        const panelBillingAddressCollapse = new bootstrap.Collapse(panelBillingAddress, {
            toggle: true
        });
    }

    function sendBillingAddress(){
        const formData = new FormData(document.getElementById('billing-address-form'));
        window.axios.post("{{route('order.billing.address.store')}}", formData)
        .then(function (response) {
            if(response.data.success){
                tooglePanelsForBillingEnd();
            }
        })
    }

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('send-billing-address-btn').addEventListener('click', function() {
            sendBillingAddress();
        });
    });
</script>
@endpush