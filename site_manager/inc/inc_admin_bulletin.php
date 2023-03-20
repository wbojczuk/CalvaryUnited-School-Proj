<script src="./site_manager/js/bulletin.js" defer></script>
<?php
// PHP File to manage weekly Bulliten
    if(isset($_GET["action"])){
        if($_GET["action"] == "savedata"){
            file_put_contents("./data/bulletin.txt", $_POST["toSave"]);
        }
    }
?>
<div id="actionBar">
    <button id="saveButton">Save</button>
</div>
<div class="center">
    <label for="bulletinVal">This Week's Bulletin: &nbsp;</label><input name="bulletinVal" id="bulletinVal" type="text" value="<?php echo file_get_contents("./data/bulletin.txt"); ?>">
</div>