<?php
include("includes/init.php");



$header_home = "Join the collaborative community and upload a go to study song.";
$header_par = "Use the upload section to load and post your favorite study songs to the catalog for others to see.";

// UPLOADING A SONG ENTRY ------------------------------------------------------

define("MAX_FILE_SIZE", 2000000);

if (is_user_logged_in()){

  // feedback classes for inputs
  $song_name_feedback_class = 'hidden';
  $song_artist_feedback_class = 'hidden';
  $song_file_feedback_class = 'hidden';

  // instantiating upload variables
  $song_title = NULL;
  $song_artist = NULL;
  $song_source = NULL;
  $song_filename = NULL;
  $song_ext = NULL;

  // sticky values
  $sticky_title = '';
  $sticky_artist = '';
  $sticky_source = '';

  if (isset($_POST['submit'])){
    $song_title = ucfirst(trim($_POST['song_name']));
    $song_artist = ucfirst(trim($_POST['artist']));
    $song_source = trim($_POST['link']);
    $song_upload = $_FILES['new-file'];

    $form_valid = True;

    if ($song_upload['error'] == UPLOAD_ERR_OK) {
      $song_filename = basename($song_upload['name']);
      $song_ext = strtolower( pathinfo($song_filename, PATHINFO_EXTENSION) );

    }else{
      $form_valid = False;

    }

    // title of song is required
    if ( empty($song_title)){
      $form_valid = False;
      $song_name_feedback_class = '';
    }
    // artist is required
    if ( empty($song_artist)){
      $form_valid = False;
      $song_name_feedback_class = '';
    }
    // source is required
    if ( empty($song_source)){
      $song_source = NULL;
    }

    if ($form_valid){
      $db->beginTransaction();
      $insert_query = "INSERT INTO songs (title, artist, img_ext, source, user_id) VALUES (:title, :artist, :img_ext, :source, :user_id);";
      $insert_params = array(
        ':title' => $song_title,
        ':artist' => $song_artist,
        ':img_ext' => $song_ext,
        ':source' => $song_source,
        ':user_id' => $current_user['id']

      );
      $result = exec_sql_query($db, $insert_query, $insert_params);

      if ($result){
        $recent_id = $db->lastInsertId('id');

        $new_path = 'public/uploads/songs/' . $recent_id . '.' . $song_ext;
        move_uploaded_file( $song_upload["tmp_name"], $new_path);
        $upload_success = True;
      }
      $db->commit();

    } else{
      $song_file_feedback_class = '';

      $sticky_title = $song_title;
      $sticky_artist = $song_artist;
      $sticky_source = $song_source;
      $upload_sucess = False;
    }
  }
}

// Deleting Song Entry -----------------------------------------------------
$get_songlist = "SELECT * FROM songs;";
$result_songlist = exec_sql_query($db, $get_songlist);
$delete_success = False;

if ($result_songlist){
  $song_list = $result_songlist->fetchAll();
}

if(isset($_GET['delete-submit']) && is_user_logged_in()){
  $song_title = $_GET['delete-select'];
  if ($song_title){
    $get_songid = "SELECT id FROM songs WHERE songs.title = :title;";
    $get_imgext = "SELECT img_ext FROM songs WHERE songs.title = :title;";
    $get_songparams = array(':title' => $song_title);
    $result_getid = exec_sql_query($db, $get_songid, $get_songparams)->fetchAll();
    $result_getext = exec_sql_query($db, $get_imgext, $get_songparams)->fetchAll();
    $song_id = $result_getid[0]['id'];
    $extension = $result_getext[0]['img_ext'];
  }
  $file = "/public/uploads/songs/" . $song_id . '.' . $extension;

  $delete_sql = "DELETE FROM songs WHERE songs.id = :song_id;";
  $delete_params = array(':song_id'=>$song_id);
  $delete_result = exec_sql_query($db, $delete_sql, $delete_params);

  if ($delete_result){
    $delete_sql2 = "DELETE FROM song_tags WHERE song_tags.song_id = :song_id;";
    $delete_params = array(':song_id'=>$song_id);
    $delete_result2 = exec_sql_query($db, $delete_sql2, $delete_params);
    if ($delete_result2){
      unlink($file);
      $delete_success = True;
    }

  }
}

// Deleting Tag ------------------------------------------------------------------------------







?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="/public/styles/site.css"/>

  <title>StudySounds</title>
</head>

<?php include("includes/header.php");?>

<body>
<?php if (is_user_logged_in()){ ?> <!-- -----USER LOGGED IN -------------->
  <section class="section1">

    <!----------------------------------- FORM: UPLOAD NEW SONG ----------------------------------------------------------->
    <h2>Upload New Song Entry</h2>

    <form action="/upload" method="POST" enctype="multipart/form-data">

      <!-- Song Name -->
      <div class="form-elm-upload">
        <label for="song_name">Song Name: </label>
        <input type="text" name="song_name" id="song_name" value = '<?php echo htmlspecialchars($sticky_title);?>'>
        <div class="feedback <?php echo $song_name_feedback_class;?>">Please provide a new song name.</div>
      </div>

      <!-- Artist -->
      <div class="form-elm-upload">
        <label for="artist">Artist: </label>
        <input type="text" name="artist" id="artist" value="<?php echo htmlspecialchars($sticky_artist);?>">
        <div class="feedback <?php echo $song_artist_feedback_class;?>">Please provide an artist.</div>
      </div>

      <!-- ALBUM ART IMAGE -->

      <div class="form-elm-upload-img">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>">
        <label for="new-file">Image: </label>
        <input type='file' name="new-file" id="new-file" required>
        <div class="feedback <?php echo $song_file_feedback_class;?>">Please provide a file.</div>
      </div>

      <!-- Source -->
      <div class="form-elm-upload">
        <label for="link">Source URL: </label>
        <input type="text" name="link" id="link" value="<?php echo htmlspecialchars($sticky_source);?>">
      </div>

      <?php if ($upload_success){?>
      <p>You have successfully uploaded <?php echo htmlspecialchars($song_title);?>!</p>
      <?php }?>

      <!-- Submit Button -->
      <div class='submit_button'>
          <input id="button" type='submit' value ="Enter" name ='submit'>
      </div>



    </form>

  <?php }else{?>
    <section class='section1'>
      <?php echo_login_form("/upload", $session_messages); ?>
    </section>

    <?php } ?>



  </section>

  <section class ="section2">
    <h2>Deleting Entries</h2>
    <p>The catalog supports deletion of entries and deletion of tags, <em>only</em> if you are a user. If you are logged in to your account, you may delete any of the existing songs, as well as delete tags from any of the existing songs in the information page. StudySound's state of the art song catalog affords a variety of functionality. Feel free to play around with the features to find the best assortment of songs to suit your studying needs! </p>
    <div class="option-flex">

    <!-- ---------------DELETING EXISTING SONG -------------------------->
    <?php if (is_user_logged_in()){?>
      <div class="upload-section">
        <form action="/upload" method="GET">
          <label><em>Delete a Song:</em></label>
            <select name="delete-select" >
              <option></option>
              <?php
              foreach($song_list as $song){
                ?>
                <option value="<?php echo $song['title'];?>"><?php echo $song['title'];?></option>
                <?php }?>
            </select>
            <div class="delete-submit-button">
              <button name="delete-submit">Delete</button>
            </div>
          </form>
          <?php if ($delete_success){?>
            <p>You have successfully deleted a song!</p>
          <?php }?>
      </div>


      <!------------- DELETING EXISTING TAG --------------------------->
    </div>

    <?php }else{?>

         <?php }?>
  </section>

  <section class ="section3">
  <div class ="catalog">
      <?php

      // show ALL RECORDS OF CATALOG
      $result = exec_sql_query($db, "SELECT * from `songs` ORDER BY `title` ASC;");
      $records = $result->fetchAll();


      // shoe ALL TAGS for each song
      $get_tags_sql = "SELECT `tags`.`tag_name` FROM `song_tags` INNER JOIN `songs` ON `song_tags`.`song_id` = `songs`.`id` LEFT OUTER JOIN `tags` ON `tags`.id = `song_tags`.`tag_id` WHERE (`songs`.`id` = :id);";

      // if records > 0, display all
      if (count($records) > 0 ) { ?>
        <h2>Study Song Catalog</h2>
        <ul>
          <?php
          foreach($records as $record) {?>
            <li>
              <a href="/upload/information?<?php echo http_build_query(array('id'=>$record['id']));?>">
              <p><em><?php echo htmlspecialchars($record['title']); ?></em></p>
              <img src="/public/uploads/songs/<?php echo $record['id'] . '.' . $record['img_ext'];?>" alt="<?php echo htmlspecialchars($record['img_ext']); ?>">
              </a>
              <table>
                <tr>
                  <th><img src="/public/images/tag-icon.png" alt="tag icon"></th>
                </tr>
                <tr>
                  <?php
                  $id = $record['id'];
                  $id_params = array(':id' => $id);
                  $result_tags = exec_sql_query($db, $get_tags_sql, $id_params);
                  $records_tags = $result_tags->fetchAll();
                  foreach($records_tags as $tags){?>
                  <td><?php echo htmlspecialchars($tags['tag_name']);?>, <br></td>
                  <?php
                  }?>
                </tr>
              </table>
            </li>
            <hr>
          <?php
          } ?>
        </ul>

      <?php
      } ?>
    </div>
  </section>
</body>

<footer>
  <?php include("includes/footer.php");?>

</footer>

</html>
