<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '{{ route("product-all") }}',
            type: 'GET',
            success: function(response) {

                  // console.log("the list of response",response);
                if (response.status === 'OK') {
                    var products = response.data;
                     console.log("the list product ", products);

                    var tbody = $('#table-1 tbody');
                    tbody.empty(); // Clear any existing rows

                    products.forEach(function(product, index) {
                        var row = '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + product.name + '</td>' +
                            '<td>' + product.sellingPrice + '</td>' +
                            '<td>' + product.purchasePrice + '</td>' +
                            '<td>' + product.unitShippingPrice + '</td>' +
                            '<td>' + product.includeShipping + '</td>' +
                           // '<td>' + product.description + '</td>' +
                          //  '<td>' + product.color + '</td>' +
                          //  '<td>' + product.unitMeasure + '</td>' +
                             '<td>' + product.institution + '</td>' +
                            '<td>' + product.code + '</td>' +
                            '<td>' + product.unit + '</td>' +
                            // '<td>' + product.pictureLink + '</td>' +
                            // '<td>' + product.createdDate + '</td>' +
                            '<td><label class="#">' + product.status + '</label></td>' +
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
                            '</td>' +
                            '</tr>';
                        tbody.append(row);
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
    });

    $.ajax({
        url: '{{ route("business-all") }}',
        type: 'GET',
        success: function(response) {
            console.log("the list of response", response);
            if (response.status === 'OK') {
                var business = response.data;
                console.log("the list business ", business);

                var selectElement = $('#exampleSelectGender');
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

    $.ajax({
        url: '{{ route("product-status") }}',
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

    // function to add the product
    $('#add-product').on('submit', function(event) {
        event.preventDefault();

        var formData = $(this).serialize();
        //console.log("the formdata is ",formData);
        $.ajax({
            url: '{{ route("add-product") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log("Product added successfully:", response);
                if (response.status === 'OK' || response.code === 200) {

                    // Redirect to the 'product-list' route
                    window.location.href = '{{ route("product-list") }}';
                    alert('product added successfully!');
                }

            },
            error: function(xhr, status, error) {
                console.error("Error adding product:", status, error);
            }
        });
    });

    $.ajax({
        url: '{{ route("product-summary") }}',
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

</script>



