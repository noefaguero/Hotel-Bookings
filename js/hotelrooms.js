
const tbody = document.getElementById("tbody")
const id_hab = document.getElementById("id_hab")

const getRoomId = (event) => {
    if (event.target.tagName === "A") {
        id_hab.setAttribute("value", event.target.getAttribute("data-room-id"))
    }
}

tbody.addEventListener("click", (event) => getRoomId(event))