<header>
  <div class="header-content">
    <img src="/public/images/music-icon.png" alt="MusicIcon">
     <!-- Source: https://thenounproject.com/term/music/928/ -->
    <h1><a href="/">StudySounds</a></h1>
    <nav>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/upload">Upload</a></li>
          <?php if (is_user_logged_in()) {
            $logout_url = htmlspecialchars($_SERVER['PHP_SELF']) . '?' . http_build_query(array('logout' => ''));echo  '<li id="nav-logout"><a href="'. $logout_url . '">Log Out</a></li>';

          }?>
        </ul>
      </nav>
    </div>


  <div class="header-sect">
    <h1><?php echo $header_home;?></h1>
    <p><?php echo $header_par; ?></p>
    <!-- Source: https://www.chillcarrier.de/ -->
    <p><cite><a href="https://www.chillcarrier.de/">Chill Carrier</a></cite></p>
  </div>

</header>
