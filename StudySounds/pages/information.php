<?php
include("includes/init.php");

// GET ID FOR INSTANCE OF SONG
$song_id = htmlspecialchars($_GET['id']);

// GET INSTANCE OF URL
$url = "/upload/information?" . http_build_query(array('id' => $song_id));

// INSTANTIATING EDITING VARIABLES
$edit_allowed = False;
$edit_toggle = False;

if (is_user_logged_in()){
    $edit_allowed = True;
}else{
    $edit_allowed = False;
}

// IS EDITING TOGGLE SCREEN ACTIVE
if (isset($_GET['edit'])){
    $edit_toggle = True;

    $song_id = (int)trim($_GET['edit']);
}

// FIND THE RECORD OF THE SONG
if ($song_id){

    // query DB
    $result= exec_sql_query($db, "SELECT * FROM songs WHERE id = :id;", array(':id' => $song_id));
    $records = $result->fetchAll();

    if (count($records) > 0){
        // GET ID FROM QUERY RESULT
        $SONG = $records[0];
    }else{
        $SONG = NULL;

    }

}

// IF song result is valid
if ($SONG){
    // CHECK PERMISSION OF SONG

    // did someone edit song?
    if (isset($_POST['save'])){
        $title = trim($_POST['title']);
        $artist = trim($_POST['artist']);
        $source = trim($_POST['source']);

    //
    }
    // if the title is not null, update it
    if (!empty($title)){
        exec_sql_query($db, "UPDATE songs SET title = :title, artist = :artist, source = :source WHERE (id = :current_id);",
        array(
            ':current_id' => $song_id,
            ':title' => $title,
            ':artist' => $artist,
            ':source' => $source
        ));

        // retrieve updated song information
        $result = exec_sql_query($db, "SELECT * FROM songs WHERE id = :current_id;",
        array(':current_id' => $song_id)
        );
        $records = $result->fetchAll();
        $SONG = $records[0];

    }
}


// ---------------DELETE TAG -------------------------------------------------

// get the id of the tag from the URL
$tagID = $_GET['tag'];
$songID = $_GET['id'];
$action = $_GET['action'];

if ($action == 'delete-tag'){
    $delete_tag_sql = "DELETE FROM song_tags WHERE tag_id = :tag_id AND song_id = :song_id;";
    $delete_tag_params = array(
        ':tag_id' => $tagID,
        ':song_id' => $songID
    );
    $delete_tags = exec_sql_query($db, $delete_tag_sql, $delete_tag_params);
}
// // GET INFORMATION ABOUT SONG
// $sql_query = "SELECT * FROM songs WHERE (id = :current_id);";
// $params = array(':current_id' => $song_id);
// $result = exec_sql_query($db, $sql_query, $params);
// $records = $result->fetchAll();

// title and artist for styling in header
foreach($records as $record){
    $header_home = $record['title'];
    $header_par = $record['artist'];

}

// URLS
$title = htmlspecialchars($SONG['title']);
$info_url = "/upload/information?" . http_build_query(array('id' => $SONG['id']));
$edit_url = "/upload/information?" . http_build_query(array('edit' => $SONG['id']));

// $delete_url = '/upload/information?' . http_build_query(array('delete-tag', 'id'=> $SONG['id'], 'tag_id'=>$));
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="/public/styles/site.css"/>

  <title><?php echo $title; ?> - StudySounds</title>
</head>

<?php include("includes/header.php");?>

<body>

    <?php if ($edit_toggle){?> <!-- IF EDIT IS TOGGLED ------------------------------------------>

        <section class="section5">

            <form class="edit-form" action="<?php echo $info_url;?>" method ="post" novalidate>
            <div class="info-box">
                <label>Image:
                    <img src="/public/uploads/songs/<?php echo $record['id'] . '.' . $record['img_ext'];?>" alt="cover art for <?php echo htmlspecialchars($record['title']);?>">
                </label>
                <div class="form-edit-section">
                    <label>Title:
                        <input type="text" name="title" value="<?php echo htmlspecialchars($record['title']);?>">
                    </label>
                    <label>Artist:
                        <input type="text" name="artist" value ="<?php echo htmlspecialchars($record['artist']);?>">
                    </label>
                    <label>Source:
                        <textarea name="source" cols="30" rows="2">"<?php echo htmlspecialchars($record['source']);?>"</textarea>
                    </label>
                    <button type="submit" name="save">Save</button>
                </div>
            </div>
            </form>
        </section>

    <?php }else{?> <!-- ELSE EDIT IS NOT TOGGLED ---------------->



        <!-- IF EDITING IS ALLOWED --------------->
        <?php if ($edit_allowed){?>
        <section class="section5">
            <div class="info-box">
                <img src="/public/uploads/songs/<?php echo $record['id'] . '.' . $record['img_ext'];?>" alt="cover art for <?php echo htmlspecialchars($record['title']);?>">
                <div class="edit-about">
                    <h2><?php echo htmlspecialchars($record['title']);?>
                        (<a href="<?php echo $edit_url;?>">Edit</a>)
                    </h2>
                    <p>Artist: <?php echo htmlspecialchars($record['artist']);?>
                        (<a href="<?php echo $edit_url;?>">Edit</a>)
                    </p>
                    <p><a href="<?php echo htmlspecialchars($record['source']);?>">Source</a></p>
                    <img src="/public/images/tag-icon.png" alt="tag icon">
                    <ul>
                    <?php
                    $id = $record['id'];
                    $id_params = array(':id' => $id);
                    $get_tags_sql = "SELECT `tags`.`tag_name`, `tags`.`id` FROM `song_tags` INNER JOIN `songs` ON `song_tags`.`song_id` = `songs`.`id` LEFT OUTER JOIN `tags` ON `tags`.id = `song_tags`.`tag_id` WHERE (`songs`.`id` = :id);";
                    $result_tags = exec_sql_query($db, $get_tags_sql, $id_params);
                    $records_tags = $result_tags->fetchAll();
                    foreach($records_tags as $tags){?>
                        <li><?php echo htmlspecialchars($tags['tag_name']);?></li>
                        <p><a href="<?php echo $info_url . '&action=delete-tag&id=' . $id . '&tag=' . $tags['id'];?>">Delete</a></p>
                    <?php
                    }?>
                    </ul>
            </div>

            </div>

        </section>
        <?php }else{?> <!-- ELSE - EDITING IS NOT ALLOWED -->


        <section class="section5">
            <div class="info-box">
            <img src="/public/uploads/songs/<?php echo $record['id'] . '.' . $record['img_ext'];?>" alt="cover art for <?php echo htmlspecialchars($record['title']);?>">
            <div class="info-about">

                <h2><?php echo htmlspecialchars($record['title']);?></h2>
                <p>Artist: <?php echo htmlspecialchars($record['artist']);?></p>
                <a href="<?php echo htmlspecialchars($record['source']);?>">Source</a>
                <img src="/public/images/tag-icon.png" alt="tag icon">
                <ul>
                    <?php
                    $id = $record['id'];
                    $id_params = array(':id' => $id);
                    $get_tags_sql = "SELECT `tags`.`tag_name` FROM `song_tags` INNER JOIN `songs` ON `song_tags`.`song_id` = `songs`.`id` LEFT OUTER JOIN `tags` ON `tags`.id = `song_tags`.`tag_id` WHERE (`songs`.`id` = :id);";
                    $result_tags = exec_sql_query($db, $get_tags_sql, $id_params);
                    $records_tags = $result_tags->fetchAll();
                    foreach($records_tags as $tags){?>
                        <li><?php echo htmlspecialchars($tags['tag_name']);?></li>
                    <?php
                    }?>
                </ul>
            </div>
            </div>

        </section>
        <?php }?> <!-- EDITING IS ALLOWED -->
    <?php }?> <!-- EDITING IS TOGGLED -->
<!--
  <section class ="section2">
    <p>words</p>
  </section>

  <section class ="section1">
    <p>words</p>
  </section> -->

</body>

<footer>
    <?php include("includes/footer.php");?>

</footer>

</html>
