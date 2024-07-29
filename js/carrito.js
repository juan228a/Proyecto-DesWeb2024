const tools = [
    { id: 1, name: "Destornillador", description: "Herramienta manual que se utiliza para apretar o aflojar tornillos", price: 800, image: "../imagenes/philips.jpg" },
    { id: 2, name: "Cinta Metrica 10mts", description: "Herramienta de medición flexible utilizada para medir longitudes o distancias", price: 1000, image: "../imagenes/cintametrica.png" },
    { id: 3, name: "Martillo", description: "herramienta manual utilizada para golpear, clavar, o extraer clavos, y para otras tareas que requieren fuerza bruta aplicada de manera controlada.", price: 1000, image: "../imagenes/Martillo.png" },
    { id: 4, name: "Nivel De Burbuja", description: "herramienta de medición utilizada para determinar si una superficie está perfectamente horizontal o vertical ", price: 1200, image: "../imagenes/nivel-de-burbuja.png" },
    { id: 5, name: "Pinza", description: "utilizada para sujetar, agarrar, cortar, o doblar objetos pequeños.", price: 1300, image: "../imagenes/pinza.pmg.jpg" },
    { id: 6, name: "Plano", description: "Utilizada para apretar o aflojar tornillos que tienen una ranura recta en la cabeza", price: 800, image: "../imagenes/plano.png" },
    { id: 7, name: "Pico Loro", description: "Utilizada principalmente en trabajos de fontanería y plomería para ajustar y apretar tuberías y conexiones.", price: 1600, image: "../imagenes/pico loro.jpg" },
    { id: 8, name: "Llave Alem", description: "herramienta manual diseñada para apretar o aflojar tornillos y pernos con una cabeza hexagonal interior, conocida como cabeza Allen.", price: 1100, image: "../imagenes/llave alem.jpg" },
    // Agrega más herramientas aquí
];

document.addEventListener('DOMContentLoaded', () => {
    const toolsList = document.getElementById('mostrador');

    tools.forEach(tool => {
        const toolCard = document.createElement('div');
        toolCard.className = 'item';
        toolCard.onclick = () => showForm(tool);

        toolCard.innerHTML = `
            <div class="contenedor-foto">
                <img src="${tool.image}" alt="${tool.name}">
            </div>
            <p class="descripcion">${tool.name}</p>
            <p>${tool.description}</p>
            <span class="precio">$${tool.price} por día</span>
        `;

        toolsList.appendChild(toolCard);
    });
});

function showForm(tool) {
    document.getElementById('toolName').textContent = `Herramienta: ${tool.name}`;
    document.getElementById('toolPrice').value = tool.price;
    document.getElementById('formulario').style.display = 'block';
}

function cancelForm() {
    document.getElementById('formulario').style.display = 'none';
}

// document.getElementById('rentForm').addEventListener('submit', function(e) {
//     e.preventDefault();

//     const toolName = document.getElementById('toolName').textContent;
//     const rentalDays = document.getElementById('rentalDays').value;
//     const customerName = document.getElementById('customerName').value;
//     const customerEmail = document.getElementById('customerEmail').value;
//     const toolPrice = document.getElementById('toolPrice').value;
//     const totalPrice = rentalDays * toolPrice;

//     alert(`Has alquilado: ${toolName} por ${rentalDays} días.\nNombre: ${customerName}\nEmail: ${customerEmail}\nPrecio total: $${totalPrice}`);

//     document.getElementById('formulario').style.display = 'none';
// });
