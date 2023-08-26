<script src="https://www.hamiltonaquatics.ae/assets/js/jquery.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/bootstrap.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/wow.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/jquery.backTop.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/waypoints.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/waypoints-sticky.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/owl.carousel.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/jquery.stellar.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/jquery.counterup.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/venobox.min.js"></script>
<script src="https://www.hamiltonaquatics.ae/assets/js/select2.min.js"></script>



<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script src="https://www.hamiltonaquatics.ae/assets/js/custom-scripts.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127178313-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-127178313-1');

    // new tag for lts free assessment
    gtag('config', 'AW-808145150');

</script>




<script type="text/javascript">

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



</script><!--script end-->



<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PV5BSPK" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-36647928-9', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');

</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
    /*var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/579eee6692a0df3b7f436de2/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();*/
</script>
<!--End of Tawk.to Script-->



<!-- Home - Facebook Pixel Code -->
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return; n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
        n.queue = []; t = b.createElement(e); t.async = !0;
        t.src = v; s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '3334386243332630');
    fbq('track', 'PageView');
    fbq('track', 'Contact');
    fbq('track', 'StartAssessment', { value: '0.00', currency: 'USD', predicted_ltv: '0.00' });
</script>
<noscript>
    <img height="1" width="1" src="https://www.facebook.com/tr?id=3334386243332630&ev=PageView
      &noscript=1" />
</noscript>
<!-- End Home - Facebook Pixel Code -->

<script src="https://kit.fontawesome.com/79e469c33f.js" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>


