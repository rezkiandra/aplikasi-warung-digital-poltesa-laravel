import { js } from "laravel-mix";

js("resources/js/app.js", "public/js")
  .sass("resources/sass/app.scss", "public/css")
	.postCss("resources/css/app.css", "public/css", [
		require('tailwindcss')
	]);
