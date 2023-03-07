const animsObj = {
    init: ()=>{
        // ONLOAD ANIMATIONS
        switch (document.getElementById("pageID").dataset.value){
            case "home":
                animsObj.animHome();
            break;
        }
    },
    animHome: ()=>{
        const bgIMG = new Image();
        bgIMG.src = "./img/mainbg.jpg";
        bgIMG.onload = ()=>{
            document.getElementsByTagName("header")[0].style.backgroundImage = "url('./img/mainbg.jpg')";
            const tl = gsap.timeline({defaults:{duration: 1.5, ease: "power4.out"}});
            tl.to("header h1", {
                "clip-path": "polygon(0% 100%, 100% 100%, 100% 0%, 0% 0%)",
                y:0,
                opacity:1
            })
            .to("header h2", {
                opacity:1,
                "clip-path": "polygon(0% 100%, 100% 100%, 100% 0%, 0% 0%)",
                "transform":"translateY(0)"
            }, "-=.8")
        }
        
    }
}
animsObj.init();