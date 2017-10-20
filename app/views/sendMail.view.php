<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="public/ckeditor/ckeditor.js"></script>
  <title>Server</title>
</head>
<body>
  <form action="send-mail" method="post" enctype="multipart/form-data">
    <div>
      <label for="Fullname">Fullname</label>
      <input type="text" name="fullname" placeholder="Enter fullname" required>
    </div>

    <div>
      <label for="email">Email</label>
      <input type="email" name="email" placeholder="Enter email" required>
    </div>

    <div>
      <label for="Subject">Subject</label>
      <input type="text" name="subject" placeholder="Enter subject" required>    </div>
    <div>
      <label for="CC">CC</label>
      <input type="text" name="cc" placeholder="Enter cc">
    </div>

    <div>
      <label for="BCC">BCC</label>
      <input type="text" name="bcc" placeholder="Enter bcc">
    </div>

    <div style="width:800px;">
      <label for="Content">Content</label>
      <textarea name="content"  class="ckeditor"></textarea>
    </div>

    <div>
      <label for="File">File</label>
      <input type="file" name="file" >
    </div>

    <div>
      <input type="submit" value="Submit">    
    </div>
  </form>
</body>
</html>