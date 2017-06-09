<?php
  include_once('statics/header.php');

?>
<div id="mainContent" class="moveContent">
  <div id="head">
    <h2>Create Todo </h2>
  </head>
  <div id="mainBody">
    <div class="form_field">
      <label for="Title">Title</label> <br>
      <input type="text" name="title" id="title"/>
    </div>
    <div class="form_field">
      <label for="Description">Description</label> <br>
      <textarea type="text" name="description" id="description"></textarea>
    </div>
    <div class="form_field">
      <label for="Due Date">Due Date</label> <br>
      <input type="text" name="due_date" id="due_date"/>
    </div>
    <div class="form_field">
      <label for="Label Under">Label Under</label> <br>
      <select type="text" name="label_under" id="label_under">
        <option value="Select">Select</option>
        <option value="Inbox">Inbox</option>
        <option value="Read Later">Read Later</option>
        <option value="Important">Important</option>
      </select>
    </div>
    <div class="form_field">
      <input type="submit" name="create_todo" value="Create" id="create_todo" class="btn btn-info"/>
    </div>
  </div>
</div>
