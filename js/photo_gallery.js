const photoGalleryObj = {
    init: ()=>{
        const allImgElems = document.querySelectorAll(".gallery-item");

        const lazyObserver = new IntersectionObserver((imgs)=>{
            imgs.forEach((img)=>{
                if(img.isIntersecting){
                    lazyObserver.unobserve(img.target);
                    photoGalleryObj.loadImg(img.target);
                }
            })
        },{
            threshold: 0.1
        });

        allImgElems.forEach((elem)=>{
            lazyObserver.observe(elem);
        })
    },

    loadImg: (img)=>{
       
        // check if img exisits
        const testImg = new Image();
        testImg.src = img.dataset.src;
        
        if(testImg.complete){
            img.src  = img.dataset.src;
            masonry.layout();
        }else{
            testImg.onload = ()=>{
                img.src = img.dataset.src;
                masonry.layout();
            };
            // If image doesn't exist, remove the image element
            testImg.onerror = ()=>{
                img.remove();
            };
        }
    }
};
const masonry = new MiniMasonry({
    container: document.querySelector('#galleryContainer'),
    surroundingGutter: false,
    gutterX: 25,
    gutterY: 25,
    baseWidth: 400
  });
photoGalleryObj.init();
