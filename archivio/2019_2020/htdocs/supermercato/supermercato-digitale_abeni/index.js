const checkbox = document.getElementById("autoupdate")

let autoupdate = localStorage.getItem("auto-update")
if(autoupdate != null || autoupdate != undefined) {

    let valore = autoupdate == "true"
    checkbox.checked = valore

}

checkbox.onclick = (e) => {
    localStorage.setItem("auto-update", e.target.checked)
}

setInterval(() => {
    if(checkbox.checked) {
        window.location.reload(true)
    }
}, 10000)