const photoGalleryObj = {
    init: ()=>{
        const masonry = new MiniMasonry({
            container: document.querySelector('#galleryContainer'),
            surroundingGutter: false,
            gutterX: 25,
            gutterY: 25,
            baseWidth: 400
          });
        jsdev.lazyLoad(".gallery-item", {onLoad: ()=>{masonry.layout();}, onError: (elem)=>{elem.remove();}})
    }
};
photoGalleryObj.init();
