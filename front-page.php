<?php
/*
Template Name: Front Page
*/
get_header();
?>



<h1 class="py-16 text-center text-4xl font-bold">Hi, I'm Luke. I work with designers to create beautiful, full-stack websites and applications. </h1>

</div>
<div class="md:w-1/5 sm:w-32"></div>
</div>







<picture>
    <source alt="Luke and his daughter" srcset="<?php echo get_template_directory_uri(); ?>/assets/front-page-5.jpg"
            media="(min-width: 800px)">
    <img alt="Luke and his daughter" src="<?php echo get_template_directory_uri(); ?>/assets/front-page-5-mobile.jpeg" />
</picture>

<div class="flex">
<div class="w-1/5 sm:w-32"></div>
<div class="md:w-3/5 md:w-full">
	<h5 class="py-8 font-semibold">
	About
	</h5>
	<p class="leading-loose">
	I have worked as a web developer since 2015 and have worked in a small agency and a local University, which is where I learned how the technical aspects of code and design requirements converge. Outside of work, I have a wife and two children. Currently I do freelance work and am always open to learning about new web development projects, so don't hesitate to reach out.
	</p>

	<h5 class="py-8 font-semibold">
	Services
	</h5>
			<h5 class="font-semibold py-5 text-yellow-600">
	Front End Development
	</h5>
	<p class="leading-loose">
	Front End Development is building out the visual components of a website. Using HTML, CSS , and Javascript, I build fast, interactive websites. This also may include integrating a CMS.
	</p>
			<h5 class="font-semibold py-5 text-yellow-600">SEO and Optimizations</h5>
	<p class="leading-loose">
	Two major parts help with SEO: Content, and Best-practices.
	</p>
	<p class="leading-loose">
	Though most of my time is spent on implementing best-practices for a blazing-fast website, I often consult about the best-practices for content-based SEO.
	</p>


			<h5 class="font-semibold py-5 text-yellow-600">Website Migrations </h5>
	<p class="leading-loose">
	Migrating to a new web host can reap huge dividends. I can help identify the best host based on your needs and budget.
	</p>


			<h5 class="font-semibold py-5 text-yellow-600">UI/UX</h5>
	<p class="leading-loose">
UI/UX involves planning and iterating a site's structure and layout. Once the proper information architecture is in place, I work with designers to implement a component based approach to the UI/UX.
	</p>


	<?php

get_footer();

