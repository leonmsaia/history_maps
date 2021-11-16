<div class="topbar">
  <div class="logo"><a href="#" title="">History Maps</a></div>
  <a class="sidemenu-btn waves-effect waves-light" href="#" title=""><i class="ti-menu"></i></a>

  <?php if ($this->ion_auth->logged_in()): ?>
    <div class="topbar-links">

      <div class="notification">
        <a class="click-btn" href="#" title=""><i class="ti-bell"></i> <span>2</span></a>
        <div class="notification-dropdown z-depth-2">
          <div class="notification-top">
            <ul class="tabs">
              <li class="tab">
                <a class="active" href="#notification"><i class="ti-world"></i></a>
              </li>
            </ul>
          </div>
          <div class="notification-bottom">
            <div id="notification">
              <h5>You Have 10 New Notifications</h5>
              <div class="notification-inner scroll">

                <div class="notification-box">
                  <img src="http://placehold.it/48x47" alt="" />
                  <div class="notification-detail">
                    <h6 class="blue-text"><a href="mail-open.html" title="">Clarine Wassel</a></h6>
                    <span>20 mins ago</span>
                    <p><a href="mail-open.html" title="">Do you want to grab some...</a></p>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="launcher">
        <a class="click-btn" href="#" title=""><i class="ti-widget"></i></a>
        <div class="launcher-dropdown z-depth-2">
          <a href="mail.html" title="" class="launch-btn"><i class="ti-comment-alt blue-text"></i> <span>Mail Box</span></a>
          <a href="profile.html" title="" class="launch-btn"><i class="ti-user green-text"></i> <span>View Profile</span></a>
          <a href="dynamic-gallery.html" title="" class="launch-btn"><i class="ti-layers purple-text"></i> <span>Gallery</span></a>
          <a href="steps-form.html" title="" class="launch-btn"><i class="ti-panel cyan-text"></i> <span>Steps Form</span></a>
          <a href="tasks.html" title="" class="launch-btn"><i class="ti-view-list-alt red-text"></i> <span>Recent Tasks</span></a>
          <a href="<?php echo base_url();?>/User/logUserOut" title="" class="launch-btn"><i class="ti-lock orange-text"></i> <span>Sign Out</span></a>
        </div>
      </div>

    </div>
  <?php else: ?>
  <?php endif; ?>
</div>
