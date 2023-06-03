
    <!-- Reemplaza "test" con tu propio ID de cliente de la aplicación de tu cuenta de PayPal -->
    <script src="https://www.paypal.com/sdk/js?client-id=IDa&currency=USD"></script>
    <!-- Configura un elemento de contenedor para el botón -->
    <div id="paypal-button-container"></div>
    <div id="paypal-button"></div>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                // Aquí puedes personalizar la orden que se enviará a PayPal
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo calcularTotalCarrito(); ?>' // Precio del producto
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                // Aquí puedes manejar el evento de aprobación del pago
                return actions.order.capture().then(function(details) {
                    // Aquí puedes mostrar un mensaje de éxito o redirigir al usuario a una página de confirmación
                    alert('Pago completado con éxito. ID de transacción: ' + details.id);
                });
            },
            onError: function(err) {
                // Aquí puedes manejar los errores que ocurran durante el proceso de pago
                console.log(err);
                alert('Ha ocurrido un error durante el proceso de pago. Por favor, inténtalo de nuevo.');
            }
        }).render('#paypal-button');
    </script>