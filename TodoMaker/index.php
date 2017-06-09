<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Todo Maker </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="mainWrapper">
      <a href="index.php" class="brand"> Todo Maker </a>
      <div id="td_container" class="clearfix">
        <div id="sidebar">
          <ul class="list-group">
            <li class="list-group-item"><a href="#">Inbox</a></li>
            <li class="list-group-item"><a href="#">Read Later</a></li>
            <li class="list-group-item"><a href="#">Important</a></li>
          </ul>
        </div>
      
        <div id="mainContent" class="clearfix">
          <div id="head">
            <h2>Manage Todo</h2>
            <div id="add_more">
              <a href="add_new.php" class="btn btn-success">+ Add New </a>
            </div>
          </div>
          <div id="mainBody">
            <table class="table table-striped">
              <thead>
                <tr>
                  <td>Title</td>
                  <td>Snippet</td>
                  <td>Due Date</td>
                  <td>Time Left</td>
                  <td>Progress</td>
                  <td>Actions</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Todo</td>
                  <td>Should complete it</td>
                  <td>2017-05-15</td>
                  <td>18 hours</td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                        <span class="sr-only">40% Complete (success)</span>
                      </div>
                    </div>
                  </td>
                  <td> edit|delete </td>
                </tr>
              <tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
