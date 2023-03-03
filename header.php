<?php
?>
<nav class="navbar bg-dark navbar-dark navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="?">RegUni</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="?activities">Attività Didattiche</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?units">Unità Formative</a>
        </li>
      </ul>
      <button type="button" class="btn btn-light" id="loginButton">Accedi</button>
    </div>
  </div>
</nav>
<script>
  var loginButton = document.querySelector("#loginButton");
  loginButton.addEventListener("click", function() {
    window.location.href = "?login";
  });
</script>