<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Form Security - HTML5 &amp; CSS3 Visual Quickstart Guide (Eighth Edition)</title>
	<?php require '../../cmn/inc/css.php' ?>
</head>
<body>
<div id="container">
<?php require '../../cmn/inc/masthead.php' ?>

<!-- ===== START NAV ===== -->
<div class="sidebar" id="nav">
	<nav role="navigation">
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/8ed/examples/">Code Examples</a></li>
			<li><a href="/8ed/appendixes/html-reference.php">HTML Reference</a></li>
			<li><a href="/8ed/appendixes/css-reference.php">CSS Reference</a></li>
			<li><a href="/8ed/errata/">Errata</a></li>
			<li><a href="http://www.peachpit.com/store/html-and-css-visual-quickstart-guide-9780321928832" rel="external" title="To peachpit.com purchase page">Buy the Book</a></li>
		</ul>
	</nav>
	
	<?php require '../../cmn/inc/book-info.php' ?>
</div>
<!-- end nav -->

<!-- ===== START MAIN CONTENT ===== -->
<main role="main" class="entry">	
<article>
	<h1>Form Security</h1>

	<p class="intro">In Chapter 16 ("Processing Forms," page 416), I note that people with bad intentions may exploit vulnerabilities in your form processing. This can result in things like their gaining access to the information in your database, corrupting that information, using your server to send thousands of spam emails, and more unpleasantries.</p>

	<p>There are security measures you can include in your form processing to help thwart these attacks. Although by no means definitive coverage on the subject, the following list of articles can help you make your forms more secure. You might find some of the material somewhat advanced if you aren't familiar with processing forms or PHP.</p>

	<ul>
		<li><a href="http://www.sevenforty.com/blog/29/web-form-security-with-php" rel="external">Web Form Security with PHP</a> (Sevenforty) &#8212; Provides a concise list of common form security issues to be aware of</li>
		<li><a href="http://css-tricks.com/serious-form-security/" rel="external">Serious Form Security</a> (CSS-Tricks) &#8212; Discusses ways to secure your forms</li>
		<li><a href="http://www.phpro.org/tutorials/PHP-Security.html" rel="external">PHP Security</a> (phpro.org) &#8212; Explains one of the vulnerabilities with form scripts that send emails.</li>
	</ul>

	<p>All of those focus on using PHP for processing forms, but many of the concepts translate to using other server-side languages, such as Python or Ruby. Please search online for additional information regarding form validation and security.</p>

	<p class="note"><strong>Important:</strong> I've provided the articles as a convenience, but unfortunately, I can't guarantee your forms will never be violated even if you've followed their advice. The information in the articles should help stave off attacks, but no system is 100% hacker-proof if your attacker is extremely capable and sophisticated.</p>
</article>
</main>

<?php require '../../cmn/inc/footer.php' ?>

</div>
</body>
</html>