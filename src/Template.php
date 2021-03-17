<?php


	namespace tjbcranleigh\CranleighPetCards;


	class Template
	{
		public static function plugin_dir_path(): string
		{
			return plugin_dir_path(__DIR__);
		}

		public static function getTemplate(string $templateName): string
		{
			return self::plugin_dir_path() . '/templates/' . $templateName . '.php';
		}

		public static function register()
		{
			$instance = new self();

			add_filter('template_include', [$instance, 'selectTemplate']);
			add_action('pre_get_posts', array($instance, 'showAllPosts'));
			add_action('wp_head', array($instance, 'my_custom_styles'), 100);

		}

		function my_custom_styles()
		{
			if (is_singular('petcards')) {
				echo "<style></style>";
			}
		}

		public function selectTemplate(string $template): string
		{
			if (is_post_type_archive('petcards')) {
				$template = self::getTemplate('archive');
			}
			if (is_singular('petcards')) {
				$template = self::getTemplate('single');
			}

			return $template;
		}

		public function showAllPosts($query)
		{
			if ($query->is_main_query() && is_post_type_archive('petcards')) {
				$query->set('posts_per_page', -1);
			}
		}
	}
