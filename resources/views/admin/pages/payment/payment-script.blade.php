<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $.ajax({
        url: '{{ route("payment-list-api") }}',
        type: 'GET',
        success: function(response) {
            console.log("the list of response", response);
            if (response.status === 'OK') {
                var payments = response.data;
                console.log("the list payments ", payments);

                var tableBody = $('#table-1 tbody');
                tableBody.empty(); // Clear existing rows

                payments.forEach(function(payment) {
                    var paymentRow = '<tr>' +
                        '<td>' + payment.paymentOrderId + '</td>' +
                        // '<td>' + payment.transactionDate + '</td>' +
                        '<td>' + payment.company + '</td>' +
                        '<td>' + payment.amount + '</td>' +
                        // '<td>' + payment.currency + '</td>' +
                        '<td>' + payment.reference + '</td>' +
                        '<td>' + payment.phone + '</td>' +
                        // '<td>' + payment.paybillNumber + '</td>' +
                        '<td><span class="badge badge-success">' + payment.paymentStatus + '</span></td>' +
                        // '<td>' + payment.country + '</td>' +
                        '<td>' + payment.paymentReceipt + '</td>' +
                        // '<td>' + payment.transactionType + '</td>' +
                        // '<td>' + payment.remarks + '</td>' +
                        '<td>' + payment.transactionDate + '</td>' +
                        '<td>' +
                        '<span>' +
                        '<a href="#" class="btn btn-primary btn-sm text-white text-center py-0 justify-content-center ml-2" style="height: 25px"> <i class="far fa-eye"></i> </a>' +
                        // '<a href="#" class="btn btn-danger btn-sm text-center text-white"><i class="icon-trash menu-icon"></i></a>' +
                        // '<a href="#" class="btn btn-warning btn-sm text-center text-white"><i class="fa fa-pencil"></i></a>' +
                        '</span>' +
                        '</td>' +
                        '</tr>';

                    tableBody.append(paymentRow);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", status, error);
        }
    });


</script>
