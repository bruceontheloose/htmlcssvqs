<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Processing Form Data</title>
	<style>
	/* The CSS is here to keep the demo simple. 
		As always, I recommend you put your CSS in an external file. */
	body {
		font: 100%/1.3 sans-serif;
		padding: 1em 2em;
	}

	.note {
		background: #eee;
		border: 2px solid #ccc;
		margin-bottom: 1em;
		padding: .25em 1.5em;
	}

	/* Table Styling */
	table {
		background: #0d8800;
		padding: 1em;
		width: 80%;
	}

	th,
	td {
		padding: .5em 1em;
	}

	th {
		background: #14d100;
		color: #222;
		font-size: 1.25em;
		padding-left: .75em;
		text-align: left;
	}

	tr {
		background: #74e868;
	}

	td {
    	width: 40%;
	}

	code {
		font-size: 1.2375em;
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

TO TEST THIS SCRIPT
-------------------
Like all PHP code, this PHP script needs to be run on a web server to work. Please review the following information that may help you.

1) Make sure the name of this file is show-data.php. If you downloaded it from the book site's example page (not as part of the code examples ZIP), you might have saved it as show-data.txt. If so, rename the file to show-data.php.

2) Open form.html in your text editor and make sure the action attribute is set to show-data.php, as shown below:

	<form method="post" action="show-data.php" enctype="multipart/form-data">

It should be set to this already if you didn't change it after downloading it from the book site.

3) After that, place form.html, the css folder, and this file (show-data.php) on a web server that has PHP installed. For example, if you have an account with a web host, you could upload the files to your server (see Chapter 21). The vast majority of web host accounts have PHP pre-installed, so you shouldn't have to do anything special beyond uploading the files. But, if the form doesn't work after you upload the files, your web host or their site's help pages may be of assistance.

You may also test the form on your own computer if you have PHP and a web server such as Apache installed and running. OS X (Macs) has these installed by default. More information for enabling these is available at http://osxdaily.com/2012/09/10/enable-php-apache-mac-os-x/, although some of the process is a little technical. You may find it easier to download one of the following packages that install Apache, PHP, MySQL and more on your computer, and provide an interface for you to turn them on and off easily.

- OS X only: 				MAMP (www.mamp.info)
- Windows only: 			WampServer (http://www.wampserver.com)
- Linux, OS, or Windows: 	XAMPP (http://www.apachefriends.org/en/xampp.html)

Search online for more information about using one of these packages.

*/
?>

<h1>Information Submitted with Form</h1>

<p><strong>This script needs to be run on a web server to work. Open this file in your text editor and read the comment that begins with "TO TEST THIS SCRIPT" for additional information.</strong></p>

<p>This is a very simple PHP script that displays each bit of information that was sent when <code>form.html</code> was submitted (by using the "Create Acount" button). The left column of the table below lists the <code>name</code> attribute of each form field as defined in <code>form.html</code>. The right column shows each field's value as sent with the submitted form.</p>

<p>In a more useful script, you might store this information in a MySQL database, or send it to your email address.</p>

<div class="note">
	<p><strong>Important Note:</strong> The sample PHP code in this file is simple by design, but as a result, <em>it doesn't include the security checks that a bulletproof script would include</em>. Use caution before including it on your own site. If you do intend to use a script like this, I recommend consulting PHP books and other resources to learn how to check submitted form values for malicious data before you write the values to the screen or to a database, or send them via email.</p>

	<p>The script also does not check each to see if the user provided information for each form field.</p>
</div>

<!-- Form Data  -->
<table>
<tr>
	<th>Field Name</th>
	<th>Value(s)</th>
</tr>

<?php
if (empty($_POST)) {
	print "<tr><td colspan=\"2\"><p>No data was submitted.</p></td></tr>";
} else { /* Data was submitted, so show it in the page. */
	foreach ($_POST as $key => $value) {
		
		/* Cleans up quoted values. See: 
				http://us2.php.net/manual/en/function.get-magic-quotes-gpc.php
				http://us2.php.net/manual/en/function.stripslashes.php
		*/
		if ($key != 'email_signup') {
			if (get_magic_quotes_gpc()) {
				$value = stripslashes($value);
			}
		}

		/* Check the form field and print its value in a table row */
		if ($key == 'email_signup') { // True if one of the Email checkboxes at end
			
			if (is_array($_POST['email_signup'])) { // True if a checkbox checked
				// Print the name of the checkbox form field and the value
				foreach ($_POST['email_signup'] as $value) {
					print "<tr><td><code>$value</code></td><td>"; 
					print "<i>on</i>";
					print "</td></tr>\n";
				}
			} else {
				print "<tr><td><code>$key</code></td><td>$value</td></tr>\n";
			}
			
		} else { // Print row and info for form fields except the Email checkboxes
			print "<tr><td><code>$key</code></td><td>$value</td></tr>\n";
		}
	}
}

/* Display the file upload picture name */
if(isset($_FILES['picture'])) {
	/*
		This basic script presents the name of the uploaded file only. To check the file size, file type (like JPG, GIF, or PNG), and actually upload a file to a folder, see the video tutorial at http://net.tutsplus.com/articles/news/diving-into-php/. The code explained in the video is also available for download from that URL. That page also includes links to a series of videos about using PHP.
	*/

	$picture_name = $_FILES['picture']['name'];
	print "<tr><td><code>picture</code></td><td>$picture_name</td></tr>\n";
}

?>
</table>
</body>
</html>
