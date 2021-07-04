function setIdToModal(elements, inputId) {
    for(let i = 0; i < elements.length; i++) {
        elements[i].addEventListener("click", function() {
            document.getElementById(inputId).value = +elements[i].getAttribute("data-item-id");           
        });
    }
}