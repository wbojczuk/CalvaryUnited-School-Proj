const navObj = {
    init: ()=>{
        // Mobile Menu Listeners
        const exitButton = document.getElementById("mobileNavExit");
        const menuButton = document.getElementById("mobileNavMenu");
        const linkMenu = document.getElementById("navLinkWrapper");

        menuButton.addEventListener("click", openMenu);
        exitButton.addEventListener("click", closeMenu);

        function openMenu(){
            gsap.to(menuButton,{
                rotate: "-360deg",
                opacity:0,
                scale: 0,
                duration:1,
                ease: "power4.out"
            })

            gsap.fromTo(exitButton,{
                rotate: "360deg",
                scale: 0,
                opacity:0,
            },
            {
                rotate: "0",
                scale: 1,
                opacity:1,
                duration:1,
                ease: "power4.out"
            });

            gsap.to(linkMenu, {
                "clip-path": "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
                duration:1,
                ease: "power4.out"
            })
        }
        function closeMenu(){
            gsap.to(menuButton,{
                rotate: "0",
                opacity:1,
                scale: 1,
                duration:1,
                ease: "power4.out"
            })

            gsap.to(exitButton,{
                rotate: "360deg",
                scale: 0,
                opacity:0,
                duration:1,
                ease: "power4.out"
            });

            gsap.to(linkMenu, {
                "clip-path": "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
                duration:1,
                ease: "power4.out"
            })
        }
    }
};

navObj.init();