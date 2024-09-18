<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
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
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });

        $.ajax({
            url: '{{ route("business-list-client-api") }}',
            type: 'GET',
            success: function(response) {

                console.log("the list of response",response);
                if (response.status === 'OK') {
                    var business = response.data;
                    console.log("the list business ", business);

                    var tbody = $('#order-listing-business tbody');
                    tbody.empty();

                    business.forEach(function(business, index) {
                        var row = '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + business.name + '</td>' +
                            '<td>' + business.businessShortCode + '</td>' +
                            '<td>' + business.phoneNumber + '</td>' +
                            '<td>' + business.created + '</td>' +
                            '<td><button class="btn btn-outline-primary">View</button></td>' +
                            '</tr>';
                        tbody.append(row);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
            }
        });

        // var table = $('#order-listing').DataTable();
        var table = $('#order-listing').DataTable({
            "destroy": true, // Allow reinitialization
            "paging": true, // Enable pagination
            "searching": true, // Enable search
            "ordering": true,
            "info": true
        });

        //     to get list of product.
        $.ajax({
            url: '{{ route("product-list-client-api") }}',
            type: 'GET',
            success: function(response) {
                console.log("the list of response", response);
                if (response.status === 'OK') {
                    var products = response.data;
                    console.log("the list product ", products);

                    // Clear existing rows
                    table.clear();

                    // Add new rows
                    products.forEach(function(product, index) {
                        table.row.add([
                            (index + 1),
                            product.name,
                            product.sellingPrice,
                            product.purchasePrice,
                            product.includeShipping,
                            product.unitShippingPrice,
                            // product.description,
                            product.color,
                            product.unitMeasure,
                            product.code,
                            product.unit,
                            // '<img src="'+ product.pictureLink +'" alt="Product Image" width="50" height="50"/>',
                            // product.createdDate,
                            '<label>' + product.status + '</label>',
                            '<td>' +
                            '<a href="#" class="btn btn-primary btn-sm text-white text-center view-details" data-toggle="modal" data-target="#exampleModal"' +
                            'data-name="' + product.name + '" ' +
                            'data-purchase="' + product.purchasePrice + '" ' +
                            'data-selling="' + product.sellingPrice + '" ' +
                            'data-shipping="' + product.unitShippingPrice + '" ' +
                            'data-institution="' + product.institution + '" ' +
                            'data-status="' + product.status + '" ' +
                            'data-description="' + product.description + '" ' +
                            'data-code="' + product.code + '" ' +
                            'data-color="' + product.color + '" ' +
                            'data-unit="' + product.unit + '"' +
                            'data-id="' +product.id +'">' +

                            '<i class="fa fa-eye"></i>' +
                            '</a>' +
                            '</td>'
                        ]).draw(false);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
            }
        });
        $(document).on('click', '.view-details', function() {
            var name = $(this).data('name');
            var purchasePrice = $(this).data('purchase');
            var sellingPrice = $(this).data('selling');
            var unitShippingPrice = $(this).data('shipping');
            var institution = $(this).data('institution');
            var status = $(this).data('status');
            var description = $(this).data('description');
            var code = $(this).data('code');
            var color = $(this).data('color');
            var unit = $(this).data('unit');
            var productId = $(this).data('id')

            console.log("the product id ",productId)
            $('#exampleModal .modal-title').text(name);
            $('#exampleModal .profile-widget-item-value.purchase-price').text(purchasePrice);
            $('#exampleModal .profile-widget-item-value.selling-price').text(sellingPrice);
            $('#exampleModal .profile-widget-item-value.unit-shipping-price').text(unitShippingPrice);
            $('#exampleModal .profile-widget-name').html(institution + '<div class="text-muted d-inline font-weight-normal"><div class="slash"></div> ' + status + '</div>');
            $('#exampleModal .profile-widget-description .description').text(description);
            $('#exampleModal .code').text(code);
            $('#exampleModal .color').text(color);
            $('#exampleModal .unit').text(unit);
            // Set the product ID in the modal
            $('#exampleModal #product-id').text('Product ID: ' + productId);
            $('#edit-product-link').attr('href', '{{ route("edit-product", ":productId") }}'.replace(':productId', productId));

        });

        // to add product

        $('#add-product').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            //console.log("the formdata is ",formData);
            $.ajax({
                url: '{{ route("addProduct-post") }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log("Product added successfully:", response);
                    if (response.status === 'OK' || response.code === 200) {

                        // Show a toast message
                        toastr.success('Product added successfully!', 'Success');

                        // Redirect to the 'product-list' route after a short delay
                        setTimeout(function() {
                            window.location.href = '{{ route("product-list-client") }}';
                        }, 5000);
                    }

                },
                error: function(xhr, status, error) {
                    console.error("Error adding product:", status, error);
                }
            });
        });

        // List of payment

        $('#all-payments').DataTable();

        $.ajax({
            url: '{{ route("payment-list-client-api") }}',
            type: 'GET',
            success: function(response) {
                console.log("the list of response", response);
                if (response.status === 'OK') {
                    var payments = response.data;
                    console.log("the list payments ", payments);

                    var tableBody = $('#all-payments tbody');
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

        // list of orders

        $('#table-1-order').DataTable();
        $.ajax({
            url: '{{ route("orders-list-api-client") }}',
            type: 'GET',
            success: function(response) {
                console.log("the list of  client orders", response);
                if (response.status === 'OK') {
                    var orders = response.data;
                    console.log("the list orders ", orders);

                    var tableBody = $('#table-1-order tbody');
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
                            // '<a href="#" class="btn btn-danger btn-sm text-center text-white"><i class="icon-trash menu-icon"></i></a>' +
                            // '<a href="#" class="btn btn-warning btn-sm text-center text-white"><i class="fa fa-pencil"></i></a>' +
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
            url: '{{ route("client-product-summary") }}',
            type: 'GET',
            success: function(response) {
                if (response.status === 'OK') {

                    var productSummary = response.data;
                    console.log("the product-summary ", response.data);

                    // Assuming response.data is an array of arrays, e.g., [["INSTOCK", 1], ["LIMITEDSTOCK", 1]]

                    // Clear existing counts
                    let inStockCount = 0;
                    let outStockCount = 0;
                    let comingSoonCount = 0;
                    let limitedCounts =0;
                    let totalProductCount = 0;

                    // Update counts based on response
                    productSummary.forEach(function(item) {
                        if (item[0] === "INSTOCK") {
                            inStockCount += item[1];
                        } else if (item[0] === "LIMITEDSTOCK") {
                            limitedCounts += item[1];

                        } else if (item[0] === "OUTSTOCK") {
                            outStockCount += item[1];
                        }else if (item[0] === "COMINGSOON") {
                            comingSoonCount += item[1];
                        }
                        // Add more conditions if needed
                    });

                    // Calculate total products
                    totalProductCount = inStockCount + outStockCount + comingSoonCount + limitedCounts;

                    // Update the HTML elements
                    document.getElementById("total-product").innerHTML = totalProductCount;
                    document.getElementById("in-stock").innerHTML = inStockCount;
                    document.getElementById("out-stock").innerHTML = outStockCount;
                    document.getElementById("coming-soon").innerHTML = comingSoonCount;
                    // document.getElementById("coming-soon").innerHTML = limitedCounts;
                }


            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
            }
        });



        $.ajax({
            url: '{{ route("order-summary-client") }}',
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
    });


    $.ajax({
        url: '{{ route("client-product-status") }}',
        type: 'GET',
        success: function(response) {
            console.log("the list of response", response);
            if (response.status === 'OK') {
                var business = response.data;
                console.log("the list business ", business);

                var selectElement = $('#exampleSelectProductStatus');
                selectElement.empty(); // Clear any existing options

                business.forEach(function(businessItem) {
                    var option = $('<option></option>')
                        .attr('value', businessItem.id)
                        .text(businessItem.name);
                    selectElement.append(option);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", status, error);
        }
    });


</script>
