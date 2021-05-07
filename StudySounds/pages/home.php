<?php
include("includes/init.php");

$header_home = "Dive into the music and sounds for all your studying needs.";
$header_par = "Upload, tag and search amongst the best study song titles, artists and albums.";




$sql_has_filter = False;


// -------- FILTERING BY TAG ----------------------------------------------

// getting active list of tags
$get_taglist = "SELECT DISTINCT tag_name from tags;";
$result_taglist = exec_sql_query($db, $get_taglist);

if ($result_taglist){
  $taglist = $result_taglist->fetchAll();
}

// if filter submit button is clicked
if (isset($_GET['filter'])){
  $sql_has_filter = True;
  $filter_tag = $_GET['filter-tag'];

  // // GET tag_ids
  // $id_sql = "SELECT tags.id FROM tags WHERE tags.tag_name = :tag;";
  // $id_params = array(':tag' => $filter_tag);
  // $id_result = exec_sql_query($db, $id_sql, $id_params);
  // if ($id_result){
  //   $id_records = $id_result->fetchAll();
  // }
}

// filter query modification
if ($sql_has_filter){
  $sql_query = "SELECT songs.id, songs.title, songs.artist, songs.img_ext FROM songs INNER JOIN song_tags ON songs.id = song_tags.song_id INNER JOIN tags ON song_tags.tag_id = tags.id WHERE (tags.tag_name  LIKE '%' || :filter_param || '%');";
  $params = array(':filter_param' => $filter_tag);
  // $result = exec_sql_query($db, $sql_query, $params);
  // $records = $result->fetchAll();

}else{
  $sql_query = "SELECT * from `songs` ORDER BY `title` ASC;";
  // $result = exec_sql_query($db, $sql_query);
  // $records = $result->fetchAll();
}

// -------------CREATING A TAG ----------------------------------------------

$tag_feedback_class = 'hidden';
$sticky_tag_name = '';
$new_tag_success = False;


if (isset($_POST['create'])){
  $new_tag = ucfirst($_POST['create-tag']);
  $form_valid = True;

  // query DB to see if already exists
  $valid_records = exec_sql_query($db, "SELECT * FROM tags WHERE (tag_name = :new_tag);",
  array(':new_tag' => $new_tag));
  $valid = $valid_records->fetchAll();

  if (count($valid) > 0){
    $form_valid = False;
    $tag_feedback_class = '';
  }

  if ($form_valid){
    $insert_new_tag = exec_sql_query($db, "INSERT INTO tags (tag_name) VALUES (:new_tag);",
    array(':new_tag' => $new_tag));
    $new_tag_success = True;

  } else{
    $sticky_tag_name = $new_tag;
  }
}

// ----------TAGGING AN EXISTING ENTRY ------------------------------------------------

//getting songlist
$get_songlist = "SELECT DISTINCT id, title FROM songs;";
$result_songlist = exec_sql_query($db, $get_songlist);
$has_tagged = False;

if ($result_songlist){
  $songlist = $result_songlist->fetchAll();
}

// if user tagged image, and selected option from tags list and song list
if (isset($_GET['tag-entry']) and isset($_GET['list-songs']) and isset($_GET['list-tags'])){
  $for_song_name = $_GET['list-songs'];
  $for_tag_name = $_GET['list-tags'];

  // GET SONG ID
  $song_records = exec_sql_query($db, "SELECT id FROM songs WHERE (title = :song_name);",
  array(':song_name' => $for_song_name))->fetchAll();
  $song_id = $song_records[0]['id'];

  // GET TAG ID
  $tag_records = exec_sql_query($db, "SELECT id FROM tags WHERE (tag_name = :ex_tag);",
  array(':ex_tag' => $for_tag_name))->fetchAll();
  $for_tag_id = $tag_records[0]['id'];


  $tag_sql = "INSERT INTO song_tags (song_id, tag_id) VALUES (:songID, :tagID);";
  $tag_params = array(
    ':songID' => $song_id,
    ':tagID' => $for_tag_id
  );
  $tag_result = exec_sql_query($db, $tag_sql, $tag_params);
  $has_tagged = True;


}


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
  <section class="section1">
    <div class="section-top">
      <h2>You can do it all with StudySound!</h2>
      <p>Upload, tag, edit and filter through the best study songs in the catalog. Discover new titles every time you visit! </p>

    </div>

    <div class="internal-flex">
      <div class = "section-flex">
        <img src="/public/images/upload-icon.png" alt="upload icon">
        <!-- Source: https://thenounproject.com/term/music/928/-->
        <h3>Upload</h3>
        <p>Upload your tracks to the catalog safely. We ensure that your sensitive files are loaded and displayed.</p>
      </div>
      <div class = "section-flex">
        <img src="/public/images/tag-icon.png" alt="tag icon">
        <!-- Source: https://www.iconfinder.com/icons/115791/tag_icon -->
        <h3>Tag</h3>
        <p>You can tag tracks with one or more genre tags to further focus your song search.</p>
      </div>
      <div class="section-flex">
        <img src="/public/images/edit-icon.png" alt="edit icon">
        <!-- Source: https://www.iconfinder.com/icons/383147/edit_icon -->
        <h3>Edit</h3>
        <p>Don't forget that you can edit current song entries, and tags within the catalog.</p>
      </div>
    </div>



  </section>

  <!------------------ SECTION 2 ------------------------------------------>

  <section class ="section2">
    <h2>Tagging & Filtering</h2>
    <p>The catalog supports filtering by the selection of tags. You may also create a tag, tag an existing entry, delete a tag, and remove a tag from an existing entry. StudySound's state of the art song catalog affords a variety of functionality. Feel free to play around with the features to find the best assortment of songs to suit your studying needs! </p>
    <div class = "option-flex">

      <!-- -------- FILTERING BY TAG ------------->
      <div class = "option-section">
        <form action="/" method="GET">
          <!-- Label -->
          <label for="filter-tag"><em>Filter By Tag:</em> </label>
          <select name="filter-tag" id="filter-tag">
            <option></option>
            <?php
            foreach($taglist as $tag){?>
              <option value="<?php echo $tag['tag_name'];?>"><?php echo $tag['tag_name'];?></option>
            <?php
            }
            ?>
          </select>
          <div class ="filter-submit">
            <button name="filter" type="submit">Filter</button>
          </div>
        </form>
      </div>

      <!--- -------- CREATING A TAG ------------------>
      <div class = "option-section">
        <form action="/" method="POST">
        <label for="create-tag"><em>Create a Tag:</em></label>
        <input type="text" name="create-tag" id="create-tag" value ="<?php echo htmlspecialchars($sticky_tag_name);?>">
        <div class="filter-submit">
          <button name="create" type="submit">Create</button>
        </div>
        <div class = "feedback <?php echo $tag_feedback_class;?>">
          <p>The tag you entered already exists.</p>
        </div>
      </form>
      <?php if ($new_tag_success){?>
        <p>You have successfully entered <?php echo $new_tag;?> to the Study Sound Tags.</p>
      <?php }?>
      </div>

      <!--- ------- TAGGING AN ENTRY --------------------->
      <div class = "option-section2">

        <form action="/" method ="GET">

          <div class = "list-of-songs">
            <label for="list-songs"><em>Song List:</em></label>
            <select name="list-songs" id="list-songs">
              <option></option>
              <?php
              foreach($songlist as $song){
                ?>
                <option value="<?php echo $song['title'];?>"><?php echo $song['title'];?></option>
              <?php }?>
            </select>
          </div>

        <div class='list-of-tags'>
          <label for ="list-tags"><em>Tag List:</em> </label>
          <select name="list-tags" id="list-tags">
            <option></option>
            <?php
            foreach($taglist as $tag){
              ?>
              <option value="<?php echo $tag['tag_name'];?>"><?php echo $tag['tag_name'];?></option>
            <?php }?>
          </select>
        </div>

        <div class ="tag-image">
          <button name="tag-entry">Tag</button>
        </div>

        </form>

        <?php if ($has_tagged){?>
        <p>You have successfully added "<?php echo $for_tag_name;?>" to <?php echo $for_song_name;?>.</p>
        <?php }?>

      </div>






    </div>
  </section>



  <!-------------------------- SECTION 3 --------------------------------->

  <section class ="section3">
    <div class ="catalog">
      <?php

      // show ALL RECORDS OF CATALOG

      $result = exec_sql_query($db, $sql_query, $params);
      $records = $result->fetchAll();

      // shoe ALL TAGS for each song
      $get_tags_sql = "SELECT `tags`.`tag_name` FROM `song_tags` INNER JOIN `songs` ON `song_tags`.`song_id` = `songs`.`id` LEFT OUTER JOIN `tags` ON `tags`.id = `song_tags`.`tag_id` WHERE (`songs`.`id` = :id);";

      // if records > 0, display all
      if (count($records) > 0 ) { ?>
        <h2>Study Song Catalog</h2>
        <ul>
          <?php
          foreach($records as $record) {?>
            <div class = 'home-catalog'>
              <li>
                <div class="catalog-sect">
                  <p><em><?php echo htmlspecialchars($record['title']); ?></em></p>
                  <p><?php echo htmlspecialchars($record['artist']); ?></p>

                  <img src="/public/uploads/songs/<?php echo $record['id'] . '.' .  $record['img_ext']; ?>" alt="<?php echo htmlspecialchars($record['img_ext']); ?>">
                </div>
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
                    <td><?php echo htmlspecialchars($tags['tag_name']);?>,</td>
                    <?php
                    }?>
                  </tr>
                </table>
              </li>
            </div>
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
