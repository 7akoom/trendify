@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'تمت العملية',
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'حدث خطأ',
            text: "{{ session('error') }}",
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif

<script>

    function updateCartTotal() {
        let total = 0;
        $('tbody tr').each(function() {
            let price = parseFloat($(this).find('.cart__price').text());
            if (!isNaN(price)) {
                total += price;
            }
        });
        $('#cart-subtotal').text(total);
        $('#cart-total').text(total);
        $('#cart-page-subtotal').text(total);
        $('#cart-page-total').text(total);
    }

    $(document).ready(function() {
        const csrf_token = '{{ csrf_token() }}';

        function sendUpdate(input) {
            let id = input.data('id');
            let qty = parseInt(input.val());

            if (isNaN(qty) || qty < 1) {
                qty = 1;
                input.val(qty);
            }

            let row = $('tr[data-id="' + id + '"]');
            let unitPrice = parseFloat(row.data('unit-price'));
            let totalPrice = (unitPrice * qty);

            row.find('.cart__price').text(totalPrice);

            updateCartTotal();

            $.ajax({
                url: '/cart/' + id,
                type: 'POST',
                data: {
                    qty: qty,
                    _token: csrf_token,
                    _method: 'PUT'
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'تم تحديث الكمية بنجاح',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#cart-count').text(response.cartCount);
                    $('#cart-total').text(response.cartTotal);
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        $(document).on('input', '.qty', function () {
            sendUpdate($(this));
        });

        $(document).on('click', '.qtybtn', function () {
            let input = $(this).siblings('input.qty');
            let currentVal = parseInt(input.val());
            if ($(this).hasClass('qty-plus')) {
                input.val(currentVal + 1);
            } else if ($(this).hasClass('qty-minus') && currentVal > 1) {
                input.val(currentVal - 1);
            }
            sendUpdate(input);
        });
    });
</script>
<script>
    $(document).on('click', '.remove-item', function(e){
        e.preventDefault();

        let id = $(this).data('id');
        const csrf_token = '{{ csrf_token() }}';

        $.ajax({
            url: '/cart/' + id,
            type: 'POST',
            data: {
                _method: 'DELETE',
                _token: csrf_token
            },
            success: function (response) {
                $(`tr[data-id="${id}"]`).remove();

                Swal.fire({
                    icon: 'success',
                    title: 'تم حذف العنصر بنجاح',
                    timer: 1500,
                    showConfirmButton: false
                });
                $('#cart-mobile-count').text(response.cartCount);
                $('#cart-count').text(response.cartCount);
                $('#cart-total').text(response.cartTotal);
                updateCartTotal();
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $(document).on('click', '.add-cart', function(e){
    e.preventDefault();

    const csrf_token = '{{ csrf_token() }}';

    $.ajax({
        url: '/cart',
        type: 'POST',
        data: {
            product_id: $(this).data('id'),
            qty: 1,
            _token: csrf_token
        },
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'تم إضافة المنتج إلى سلتك بنجاح',
                timer: 1500,
                showConfirmButton: false
            });
            $('#cart-count').text(response.cartCount);
            $('#cart-mobile-count').text(response.cartCount);
            $('#cart-total').text(response.cartTotal);
            $('#cart-page-subtotal').text(total);
            $('#cart-page-total').text(total);
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    });
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkbox = document.getElementById('sameAsBilling');

        checkbox.addEventListener('change', function () {
            const fields = ['first_name', 'last_name', 'street_address', 'city', 'state', 'country', 'postal_code', 'phone', 'email'];

            fields.forEach(field => {
                const billing = document.querySelector(`[name="addr[billing][${field}]"]`);
                const shipping = document.querySelector(`[name="addr[shipping][${field}]"]`);

                if (checkbox.checked) {
                    shipping.value = billing.value;
                } else {
                    shipping.value = '';
                }
            });
        });
    });
</script>
