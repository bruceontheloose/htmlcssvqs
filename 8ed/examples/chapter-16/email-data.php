<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8" />
    <title>Emailing Form Data</title>
	<style type="text/css">
	/* The CSS is here to keep the demo simple. As always, I recommend you put your CSS in an external file. */
	body {
		font: 100%/1.3 sans-serif;
		padding: 1em 2em;
	}
	</style>
</head>
<body>

<?php
/*
-----------------------------------------------------------------
IMPORTANT NOTE:

The sample PHP code in this file is simple by design, but as a result, it doesn't include the security checks that a bulletproof script would include. Use caution before including it on your own site. If you do intend to use a script like this, I recommend consulting PHP books and other resources to learn how to check submitted form values for malicious data before you write the values to the screen or to a database, or send them via email.

Also, please be aware that I am not an expert PHP developer, so undoubtedly there are better ways to write this script.
--------------------------------------------------------------------


ABOUT THIS SCRIPT
-----------------
This sample PHP script collects each bit of information that was sent when form.html was submitted (by using the "Create Acount" button). Then it emails that data to the email addresses you specify near the bottom of this script. It collects the data in the same way that show-data.php does--by getting the value associated with each field name. The names are the name attributes assigned to the form fields in the HTML form.


TO TEST THIS SCRIPT
-------------------
Like all PHP code, this PHP script needs to be run on a web server to work. Please review the following information that may help you.

1) Make sure the name of this file is email-data.php. If you downloaded it from the book site's example page (not as part of the code examples ZIP), you might have saved it as email-data.txt. If so, rename the file to email-data.php.

2) As noted above, this PHP script emails the submitted form data to the email address you specify **in this script**. It is *not* sent to the email address you enter in the form itself. 

There are two places to specify where to email the data. Both are near the end of this file. If you scroll down, you will notice the following portions of code a handful of lines from the bottom (separated by a few lines themselves).

	'Bcc: yourmail@youremaildomain.com'

	mail('yourmail@youremaildomain.com', $subject, $body, $from);

	a) Replace yourmail@youremaildomain.com in the Bcc line with the email address that should be sent a blind copy of the form data. (Don't remove the single quotes.) If you'd like, it can be the same address you use in the next step.

	b) Replace yourmail@youremaildomain.com in the mail line with the primary email address that should be sent the form data. (Don't remove the single quotes.)

Save this file when you are done.

3) Open form.html in your text editor and 

	CHANGE THIS
	<form method="post" action="show-data.php" enctype="multipart/form-data">

	TO THIS
	<form method="post" action="email-data.php" enctype="multipart/form-data">

The only difference being that the action will point to email-data.php (this file).

Save form.html when you are done.

Alternatively, you could copy form.html and name it something else (for example, form-test-email.html) and then change the action value in form-test-email.html to email-data.php. That would allow you to have form.html for testing the form with show-data.php and form-test-email.html for testing the form with email-form.php.

4) After that, place the form HTML file, the css folder, and this file (email-data.php) on a web server that has PHP installed. For example, if you have an account with a web host, you could upload the files to your server (see Chapter 21). The vast majority of web host accounts have PHP pre-installed, so you shouldn't have to do anything special beyond uploading the files. But, if the form doesn't work after you upload the files, your web host or their site's help pages may be of assistance.

You may also test the form on your own computer if you have PHP and a web server such as Apache installed and running. OS X (Macs) has these installed by default. More information for enabling these is available at http://osxdaily.com/2012/09/10/enable-php-apache-mac-os-x/, although some of the process is a little technical. You may find it easier to download one of the following packages that install Apache, PHP, MySQL and more on your computer, and provide an interface for you to turn them on and off easily.

- OS X only: 				MAMP (www.mamp.info)
- Windows only: 			WampServer (http://www.wampserver.com)
- Linux, OS, or Windows: 	XAMPP (http://www.apachefriends.org/en/xampp.html)

Search online for more information about using one of these packages.

IMPORTANT: However, unlike running show-data.php on your computer's server, email-data.php may require some additional configuring of your computer so PHP's mail() function will send the email. Search online for additional information if email-data.php is not sending emails when run from your machine. Extra configuration probably won't be necessary if you run this on your web host's server.

*/

if (empty($_POST)) {
	print "<p>No data was submitted.</p>";
	exit();
}

/* Creates function that removes magic escaping, if it's been applied, from values and then removes extra newlines and returns to foil spammers. Thanks Larry Ullman! */
function clear_user_input($value) {
	if (get_magic_quotes_gpc()) $value=stripslashes($value);
	$value= str_replace( "\n", '', trim($value));
	$value= str_replace( "\r", '', $value);
	return $value;
}


/* Create body of email message by cleaning each field and then appending each name and value to it. */

$body = "Here is the data that was submitted:\n";

// Get value for each form field
foreach ($_POST as $key => $value) {
	// True if for field is anything but one of the Email sign-up checkboxes
	if ($key != 'email_signup') {
		$key = clear_user_input($key);
		$value = clear_user_input($value);

		$body .= "$key: $value\n";
	} else { // True if an Email checkbox chosen	
		if (is_array($_POST['email_signup'])) {
			$body .= "$key: ";
			$counter =1;
			
			foreach ($_POST['email_signup'] as $value) {
				//Add comma and space until last element
				if (sizeof($_POST['email_signup']) == $counter) {
					$body .= "$value\n";
					break;
				} else {
					$body .= "$value, ";
					$counter += 1;
				}
			} // end foreach
		} // end inner if
	} // end else
} // end foreach

extract($_POST);

/* Get file upload picture name */
if(isset($_FILES['picture'])) {
	/*
		This basic script presents the name of the uploaded file only. To check the file size, file type (like JPG, GIF, or PNG), and actually upload a file to a folder, see the video tutorial at http://net.tutsplus.com/articles/news/diving-into-php/. The code explained in the video is also available for download from that URL. That page also includes links to a series of videos about using PHP.
	*/

	$picture_name = $_FILES['picture']['name'];

	// make sure name isn't blank
	if ($picture_name != '') {
		// add the picture name to the email body message
		$body .= "picture: $picture_name\n";
	}
}


/* Removes newlines and returns from $email and $name so they can't smuggle extra email addresses for spammers */
$email = clear_user_input($email);
$first_name = clear_user_input($first_name);

/* Create header that puts email in From box along with name in parentheses and sends Bcc to alternate address. Change yourmail@youremaildomain.com to the Bcc email address you want to include. */
$from='From: '. $email . "(" . $first_name . ")" . "\r\n" . 'Bcc: yourmail@youremaildomain.com' . "\r\n";

// Creates intelligible subject line that also shows you where it came from
$subject = 'New Profile from Website';

/* Sends mail to the address below with the form data submitted above. Replace yourmail@youremaildomain.com with the email address to which you want the data sent. */
mail('yourmail@youremaildomain.com', $subject, $body, $from);


// This message will appear in the browser, not as part of the email
print "<p>Thanks for signing up! Your information has been sent to us.</p>";
?>

</body>
</html>