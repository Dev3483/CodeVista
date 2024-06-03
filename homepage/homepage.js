ScrollTrigger.create({
            animation: gsap.from(".logo", {
                y: "50vh",
                scale: 8.0,
                yPercent: -50,
                xPercent:250,

            }),
            scrub: true,
            trigger: ".container",
            start: "top right",
            endTrigger: "",
            end: "left 300px",
            
        });
  
let btn = document.querySelector("h3");
btn.addEventListener("click", () => {
    btn.style.backgroundColor = "green";
})