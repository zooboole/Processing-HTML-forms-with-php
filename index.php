<html>
  <head>
    <title>Processing forms with php</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Enquiries: contact us</h1>
    <form id="ct" action="processor.php" method="post">
      <label for="name">Name</label>
      <input type="TEXT" name="name" id='name' value="">

      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" value="">

      <label for="message">Message</label>
      <textarea name="message" id="message" rows="8" cols="40"></textarea>
    </form>
  </body>
</html>
