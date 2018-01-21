  <div id="id02" class="modal">
    <div class="modal-content card-4 animate-top">
      <header class="container theme-light">
        <span onclick="document.getElementById('id02').style.display='none'" class="fa fa-times xlarge margin-top button theme"></span>
        <div class="center">
          <h4 class="xlarge">Contact Me</h4>
        </div>
        <div class="display-topright padding">
          <img class="animate-opacity" src="images/logo.png" style="margin:auto;">
        </div>
      </header>
      <form class="container card-4" action="mailto:haf16002@byui.edu" method="post" enctype="text/plain">
        <div class="section">
          <input class="input" type="text" required>
          <label class="text-theme">Name</label>
        </div>
        <div class="section">
          <input class="input" type="email" required>
          <label class="text-theme">Email</label>
        </div>
        <div class="section">
          <input class="input" type="text" required>
          <label class="text-theme">Subject</label>
        </div>
        <div class="section">
          <input class="input" type="text"  required>
          <label class="text-theme">Message</label>
        </div>
        <div class="section">
          <input class="btn left text-theme" type="submit" value="Send">
          <input class="btn right text-theme" type="reset" value="Cancel" onclick="document.getElementById('id02').style.display='none'">
        </div>
      </form>
      <footer class="container theme-light padding-24">
        <p></p>
      </footer>
    </div>
  </div>