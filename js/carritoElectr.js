const tools = [
    { id: 1, name: "Amoladora", description: "Herramienta eléctrica utilizada principalmente para cortar, esmerilar y pulir materiales diversos", price: 10000, image: "imagenes/amoladora.png" },
    { id: 2, name: "Lijadora", description: "Diseñada para alisar superficies mediante el lijado", price: 12000, image: "imagenes/lijadora.jpg" },
    { id: 3, name: "Sierra De Calar", description: "Utilizada principalmente para cortes curvos y precisos en una variedad de materiales como madera, metal, plástico y cerámica", price: 1000, image: "imagenes/sierra de calar.jpg" },
    { id: 4, name: "Motosierra Electrica", description: "Diseñada para cortar árboles, ramas y troncos de manera eficiente y rápida", price: 13000, image: "imagenes/motosierra electrica.jpg" },
    { id: 5, name: "Hidrolavadora", description: "Diseñada para limpiar superficies utilizando agua a alta presión. .", price: 5000, image: "imagenes/hidrolavadora.pjg.png" },
    { id: 6, name: "Pulidora", description: "Herramienta eléctrica diseñada para mejorar y restaurar el acabado de superficies mediante el proceso de pulido.", price: 12000, image: "imagenes/pulidora.jpg" },
    { id: 7, name: "Sierra Electrica", description: "Sirve para cortar materiales diversos de manera rápida y eficiente", price: 16000, image: "imagenes/sierraelectrica.png" },
    { id: 8, name: "Taladro Electrico Percutor", description: "Sirve para perforar en materiales duros como concreto, ladrillo y piedra", price: 11000, image: "imagenes/taladro.png" },
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

document.getElementById('rentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const toolName = document.getElementById('toolName').textContent;
    const rentalDays = document.getElementById('rentalDays').value;
    const customerName = document.getElementById('customerName').value;
    const customerEmail = document.getElementById('customerEmail').value;
    const toolPrice = document.getElementById('toolPrice').value;
    const totalPrice = rentalDays * toolPrice;

    alert(`Has alquilado: ${toolName} por ${rentalDays} días.\nNombre: ${customerName}\nEmail: ${customerEmail}\nPrecio total: $${totalPrice}`);

    document.getElementById('formulario').style.display = 'none';
});
