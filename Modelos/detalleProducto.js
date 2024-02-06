// Agrega un manejador de eventos al botón "Comprar" en la vista de detalles del producto
document.getElementById("comprar").addEventListener("click", function (event) {
    event.preventDefault(); // Evita la acción predeterminada del formulario
    alert("anda")
    // Obtiene la ID del producto del formulario
    const productId = document.querySelector("input[name='idU']").value;
    
    // Obtiene la talla y la cantidad del producto del formulario
    const selectedTalla = document.getElementById("talla").value;
    const quantity = document.getElementById("cantidad").value;

    // Puedes obtener otros detalles directamente aquí si es necesario
    const productImage = document.getElementById("productImage").src;
    const productName = document.getElementById("productName").textContent;
    const productPrice = parseFloat(document.getElementById("productPrice").textContent);

    // Crea un objeto que representa el producto
    const product = {
        id: productId,
        image: productImage,
        name: productName,
        price: productPrice,
        quantity: parseInt(quantity),
        talla: selectedTalla
    };

    // Agrega el producto al carrito
    addToCart(product);

    // Puedes mostrar un mensaje de confirmación o realizar otras acciones
    alert("Producto agregado al carrito");
});
