@extends('parent.layouts.master')
@section('content')
    <div class="us-profile-container">

        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head">
                        <h4 class="text-center" style="text-align: left !important;color: #1E1E1E;">Profile Settings</h4>
                        <div class="profile-setup-links" style="background-color: #fff;">
                            <ul class="us-profile-nav">
                                <li class="us-nav-li ">
                                    <a href="{{ url('parent/profile') }}" style="color:#1e1e1e6b;">Personal</a>
                                </li>
                                <li class="us-nav-li">
                                    <a href="{{ url('parent/security') }}" style="color:#1e1e1e6b;">Security</a>

                                </li>
                                <li class="us-nav-li active">
                                    <a href="{{ url('parent/payment') }}" style="color:#ff0000;">Payment</a>

                                </li>
                            </ul>
                        </div>
                        <!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->


                    <div class="">
                        <div class="">
                            <form action="{{ url('parent/add-payment/' . $user->id) }}" method="post" id="add-payment">
                                @csrf
                                <input type="text" name="flag" hidden value="{{ request()->query('q') }}">
                                <input type="text" id="number" name="number" hidden value="">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="full-name"
                                                style="font-size: 18px;font-weight: 500;">
                                                Payment Information
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="full-name"
                                                style="color: #8091a7; color: #8091a7; font-weight: 300;">Save a credit card
                                                for faster checkout. Your billing information will be securely
                                                processed.</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row us-row-margin">
                                    {{-- <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Card Number <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="text" placeholder="XXXX XXXX XXXX XXXX" class="form-control us-height"
                                                id="cf-full-name">
                                        </div>
                                    </div> --}}
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Card Name <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input class="form-control StripeElement mb-3" name="full_name" required
                                                placeholder="Card holder name">
                                            <input type="hidden" name="card_number" class="form-control us-height" id="cardnumber">
                                        </div>
                                    </div>
                                </div>
                                <div class="row us-row-margin">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Card Detail <span
                                                    style="color:#ff0000;">*</span></label>
                                            <div id="card-errors" role="alert"></div>
                                            <input type="hidden" name="payment_method" value=""
                                                class="form-control payment-method us-height">

                                            <div class="form-control-wrap us-height">
                                                <div id="card-element"></div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-2">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-email-address">Expiry</label>
                                            <div class="row">
                                                <div class="col-5">
                                                    <input type="text" class="form-control us-height" id="cf-email-address"
                                                        placeholder="MM">
                                                </div>
                                                <div class="col-5">
                                                    <input type="text" class="form-control us-height" id="cf-email-address"
                                                        placeholder="YY">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-phone-no">CVV/CVC</label>
                                            <input type="text" class="form-control us-height" id="cf-phone-no">
                                        </div>
                                    </div> --}}

                                </div>

                                <div class="row us-row-margin">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary"
                                                style="background-color: #0074fe;border: none;">Save</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div><!-- .card-preview -->
                </div>
                <div id="popup">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let stripe = Stripe("{{ env('STRIPE_KEY') }}")
        let elements = stripe.elements()
        let style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        }
        let card = elements.create('card', {
            hidePostalCode: true,
            style: style
        })
        var cardElement = elements.getElement('card');
        // console.log(cardElement.val);
        card.mount('#card-element')
        let paymentMethod = null
        $('#add-payment').on('submit', function(e) {
            // $('button.pay').attr('disabled', true)
            if (paymentMethod) {
                return true
            }
            var cardNumber = $('cardNumber').val();
            console.log();
            stripe.confirmCardSetup(
                "{{ $intent->client_secret }}", {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: $('.full_name').val()
                        }
                    }
                }
            ).then(function(result) {
                // $('#cardnumber').val(cardNumber);
                if (result.error) {
                    $('#card-errors').text(result.error.message)
                    // $('button.pay').removeAttr('disabled')
                } else {
                    // $('#cardnumber').val(cardElement.value);
                    paymentMethod = result.setupIntent.payment_method
                    $('.payment-method').val(paymentMethod)
                    $('#add-payment').submit()
                }
            })
            return false
        })
        $('#newCard').on('click', function(e) {
            $('.showCard').show()
        });
        let check = @json($check);
        console.log(check)
        if (check == 1) {
            $('#popup').html("<div class='welcome-container-bg' id='welcome-container-bg'>" +
                "<div class='us-welcome-container'>" +
                "<h3 class='us-popup-heading text-success ' id='us-popup-heading'>Congratulations! </h3>" +
                "<p class='us-popup-content' id='us-popup-content'> Your payment information saved successfully and now you can register your-self or your children for the speedo swimming classes</p>" +
                "<div class='us-cmd-ok'>" +
                "<button type='button' class='us-cmd-ok' onclick='hidePopup(event)'style='background-color: #0074fe;border: none;'>Okay</button>" +
                "</div>" +
                "</div>" +
                "</div>");
        }
        if (check == 2) {
            $('#popup').html("<div class='welcome-container-bg' id='welcome-container-bg'>" +
                "<div class='us-welcome-container'>" +
                "<h3 class='us-popup-heading text-success ' id='us-popup-heading'>Congratulations! </h3>" +
                "<p class='us-popup-content' id='us-popup-content'> Your payment information saved successfully and now you can register your-self or your children for the speedo swimming classes.</p>" +
                "<div class='us-cmd-ok'>" +
                "<button type='button' class='us-cmd-ok' onclick='hidePopup(event)'style='background-color: #0074fe;border: none;'>Okay</button>" +
                "</div>" +
                "</div>" +
                "</div>");
        }

        function hidePopup(url) {
            console.log(url)
            $(".welcome-container-bg").hide();
            if (check == 1) {
                setTimeout(function() {
                    window.location = '{{ url('parent/checkouts') }}';
                }, 1000);
            }
            if (check == 2) {
                setTimeout(function() {
                    window.location = '{{ url('parent/students') }}';
                }, 1000);
            }
        }
    </script>
@stop
