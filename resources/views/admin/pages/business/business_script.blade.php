<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('#table-1-product-list').DataTable();


        $('#business-add').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{route('business-add')}}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: formData,
                success: function(response) {
                    console.log("the response is ",response);
                    $('#exampleModal-4').modal('hide');
                    alert('Business added successfully!');
                    window.location.href = '{{ route("business-list") }}';

                },
                error: function(xhr) {
                    // Handle an error response
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });

        $.ajax({
            url: '{{ route("business-all") }}',
            type: 'GET',
            success: function(response) {

                console.log("the list of response",response);
                if (response.status === 'OK') {
                    var business = response.data;
                    console.log("the list business ", business);

                    var tbody = $('#table-1 tbody');
                    tbody.empty();

                    business.forEach(function(business, index) {
                        var row = '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + business.name + '</td>' +
                            '<td>' + business.phoneNumber + '</td>' +
                            '<td>' + business.businessShortCode + '</td>' +
                            '<td>' + business.administrationPhoneNumber + '</td>' +
                            '<td>' + business.email + '</td>' +
                            '<td>' + business.status + '</td>' +
                            '<td>' + business.tinNumber + '</td>' +
                            '<td>' + business.contactPerson + '</td>' +
                            '<td>' + business.contactNumberPhone + '</td>' +
                            // '<td>' + business.createdDate + '</td>' +
                            '<td><a href="/business-details/' + business.id + '" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>' +
                            '</tr>';
                        tbody.append(row);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
            }
        });
    });
</script>
