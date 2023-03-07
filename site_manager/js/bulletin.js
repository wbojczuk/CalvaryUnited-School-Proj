const bulletinObj = {
    init: ()=>{
        // Check if there are unsaved changes before page closes/exits
        // Remember to remove listener when saving
        jsdev.unsavedChanges.listen();
        // Save Button Listeners/Actions
        const saveButton = document.getElementById("saveButton");
        saveButton.addEventListener("click", saveChanges);

        function saveChanges(){
           jsdev.unsavedChanges.destroy();
            jsdev.postData(
                [{name: "toSave", value: document.getElementById("bulletinVal").value}],
                "./site_manager.php?page=bulletin&action=savedata"
                )
        }
    }
}

bulletinObj.init();