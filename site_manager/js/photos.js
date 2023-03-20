const photosObj = {
    init: ()=>{
        const getItems = jsdev.GETValues();
        let currentCategory = (getItems.category) ? getItems.category : 0;
        const localData = [...photoData];
        const currentData = localData[currentCategory];

        jsdev.unsavedChanges.listen();

        // Add Event Listeners
        const addCategoryButton = document.getElementById("addCategoryButton");
        addCategoryButton.addEventListener("click", addCategory);

        const removeAlbumButton = document.getElementById("removeAlbumButton");
        removeAlbumButton.addEventListener("click", removeAlbum);

        const saveButton = document.getElementById("saveButton");
        saveButton.addEventListener("click", saveData);

        const addPhotosButton = document.getElementById("addPhotosButton");
        addPhotosButton.addEventListener("click", toggleAddPhotosContainer);

        const removeElems = document.querySelectorAll(".remove-image");
        removeElems.forEach((elem)=>{
            elem.addEventListener("click", removeImage);
        })

        const addPhotosContainer = document.getElementById("addPhotosContainer");
        const addPhotosInput = document.getElementById("addPhotosInput");
        const addPhotosCancel = addPhotosContainer.querySelector(".cancel");
        const addPhotosSubmit = addPhotosContainer.querySelector(".submit");

        addPhotosCancel.addEventListener("click", ()=>{
            addPhotosInput.value = "";
            toggleAddPhotosContainer();
        });
        addPhotosSubmit.addEventListener("click", ()=>{
            if(/\w{1,}/.test(addPhotosInput.value)){
                addPhotos();
            }
        })

        // Event Functions
        let addPhotosOpen = false;
        function toggleAddPhotosContainer(){
            if(addPhotosOpen){
                addPhotosContainer.style.display = "none";
            }else{
                addPhotosContainer.style.display = "flex";
            }
            addPhotosOpen = !addPhotosOpen;
        }
        
        function addPhotos(){
            const currentURLS = addPhotosInput.value.split("~");
            currentURLS.forEach((url)=>{
                (currentData.urls).push(url.trim());
            });
            saveData();
        }

        function removeImage(evt){
            if(confirm("Are you sure you want to remove this image?")){
                currentData.urls.splice(parseInt((evt.target).parentElement.dataset.image_index), 1);
                saveData();
            }
        }

        function removeAlbum(){
            if(confirm(`Are you sure you want to remove the album "${currentData.title}", and all of its contents?`)){
                localData.splice(currentCategory, 1);
                --currentCategory;
                saveData();
            }
        }

        function addCategory(){
            let newName = prompt("Enter the new album's name");
            if(newName != null && /\w{1,}/.test(newName)){
                const currentID = jsdev.getUUID();
                localData.push(
                    {
                        title: newName.trim(),
                        urls: [],
                        id: currentID
                    }
                );
                saveData(currentID);
            }else if(newName != null){
                alert("Please enter a valid name.")
            }
        }

        function saveData(postID = 000){
            jsdev.unsavedChanges.destroy();
            
            jsdev.postData({
                POST: [{name: "toSave", value: JSON.stringify(localData)}, {name: "postid", value: postID}],
                GET: [{name: "page", value: "photos"}, {name: "category", value: currentCategory}, {name: "action", value: "savedata"}],
                action: "./site_manager.php"
            });
        }
    }
};

photosObj.init();