<?php
    // process the form here

    // Advised to put this php portion in a different file
    // and reference it in your form method

    // var_dump($_POST);
    //
    // array (size=4)
    //   'name' => string '' (length=0)
    //   'email' => string '' (length=0)
    //   'message' => string '' (length=0)
    //   'btn' => string '' (length=0)

    $errors = array();

    if( isset($_POST['btn']) )
    {
      // the form is submitted
      foreach ($_POST as $key => $info) {
        // we'll just check if the user has provided all information
        if( !empty($_POST[$key]) && trim($_POST[$key]) != '' )
        {
          $$key = htmlspecialchars($_POST[$key], ENT_QUOTES, 'utf-8');
        } else {
          if( $key !== 'btn' )
          array_push($errors, "The field ".$key." is empty");
        }
      }


      // Prepare the message

      $to = 'you@example.com';

      $subject = 'Request for information';

      $headers = "From: " . strip_tags($email) . "\r\n";
      $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      if( mail($to, $subject, $message, $headers) )
      {
        $confirm = "Your message is sent successfully.";
      } else {
        array_push($errors, "Sorry, for some rearon, your message could not be sent.");
      }
    }

?>
<!doctype html>
<html>
  <head>
    <meta name="charset" content="utf-8">
    <title>Simple contact page</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <div class="wrapper">
      <h1>Enquiries: contact us</h1>
      <form id="ct" action="index.php" method="post">
        <label for="name">Name</label>
        <input type="TEXT" name="name" id='name' value="" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="" required>

        <label for="message">Message</label>
        <textarea name="message" id="message" rows="8" cols="40" required></textarea>

        <button name="btn" type="submit" class="btn">Send message</button>
      </form>
      <!-- display errors if there are some -->
      <ul class="errors">
        <?php if(isset($errors)): ?>
          <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
          <?php endforeach ?>
        <?php endif ?>
      </ul>

      <!-- display confirmation message if message sent -->
      <?php if( isset($confirm) ):?>
        <div class="confirmation">
          <?= $confirm ?>
        </div>
      <?php endif ?>

    </div>
  </body>
</html>
