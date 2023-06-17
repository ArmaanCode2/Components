function slidingAnimation(){
    let divs = document.querySelectorAll(".box");
    let div = [divs[0],divs[1],divs[2]];
    const parentDiv = document.querySelector(".boxes");

    let index = 0;
    const interval = 2000; 


    const firstClone = div[0].cloneNode(true);
    const lastclone = div[div.length - 1].cloneNode(true);

    firstClone.id = 'first-clone';
    lastclone.id = 'last-clone';

    // parentDiv.append(firstClone)
    // parentDiv.prepend(lastclone)

    const slideWidth = div[index].clientWidth;

    parentDiv.style.transform = `translateX(${-slideWidth * index}px)`;

    const startSlide = () =>{
        setInterval(() => {
            index++;
            parentDiv.style.transform = `translateX(${-slideWidth * index}px)`;
            parentDiv.style.transform = '.7s';
            if(index > 1){
                index = -1;
                parentDiv.style.transform = `translateX(${-slideWidth * index}px)`;
            }
        }, interval);
    }

    parentDiv.addEventListener("transitionend",()=>{
    let div = document.querySelectorAll(".box");
        if(div[index].id === firstClone.id){
            parentDiv.style.transform = 'none';
        }
    })
    startSlide();
}

function Matching(){
    const match = window.matchMedia("(max-width: 500px)");
    if(match.matches){
        slidingAnimation();
    }
    else{
        return;
    }
}

window.addEventListener("resize",Matching);