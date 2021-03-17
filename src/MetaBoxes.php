<?php


	namespace tjbcranleigh\CranleighPetCards;


	/**
	 * Class MetaBoxes
	 *
	 * @package CranleighSchool\Policies
	 */
	class MetaBoxes
	{
		public const PREFIX = "petcard_";

		/**
		 * MetaBoxes constructor.
		 */
		public static function register() {
			new self();
		}
		public function __construct()
		{
			add_filter('rwmb_meta_boxes', array($this, 'meta_boxes'));
		}

		/**
		 * meta_boxes function.
		 * Uses the 'rwmb_meta_boxes' filter to add custom meta boxes to our custom post type.
		 * Requires the plugin "meta-box"
		 *
		 * @access public
		 *
		 * @param array $meta_boxes
		 *
		 * @return array $meta_boxes
		 */
		public static function meta_boxes(array $meta_boxes)
		{

			$meta_boxes[] = array(
				'id'         => 'petcard_meta',
				'title'      => 'Meta Data',
				'post_types' => array('petcards'),
				'context'    => 'side',
				'priority'   => 'high',
				'autosave'   => true,
				'fields'     => array(
					array(
						'name'             => __('Pet Name', 'cranleigh-2016'),
						'id'               => self::PREFIX."petname",
						'type'             => 'text',
						'desc'             => 'Pet Name',
					),
					array(
						'name'             => __('Pets Age', 'cranleigh-2016'),
						'id'               => self::PREFIX."petage",
						'type'             => 'text',
						'desc'             => 'How old is the pet in years and months',
					),
					array(
						'name'             => __('Owners Name', 'cranleigh-2016'),
						'id'               => self::PREFIX."owner",
						'type'             => 'text',
						'desc'             => 'The name of the owner in First Name then First letter of Surname format eg Tom B',
					),

				),

			);

			return $meta_boxes;
		}
	}
