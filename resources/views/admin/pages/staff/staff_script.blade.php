<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '{{ route("business-owner") }}',
            type: 'GET',
            success: function (response) {

                 console.log("the list of response",response);
                if (response.status === 'OK') {
                    var users = response.data;
                    console.log("the list users ",users);



                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", status, error);
            }
        });

    })

</script>
