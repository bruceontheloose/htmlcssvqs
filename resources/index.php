<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Resources - HTML5 &amp; CSS3 Visual Quickstart Guide (Eighth Edition)</title>
	<?php require '../cmn/inc/css.php' ?>
</head>
<body>
<div id="container">
<?php require '../cmn/inc/masthead.php' ?>

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
	
	<?php require '../cmn/inc/book-info.php' ?>
</div>
<!-- end nav -->

<!-- ===== START MAIN CONTENT ===== -->
<main role="main" class="entry">	
<article>
	<h1>Resources</h1>

	<p class="intro">The web is replete with articles, tutorials and videos that will help you expand your knowledge about building web sites. I've listed some helpful links below and will continue to add to them.</p>

	<h2>General</h2>
	<p>The following sites are popular resources for learning more about HTML, CSS, JavaScript, user experience (UX), web design, and more.</p>
	<ul>
		<li><a href="http://www.alistapart.com" rel="external">A List Apart</a></li>
		<li><a href="http://css-tricks.com" rel="external">CSS-Tricks</a></li>
		<li><a href="http://www.html5rocks.com" rel="external">HTML5 Rocks</a></li>
		<li><a href="http://net.tutsplus.com" rel="external">Nettuts+</a></li>
		<li><a href="http://www.sitepoint.com" rel="external">Sitepoint</a></li>
		<li><a href="http://www.smashingmagazine.com" rel="external">Smashing Magazine</a></li>
	</ul>

	<h2>CSS3 Transforms, Animations and Transitions</h2>
	<ul>
		<li><a href="http://www.sitepoint.com/series/css3-transformations/" rel="external">CSS3 Transformations</a> (also known as <i>transforms</i> &#8212; a five-part series)</li>
		<li><a href="http://www.sitepoint.com/series/css3-transitions/" rel="external">CSS3 Transitions</a> (a four-part series)</li>
		<li><a href="http://www.sitepoint.com/series/css3-animations/" rel="external">CSS3 Animations</a> (a four-part series)</li>
		<!-- <li><a href="" rel="external"></a></li> -->
	</ul>

	<h2>CSS Preprocessors</h2>
	<p>A CSS preprocessor is a tool that makes it easier to create and manage CSS. You write code in a special syntax that is mostly similar to CSS, and the preprocessor generates normal CSS that you include in your website. There are three preprocessors from which to choose:</p>

	<ul>
		<li><a href="http://lesscss.org" rel="external">LESS</a></li>
		<li><a href="http://sass-lang.com" rel="external">Sass</a></li>
		<li><a href="http://learnboost.github.io/stylus/" rel="external">Stylus</a></li>
	</ul>

	<p>You still have to understand CSS to use them, but they have features that save you time, such as variables, functions, mixins, and nesting rules. For example, they can calculate em values for you. LESS and Sass are the most popular, but Stylus has rabid fans too. I highly recommend you consider using one once you're comfortable with CSS.</p>
</article>
</main>

<?php require '../cmn/inc/footer.php' ?>

</div>
</body>
</html>