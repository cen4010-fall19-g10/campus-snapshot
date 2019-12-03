
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Campus Snapshot</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="incidents.php">Feed</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="create.php">Create an Incident</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-md-0" method="get" action="search_results.php">
          <input class="form-control" name="search" type="text" placeholder="Search">
        </form>
      </div>
    </nav>
