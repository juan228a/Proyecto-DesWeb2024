/*// Definir las respuestas del chatbot
const respuestas = {
    "¿Cuál es tu nombre?": ["Me llamo ChatBot.", "Soy un ChatBot, ¿en qué puedo ayudarte?"],
    "¿Cómo estás?": ["Estoy bien, gracias por preguntar.", "Todo está funcionando correctamente."],
    "¿Cuál es la capital de Francia?": ["La capital de Francia es París.", "París es la capital de Francia."],
    "¿Qué es un chatbot?": ["Un chatbot es un programa diseñado para simular conversaciones con humanos.", "Un chatbot es un programa de inteligencia artificial que puede interactuar con usuarios humanos."],
    "¿Cómo puedo ayudarte?": ["Puedo responder preguntas, proporcionar información, o simplemente charlar contigo.", "Estoy aquí para ayudarte en lo que necesites."],
    "Adiós": ["¡Hasta luego!", "Nos vemos pronto.", "¡Que tengas un buen día!"]
};

// Función para obtener una respuesta aleatoria
function obtenerRespuesta(pregunta) {
    if (pregunta in respuestas) {
        const opciones = respuestas[pregunta];
        return opciones[Math.floor(Math.random() * opciones.length)];
    } else {
        return "Lo siento, no puedo responder a esa pregunta.";
    }
}

// Función principal para manejar la interacción del usuario
function main() {
    console.log("¡Hola! Soy un ChatBot. ¿En qué puedo ayudarte hoy?");
    while (true) {
        const pregunta = prompt("Tú: ");
        if (pregunta.toLowerCase() === "adiós") {
            console.log(obtenerRespuesta(pregunta));
            break;
        } else {
            console.log("ChatBot:", obtenerRespuesta(pregunta));
        }
    }
}

// Ejecutar la función principal al cargar la página
main();*/