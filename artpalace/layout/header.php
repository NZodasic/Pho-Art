<?php
$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);

}
?>
    <header style="overflow: hidden;">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <div class="PArt">
              P.Art
            </div>
            <div class="d-inline-flex ">
              <button class="navbar-toggler bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
            <div class=" navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"> 
                  <a class="navref" aria-current="page" href="index.php">Home</a>
                </li>
                <!--Wrap usermenu just for fuckin responsive-->
                <li class="nav-item resuser">
                    <a class="text-decoration-none usertitle" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      User
                    </a>
                    <!--Submenu-->
                  <div class="collapse text-dark wrapmenures container-fluid" id="collapseExample">
                    <!--Wrap Main-->
                    <div class="submenu1">
                      <!--Profile-->
                      <a id="ressub" href="../chat-app/users.php" class="submenulink">
                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="currentcolor " class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                          <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                        </svg>
                        <p>Message</p>
                      </a>
                      <!--Help-->
                      <a id="helpitem" href="#profile" class="submenulink helpitem1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" fill="currentColor"
                          class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                        </svg>
                        <p>Help & Support</p>
                      </a>
                    </div>
                    <!--Help menu-->
                    <div class="helpmenu1">
                      <!--title-->
                      <div class="title backhelp1">
                        <svg class="d-inline-block position-sticky" style="margin-bottom: 10px; float: inline-start;" xmlns="http://www.w3.org/2000/svg" width="30"
                          height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                        <h3 class="d-inline-block position-sticky"
                          style="margin-top: 10px; margin-left: 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                          Help & Support</h3>
                      </div>
                    </div>
                  </div>
                </li>

                <li class="nav-item">
                  <a class="navref"  aria-current="page" href="http://localhost/php-music/?page=music_list">Music</a>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_SESSION['fullname'])){
                        ?>
                        
                  <a class="navref" aria-current="page" href="index.php?page=yourorder">
                    Ordered
                  </a>
                        <?php
                    }else{
                        ?>
                            <div style="opacity: 0.7; cursor: default;">Ordered</div>
                        <?php
                    }
                ?>
                </li>
              </ul>
              <form action="" method="GET"  class="d-flex " role="search">
                <input class="form-control me-2 searchbar" type="search" placeholder="Search" aria-label="Search">
                <button class="bt btn-outline-success" type="submit">Search</button>
              </form>
              <div class="usersavt">
                <img class="avt" src="layout/avatar.jpg" alt="avt" onclick="togglemenu()">
              </div>
            </div>
          </div>
        </nav>
        <!--Submenu-->
        <div id="submenu" class="submenuwrap">
          <div class="submenu">
            <!--username-->
            <div class="userinfo">
              <h2>
              <?php
            if (isset($_SESSION['fullname'])) {
                $name = $_SESSION['fullname'];

                ?>
                <div style="display: flex; padding: 10px;">
                        <h4 style="padding-right: 5px;"></h4>

                        <form action="index.php?page=logout" method="post">
                            <button class="logout-but" type="submit"><?php echo ucfirst($name) ?>
                            </button>
                        </form>
                    </div>
                <?php

} else {
    ?>

        <div class="login">
            <a href="index.php?page=login"><i class="fa fa-user"></i></a>
        </div>
    <?php
}
?>
              </h2>
            </div>
            <hr>
            <!--Chatbox-->
            <a href="#profile" class="submenulink">
              <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="currentcolor " class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
              </svg>
              <p>Message</p>
            </a>

          </div>
    
          <!--Settings menu-->
          <div class="settingmenu">
            <!--title-->
            <div class="title">
              <svg class="d-inline-block backset" style="margin-bottom: 10px;" xmlns="http://www.w3.org/2000/svg" width="30"
                height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
              </svg>
              <h3 class="d-inline-block"
                style="margin-top: 10px; margin-left: 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Settings & Privacy</h3>
            </div>
            <!--Password-->
            <a href="#profile" class="submenulink">
              <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" fill="currentColor" class="bi bi-shield-lock"
                viewBox="0 0 16 16">
                <path
                  d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                <path
                  d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
              </svg>
              <p>Password & Information</p>
            </a>
            <!--Activity-->
            <a href="#profile" class="submenulink">
              <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" fill="currentColor" class="bi bi-activity"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
              </svg>
              <p>Activity</p>
            </a>
            <!--Lock-->
            <a href="#profile" class="submenulink">
              <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" fill="currentColor" class="bi bi-house-lock"
                viewBox="0 0 16 16">
                <path
                  d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z" />
                <path
                  d="M10 13a1 1 0 0 1 1-1v-1a2 2 0 0 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
              </svg>
              <p>Lock</p>
            </a>
            <!--license-->
            <a href="#profile" class="submenulink">
              <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" fill="currentColor" class="bi bi-card-list"
                viewBox="0 0 16 16">
                <path
                  d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                <path
                  d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
              </svg>
              <p>License</p>
            </a>
          </div>
    
          <!--Help menu-->
          <div class="helpmenu ">
            <!--title-->
            <div class="title backhelp">
              <svg class="d-inline-block" style="margin-bottom: 10px;" xmlns="http://www.w3.org/2000/svg" width="30"
                height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
              </svg>
              <h3 class="d-inline-block"
                style="margin-top: 10px; margin-left: 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Help & Support</h3>
            </div>
            <!--Report Problem-->
            <a href="#profile" class="submenulink reportprob">
              <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" fill="currentColor"
                class="bi bi-exclamation-square" viewBox="0 0 16 16">
                <path
                  d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path
                  d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
              </svg>
              <p>Report Problem</p>
            </a>
          </div>
        </div>
        </div>
        <div class="container-fluid">
          <!--Report Form-->
          <div class="container-fluid reportform">
            <div class="rpmenu">
              <!--Reportmenu title-->
              <div class="rptitle">
                <div class="rpmenulink">
                  <h3 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Give Feedback to P.ART</h3>
                  <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor"
                    class="bi bi-x-circle-fill close float-end" viewBox="0 0 16 16">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                  </svg>
                </div>
              </div>
              <hr>
              <!--Report menucontent-->
              <div class="rpmenumain">
                <!--Section 1-->
                <a href="#profile" class="rpmenucontent improve">
                  <!--Logo P.ART-->
                  <div class="rplogo">
                    <p class="rpcontent">P.ART</p>
                  </div>
                  <!--Sectioncontent-->
                  <div class="rpsection">
                    <h5>
                      Help us improve P.ART
                    </h5>
                    <h6>
                      Give feedback about your P.ART experience.
                    </h6>
                  </div>
                </a>
                <!--Section-->
                <a href="#profile" class="rpmenucontent prob" style="margin-top: 15px;">
                  <div class="rplogo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                      class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                      <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                  </div>
                  <!--Sectioncontent-->
                  <div class="rpsection">
                    <h5>
                      Something went wrong!
                    </h5>
                    <h6>
                      Let us know about a broken feature.
                    </h6>
                  </div>
                </a>
              </div>
            </div>
    
            <!--improveform-->
            <div class="improveform container-fluid">
              <!--title-->
              <div class="rptitle">
                <div class="rpmenulink">
                  <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor"
                    class="bi bi-arrow-left backrp1 backimprove float-start" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                  </svg>
                  <h3 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Help Us Improve P.ART</h3>
                  <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor"
                    class="bi bi-x-circle-fill close float-end" viewBox="0 0 16 16">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                  </svg>
                </div>
              </div>
              <hr>
              <!--form-->
              <div class="form">
                <form action="">
                  <!--area of problem-->
                  <div class="problemarea">
                    <h3 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">In which areas can P.ART
                      improve?</h3>
                    <input type="text" class="area" placeholder="Type an area">
                  </div>
                  <!--detail-->
                  <div class="detailinput">
                    <p>Details</p>
                    <textarea cols="30" rows="100" class="detail"
                      placeholder="Include as much detail as possible."></textarea>
                  </div>
                  <hr>
                  <!--submit-->
                  <div class="submit">
                    <p class="infor">
                      Let us know if you have ideas that can help make our products better.
                    </p>
                    <div class="buttons">
                      <!--submit button-->
                      <input type="submit" class="submitbtn">
                    </div>
                  </div>
                </form>
              </div>
            </div>
    
            <!--Problem form-->
            <div class="problemform">
              <!--title-->
              <div class="rptitle">
                <div class="rpmenulink">
                  <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor"
                    class="bi bi-arrow-left backrp1 backprob" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                  </svg>
                  <h3 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Something went wrong!</h3>
                  <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor"
                    class="bi bi-x-circle-fill close" viewBox="0 0 16 16">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                  </svg>
                </div>
              </div>
              <hr>
              <!--form-->
              <div class="form">
                <form action="">
                  <!--area of problem-->
                  <div class="problemarea">
                    <h3 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">In which areas can P.ART
                      improve?</h3>
                    <input type="text" class="area" placeholder="Type an area">
                  </div>
                  <!--detail-->
                  <div class="detailinput">
                    <p>Details</p>
                    <textarea cols="30" rows="100" class="detail"
                      placeholder="Include as much detail as possible."></textarea>
                  </div>
                  <hr>
                  <!--submit-->
                  <div class="submit">
                    <p class="infor">
                      Let us know if you have ideas that can help make our products better.
                    </p>
                    <div class="buttons">
                      <!--submit button-->
                      <input type="submit" class="submitbtn">
                    </div>
                  </div>
                </form>              
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="background">

      </div>