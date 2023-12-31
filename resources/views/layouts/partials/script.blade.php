<!--<link href="{{ asset('speedo/css/select2.min.css') }}" rel="stylesheet" type="text/css" />-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/jquery.min.js"></script>-->
<script src="{{ asset('speedo/js/jquery.min.js') }}"></script>

<script src="{{ asset('speedo/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('speedo/js/wow.min.js') }}"></script>
<script src="{{ asset('speedo/js/jquery.backTop.min.js') }}"></script>
<script src="{{ asset('speedo/js/waypoints.min.js') }}"></script>
<script src="{{ asset('speedo/js/waypoints-sticky.min.js') }}"></script>
<script src="{{ asset('speedo/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('speedo/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('speedo/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('speedo/js/venobox.min.js') }}"></script>
<script src="{{ asset('speedo/js/select2.min.js') }}"></script>

<!--<script src="https://www.hamiltonaquatics.ae/assets/js/bootstrap.min.js"></script>-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/wow.min.js"></script>-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/jquery.backTop.min.js"></script>-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/waypoints.min.js"></script>-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/waypoints-sticky.min.js"></script>-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/owl.carousel.min.js"></script>-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/jquery.stellar.min.js"></script>-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/jquery.counterup.min.js"></script>-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/venobox.min.js"></script>-->
<!--<script src="https://www.hamiltonaquatics.ae/assets/js/select2.min.js"></script>-->

<!--<script src="https://www.hamiltonaquatics.ae/assets/js/custom-scripts.js"></script>-->

<script src="{{ asset('speedo/js/custom-scripts.js') }}"></script>


{{-- <script type="text/javascript">

    jQuery(function ($) {

        // CONTACT FORM     
        function email_checkRegexp(o, regexp) {
            if (!(regexp.test(o.val()))) {
                return false;
            } else {
                return true;
            }
        }

        var $contact_form = $("#contact-form");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var $contact_submit_btn = $contact_form.find("button.btn-submit");
        var $user_name = $contact_form.find("#user_name");
        var $user_email = $contact_form.find("#user_email");
        var $user_phone = $contact_form.find("#user_phone");
        var $email_message = $contact_form.find("#email_message");

        var emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

        var $all_fields = $([]).add($user_name).add($user_email).add($user_phone).add($email_message);
        $all_fields.val("");

        var $error_border = "border-bottom: 1px solid red;";
        var contact_form_bValid, user_name_bValid, user_email_bValid, user_phone_bValid, user_email_message_bValid;

        $contact_form.find("button[type=submit]").on("click", function () {

            contact_form_bValid = true;

            // user name
            if ($user_name.val() === "") {

                user_name_bValid = false;
                $user_name.next("span").remove();
                $user_name.attr("style", $error_border).after("<span class='error'>" + $user_name.attr("data-msg") + "</span>");

            } else {
                user_name_bValid = true;
                $user_name.removeAttr("style").next("span").remove();

            }

            //console.log('user name: ' + user_name_bValid + ' => ' + $.trim($user_name.val()) );
            contact_form_bValid = contact_form_bValid && user_name_bValid;

            // user email
            if ($user_email.val() === "" || email_checkRegexp($user_email, emailRegex) === false) {

                user_email_bValid = false;
                $user_email.next("span").remove();
                $user_email.attr("style", $error_border).after("<span class='error'>" + $user_email.attr("data-msg") + "</span>");

            } else {
                user_email_bValid = true;
                $user_email.removeAttr("style").next("span").remove();

            }

            //console.log('user email: ' + user_email_bValid + ' => ' + $.trim($user_email.val()) );                
            contact_form_bValid = contact_form_bValid && user_email_bValid;


            // user phone
            if ($user_phone.val() === "") {

                user_phone_bValid = false;
                $user_phone.next("span").remove();
                $user_phone.attr("style", $error_border).after("<span class='error'>" + $user_phone.attr("data-msg") + "</span>");

            } else {
                user_phone_bValid = true;
                $user_phone.removeAttr("style").next("span").remove();
            }

            //console.log('phone: ' + user_phone_bValid + ' => ' + $.trim($user_phone.val()) );
            contact_form_bValid = contact_form_bValid && user_phone_bValid;

            // message
            if ($.trim($email_message.val()) === "") {

                user_email_message_bValid = false;
                $email_message.next("span").remove();
                $email_message.attr("style", $error_border).after("<span class='error'>" + $email_message.attr("data-msg") + "</span>");

            } else {
                user_email_message_bValid = true;
                $email_message.removeAttr("style").next("span").remove();

            }

            //console.log('message: ' + user_email_message_bValid + ' => ' + $.trim($email_message.val()) );                
            contact_form_bValid = contact_form_bValid && user_email_message_bValid;

            if (contact_form_bValid === true) {

                $all_fields.attr("disabled", "disabled");
                //$contact_submit_btn.after("<span class='form_msg'>Please wait ....</span>").attr("disabled", "disabled");
                $contact_submit_btn.after('<div class="alert alert-info alert-dismissible form_msg"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please wait ....</div>').attr("disabled", "disabled");

                //var _url = $contact_form.attr('action');
                $.ajax({
                    url: "https://www.hamiltonaquatics.ae/sendemailcontact",
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        safety_key: 'dynatf',
                        _token: CSRF_TOKEN,
                        user_name: $.trim($user_name.val()),
                        user_email: $.trim($user_email.val()),
                        user_phone: $.trim($user_phone.val()),
                        email_message: $.trim($email_message.val())
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.status === 'success') {

                            //$contact_submit_btn.next("span").remove();
                            //$contact_submit_btn.after("<span class='form_msg'>" + data.msg + "</span>");

                            $contact_submit_btn.next("div").remove();
                            $contact_submit_btn.after('<div class="alert alert-success alert-dismissible form_msg"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> ' + data.msg + ' </div>');

                            setTimeout(function () {

                                $all_fields.removeAttr("disabled").val("");

                                //$contact_submit_btn.next("span").slideUp('slow', function () {
                                $contact_submit_btn.next("div").slideUp('slow', function () {
                                    $(this).remove();
                                    $contact_submit_btn.removeAttr("disabled");
                                });

                            }, 4000)

                        } else {

                            ////$all_fields.removeAttr("disabled"); 
                            //$contact_submit_btn.next("span").remove();
                            //$contact_submit_btn.after("<span class='form_msg'>" + data.msg + "</span>");

                            $contact_submit_btn.next("div").remove();
                            $contact_submit_btn.after('<div class="alert alert-danger alert-dismissible form_msg"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error!</strong> ' + data.msg + ' </div>');

                            setTimeout(function () {
                                $all_fields.removeAttr("disabled").val("");
                                //$contact_submit_btn.next("span").slideUp('slow', function () {
                                $contact_submit_btn.next("div").slideUp('slow', function () {
                                    $(this).remove();
                                    $contact_submit_btn.removeAttr("disabled");
                                });

                            }, 4000)
                        }

                    },
                    error: function (xhr, textStatus, e) {

                        //$contact_submit_btn.next("span").remove();
                        //$contact_submit_btn.after("<span class='form_msg'> Email can not be sent. Please try again. </span>");
                        $contact_submit_btn.next("div").remove();
                        $contact_submit_btn.after('<div class="alert alert-danger alert-dismissible form_msg"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error!</strong> ' + data.msg + ' </div>');

                        setTimeout(function () {
                            $all_fields.removeAttr("disabled").val("");
                            //$contact_submit_btn.next("span").slideUp('slow', function () {
                            $contact_submit_btn.next("div").slideUp('slow', function () {
                                $(this).remove();
                                $contact_submit_btn.removeAttr("disabled");
                            });

                        }, 4000)
                        return;
                    }

                });


            } else { console.log("something went wrong! Please try again."); }

            return false;

        });



    }); // document ready - end



</script><!--script end--> --}}


<script src="https://kit.fontawesome.com/79e469c33f.js" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>


