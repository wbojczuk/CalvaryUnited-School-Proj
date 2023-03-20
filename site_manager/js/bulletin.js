const bulletinObj = {
    init: ()=>{
        // Check if there are unsaved changes before page closes/exits
        jsdev.unsavedChanges.listen();
        // Save Button Listeners/Actions
        const saveButton = document.getElementById("saveButton");
        saveButton.addEventListener("click", saveChanges);

        function saveChanges(){
           jsdev.unsavedChanges.destroy();
            jsdev.postData({
                POST: [{name: "toSave", value: document.getElementById("bulletinVal").value}],
                GET: [{name: "page", value: "bulletin"}, {name: "action", value: "savedata"}],
                action: "./site_manager.php"
            })
        }
    }
}

bulletinObj.init();