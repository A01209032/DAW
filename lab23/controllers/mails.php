<?php


    # Include the Autoloader (see "Libraries" for install instructions)
    require '../../vendor/autoload.php';
    use Mailgun\Mailgun;
    # Instantiate the client.
    $mgClient = new Mailgun('4ccf820586b1f03b54d04d6de13937aa-2416cf28-43481fa8');
    $domain = "sandbox2328bbf390a644ab811777d1f6a2e7e5.mailgun.org";
    # Make the call to the client.
    $mail = $_POST['mail'];
    $subject = $_POST['subject'];
    $text = $_POST['content'];
    $result = $mgClient->sendMessage($domain, array(
    	'from'	=> 'Possible client '.$mail.' <mailgun@sandbox2328bbf390a644ab811777d1f6a2e7e5.mailgun.org>',
    	'to'	=> 'Baz <samirnbfh@gmail.com>',
    	'subject' => $subject,
    	'text'	=> $text
    ));


    /*require '../../vendor/autoload.php';
    use Mailgun\Mailgun;
    $mg = Mailgun::create('4ccf820586b1f03b54d04d6de13937aa-2416cf28-43481fa8');
   
    $domain='sandbox2328bbf390a644ab811777d1f6a2e7e5.mailgun.org';
    # Now, compose and send your message.
    # $mg->messages()->send($domain, $params);
   /* $mg->messages()->send('sandbox2328bbf390a644ab811777d1f6a2e7e5.mailgun.org', [
      'from'    => 'mailgun@sandbox2328bbf390a644ab811777d1f6a2e7e5.mailgun.org',
      'to'      => 'Baz <'.$mail.'>',
      'subject' => $subject,
      'text'    => $content
    ]);*/
    
    
    //header('Location: /lab23/');
    echo '<script>alert("Success");</script>';
?>