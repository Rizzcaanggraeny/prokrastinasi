const pages = document.querySelectorAll(".question-page");

let current = 0;

document.querySelectorAll(".next-btn").forEach(btn=>{

    btn.addEventListener("click",()=>{

        const radio = pages[current].querySelector("input[type=radio]:checked");

        if(!radio){
            alert("Silakan pilih salah satu jawaban.");
            return;
        }

        pages[current].classList.add("d-none");

        current++;

        pages[current].classList.remove("d-none");

        window.scrollTo({
            top:0,
            behavior:"smooth"
        });

    });

});

document.querySelectorAll(".prev-btn").forEach(btn=>{

    btn.addEventListener("click",()=>{

        pages[current].classList.add("d-none");

        current--;

        pages[current].classList.remove("d-none");

        window.scrollTo({
            top:0,
            behavior:"smooth"
        });

    });

});