
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
{{--    @if(session('registration_success'))--}}
{{--    toastr.success("{{ session('registration_success') }}");--}}
{{--    @endif--}}
        @if(session('registration_success'))
        toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "timeOut": "60000",
        "extendedTimeOut": "10000",
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.success("{{ session('registration_success') }}").css("color", "black");
    @endif
</script>
<script>
    $(document).ready(function() {
        $('#business-add').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{route('business-registration-post')}}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: formData,
                success: function(response) {
                    console.log("the response is ",response);

                    window.location.href = '{{route('client-dashboard')}}?success=1';

                    // Clear the form after submission
                    $('#business-add')[0].reset();
                    alert('Business added successfully!');
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });

    });
</script>
