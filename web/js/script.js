    $(document).ready(function() {
        // navigation click actions
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });


        $('#reservation-form').on('submit', function () {
            var data = $('#reservation-form').serialize();
            if (!data){
                alert('Enter your data, please');
                return false;
            }

            $.ajax({
                url: '/site/reservation',
                type: 'POST',
                data: data,
                success: function(res){
                    if (res === 'Success'){
                        $('#contactModal .modal-title').text('Success!');
                        $('#contactModal .modal-body').text('Reservation added');
                        $('#contactModal').modal();

                        $('#reservation-form')[0].reset();
                    }
                    else {
                        var response_array=$.parseJSON(res);
                        var errors = "";
                        $.each(response_array,function (index, value) {
                            errors += value+'\n';
                        });
                        $('#contactModal .modal-title').text('There are following errors:');
                        $('#contactModal .modal-body').text(errors);
                        $('#contactModal').modal();
                    }

                },
                error: function(){
                    $('#contactModal .modal-title').text('Error');
                    $('#contactModal .modal-body').text('Server error. Please, try again later');
                    $('#contactModal').modal();
                }
            });
            return false;
        });

        $('#feedback').on('submit',function (event){
            event.preventDefault();
        });

        $('#feedback-submit').on('click', function () {
            var data = $('#feedback').serialize();

            if (!data){
                alert('Enter your data, please');
                return false;
            }

            $.ajax({
                url: '/site/feedback',
                type: 'POST',
                data: data,
                success: function(res){
                    if (res === 'Success'){
                        $('#feedbackModal .modal-title').text('Success!');
                        $('#feedbackModal .modal-body').text('Your message was sent');
                        $('#feedbackModal').modal();

                        $('#feedback')[0].reset();
                    }
                    else {
                        var response_array=$.parseJSON(res);
                        var errors = "";
                        $.each(response_array,function (index, value) {
                            errors += value+'\n';
                        });
                        $('#feedbackModal .modal-title').text('There are following errors:');
                        $('#feedbackModal .modal-body').text(errors);
                        $('#feedbackModal').modal();
                    }

                },
                error: function(){
                    $('#feedbackModal .modal-title').text('Error');
                    $('#feedbackModal .modal-body').text('Server error. Please, try again later');
                    $('#feedbackModal').modal();
                }
            });
            return false;
        });

        $('#contact').on('submit', function () {
            var data = $('#email').val();
            if (!data) {
                alert('Enter your email, please');
                return false;
            }
            $.ajax({
                url: '/site/subscribe',
                type: 'POST',
                data: {email: data},
                success: function(res){
                    if (res === 'Success!'){
                        $('#subscribeModal .modal-title').text('Success!');
                        $('#subscribeModal .modal-body').text('Your email added');
                        $('#subscribeModal').modal();
                        $('#email').val('');
                    }
                    else {
                        var response_array=$.parseJSON(res);
                        var errors = "";
                        $.each(response_array,function (index, value) {
                            errors += value+'\n';
                        });
                        $('#subscribeModal .modal-title').text('There are following errors:');
                        $('#subscribeModal .modal-body').text(errors);
                        $('#subscribeModal').modal();
                    }

                },
                error: function(){
                    $('#contactModal .modal-title').text('Error');
                    $('#contactModal .modal-body').text('Server error. Please, try again later');
                    $('#contactModal').modal();
                }
            });
            return false;
        });



    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }