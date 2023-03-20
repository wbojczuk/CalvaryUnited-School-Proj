<?php
// PHP File to manage the Photo Gallery

// ACTIONS 
if(isset($_GET["action"])){
    if($_GET['action'] == "savedata"){
        $temp_json_data = json_decode(file_get_contents("./data/photos.json"));
        // Check for existing ID
        $id_exists = false;
        foreach($temp_json_data as $current_album){
            if($current_album->id == $_POST["postid"]){
                $id_exists = true;
            }
        }
        if(!$id_exists){
            file_put_contents("./data/photos.json", $_POST['toSave']);
        }
    }
}
?>


<script src="./site_manager/js/photos.js" defer></script>

<!-- Photo Album Nav Bar -->
<div id="albumBar">
    <?php
        $json_data = json_decode(file_get_contents("./data/photos.json"));
        $current_category = (isset($_GET["category"])) ? $_GET["category"] : 0;
        
        $counter = 0;
        foreach($json_data as $category){
            $active_class = ($counter == $current_category) ? "class='active'" : "";
            echo "<a href='./site_manager.php?page=photos&category=$counter' $active_class data-id='$category->id'>$category->title</a>";
            ++$counter;
        }
    ?>
    <button id="addCategoryButton" class="button-one">+ Add Album</button>
</div>

<div id="actionBar" style="margin-top: 4vh;margin-bottom: 4vh;">
    <button id="saveButton">Save</button>
    <button id="addPhotosButton">Add Photo(s)</button>
    <button id="removeAlbumButton">Remove Album</button>

    <div id="addPhotosContainer" class="center" style="width: 100%;margin-top: 1vh;">
        <textarea name="addPhotosInput" id="addPhotosInput" cols="80" rows="10" placeholder="Place photo urls here, you can add more than one url at once by separating them with a tilde &quot; ~ &quot;"></textarea>
        <div id="addPhotosOptions">
            <div class="cancel"></div>
            <div class="submit"></div>
        </div>
    </div>
</div>
<?php
// BUILD LINKS
    $current_category_data = $json_data[$current_category];
    $link_counter = 0;
    foreach($current_category_data->urls as $url){
        ?>
        <div class="link-container" data-image_index="<?php echo $link_counter; ?>">
            <input type="text" value="<?php echo $url; ?>">
            <div class="remove-image"></div>
        </div>
        <?php
        ++$link_counter;
    }
?>


<!-- Pass JSON To JavaScript -->
<script>
    var photoData = <?php echo json_encode($json_data); ?>;
</script>