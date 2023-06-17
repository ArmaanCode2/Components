const c = document.querySelector("#c");

//selecting elements with this colour so wer can change its colour - armaan
const defaultColor = "6c63ff";
const i = document.querySelectorAll("[fill*='" + defaultColor + "']");

const btn = document.querySelector("button");


//for current selected item
let selected;
document.querySelectorAll(".photos svg").forEach(elem =>{
    elem.addEventListener("click",(e)=>{
        for (let i = 0; i < elem.parentNode.childElementCount; i++) {
            elem.parentNode.children[i].classList.remove("selected");
        }
        elem.classList.add("selected");
        selected = elem;
    })
})


function changecolor(e){
    i.forEach(elem =>{
        elem.style.fill = e.target.value;
    })
}

function downloadSVG() {
    selected.classList.remove("selected");
    const blob = new Blob([selected.outerHTML], {type: "image/svg+xml"});
    const element = document.createElement("a");
    element.download = "armaan.svg";
    element.href = URL.createObjectURL(blob);
    element.click();
    element.remove();
  }

//download
btn.onclick = ()=>{
    downloadSVG();
}

c.addEventListener("change",changecolor)
c.addEventListener("input", changecolor);