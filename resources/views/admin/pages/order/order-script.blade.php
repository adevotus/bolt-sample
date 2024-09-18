<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $.ajax({
        url: '{{ route("orders-list-api") }}',
        type: 'GET',
        success: function(response) {
            console.log("the list of response", response);
            if (response.status === 'OK') {
                var orders = response.data;
                console.log("the list orders ", orders);

                var tableBody = $('#table-1 tbody');
                tableBody.empty(); // Clear existing rows

                orders.forEach(function(order) {
                    // Determine order status text and class
                    var orderStatusText, orderStatusClass;
                    switch (order.orderStatus) {
                        case 1:
                            orderStatusText = 'New Order';
                            orderStatusClass = 'badge badge-warning';
                            break;
                        case 2:
                            orderStatusText = 'PAID';
                            orderStatusClass = 'badge badge-success';
                            break;
                        default:
                            orderStatusText = 'NOT PAID';
                            orderStatusClass = 'badge badge-warning';
                            break;
                    }

                    // Determine payment status text and class
                    var paymentStatusText, paymentStatusClass;
                    switch (order.paymentStatus) {
                        case 1:
                            paymentStatusText = 'NO PAID';
                            paymentStatusClass = 'badge badge-warning';
                            break;
                        case 2:
                            paymentStatusText = 'PAID';
                            paymentStatusClass = 'badge badge-success';
                            break;
                        default:
                            paymentStatusText = 'NOT PAID';
                            paymentStatusClass = 'badge badge-warning';
                            break;
                    }

                    // Create and append the table row
                    var orderRow = '<tr>' +
                        '<td>' + order.orderNumber + '</td>' +
                        '<td>' + order.orderDate + '</td>' +
                        // '<td>' + order.shippmentDate + '</td>' +
                        '<td>' + order.totalAmount + '</td>' +
                        '<td>' + order.shippingCost + '</td>' +
                        '<td>' + order.unitPrice + '</td>' +
                        '<td>' + order.quantity + '</td>' +
                        '<td>' + order.orderPaymentReference + '</td>' +
                        '<td><span class="' + orderStatusClass + '">' + orderStatusText + '</span></td>' +
                        '<td><span class="' + paymentStatusClass + '">' + paymentStatusText + '</span></td>' +
                        // '<td>' + order.createdDate + '</td>' +
                        '<td>' +
                        '<span>' +
                        '<a href="#" class="btn btn-primary btn-sm text-white text-center"><i class="fa fa-eye"></i></a>' +
                        '</span>' +
                        '</td>' +
                        '</tr>';

                    tableBody.append(orderRow);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", status, error);
        }

    });


    $.ajax({
        url: '{{ route("order-summary") }}',
        type: 'GET',
        success: function(response) {
            if (response.status === 'OK') {
                var orderSummary = response.data;
                console.log("the order-summary ", orderSummary);

                // Reset all orders to 0 before updating
                $('#total-order').text('0');
                $('#accepted-order').text('0');
                $('#pending-order').text('0');
                $('#canceled-order').text('0');

                // Loop through the order summary and update the corresponding elements
                orderSummary.forEach(function(order) {
                    var status = order[0];
                    var count = order[1];

                    if (status === 'Pending') {
                        $('#pending-order').text( count);
                    } else if (status === 'Paid') {
                        $('#accepted-order').text(count);  // Assuming "Paid" means "Accepted"
                    } else if (status === 'Canceled') {
                        $('#canceled-order').text( count);
                    }
                    // Add other statuses as needed
                });

                // Update the total order count (sum of all orders)
                var totalCount = orderSummary.reduce(function(total, order) {
                    return total + order[1];
                }, 0);
                $('#total-order').text( + totalCount);
            }
        },

        error: function(xhr, status, error) {
            console.error("Error:", status, error);
        }
    });





</script>
