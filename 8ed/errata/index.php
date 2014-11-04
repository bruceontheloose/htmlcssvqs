<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Errata - HTML5 &amp; CSS3 Visual Quickstart Guide (Eighth Edition)</title>
	<?php require '../../cmn/inc/css.php' ?>
</head>
<body class="page-errata">
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
			<li class="viewing">Errata</li>
			<li><a href="http://www.peachpit.com/store/html-and-css-visual-quickstart-guide-9780321928832" rel="external" title="To peachpit.com purchase page">Buy the Book</a></li>
		</ul>
	</nav>
	
	<?php require '../../cmn/inc/book-info.php' ?>
</div>
<!-- end nav -->

<!-- ===== START MAIN CONTENT ===== -->
<main role="main">	
<div>
	<h1>Errata</h1>
	<p class="intro">Despite everyone's best efforts to catch them, errors occasionally find their way to the final version of a book. If you find an error, please send it to <a href="mailto:errata@peachpit.com?subject=Error found in 'HTML and CSS VQS 8th Edition'">errata@peachpit.com</a>. I will happily credit you here, too, if you'd like; please indicate in your email if you'd like your name listed. Thank you!</p>

	<div class="errata">
		<h2>Chapter 11&#8212;"Styling HTML5 Elements in Older Browsers"</h2>
		<p><i>Page 273, Figure E</i></p>
		<p>The name of the JavaScript file is incorrect. It should be <code>html5shiv.js</code> instead of <br /><code>html5-shiv.js</code>. (In other words, the hyphen should not be in the filename.) By correcting it to <code>html5shiv.js</code>, the filename matches how it appears in Figure D on the same page.</p>
		<p>I have also fixed this in all relevant <a href="/8ed/examples/">code examples</a> available on this site.</p>
		<p class="added">Added: <time datetime="2013-10-20">Oct 20, 2013</time></p>
	</div>
</div>
</main>

<?php require '../../cmn/inc/footer.php' ?>

</div>
</body>
</html>