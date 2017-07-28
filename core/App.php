<?php 
namespace Core;
/**
* 
*/
class App
{
	public static $instance;
	public $super_admins;
	public $wp_query;
	public $wp_rewrite;
	public $wp;
	public $wpdb;
	public $wp_locale;
	public $wp_admin_bar;
	public $wp_roles;
	public $wp_meta_boxes;
	public $wp_registered_sidebars;
	public $wp_registered_widgets;
	public $wp_registered_widget_controls;
	public $wp_registered_widget_updates;

	public $db;
	public $type;
	public $post_type;
	// public $instance;
	// public $instance;
	
	public function __construct($db)
	{
		self::$instance = $this;
		$this->db = $db;
	}

	public function setGlobalsVariables(){
		$this->super_admins = $GLOBALS['super_admins'];
		$this->wp_query = $GLOBALS['wp_query'];
		$this->wp = $GLOBALS["wp"];
		$this->wpdb = $GLOBALS["wpdb"];
		$this->wp_locale = $GLOBALS["wp_locale"];
		$this->wp_admin_bar = $GLOBALS["wp_admin_bar"];
		$this->wp_roles = $GLOBALS["wp_roles"];
		$this->wp_meta_boxes = $GLOBALS["wp_meta_boxes"];
		$this->wp_registered_sidebars = $GLOBALS["wp_registered_sidebars"];
		$this->wp_registered_widgets = $GLOBALS["wp_registered_widgets"];
		$this->wp_registered_widget_controls = $GLOBALS["wp_registered_widget_controls"];
		$this->wp_registered_widget_updates = $GLOBALS["wp_registered_widget_updates"];
	}

	public static function get($db = null) {
		if (self::$instance === null) {
			self::$instance = new self($db);
		}
		return self::$instance;
	}

	// public function getController(){
	// 	// return $Controller = new Controller($this);
		
	// 	if (!$this->wp_query->query && !$this->wp_query->query['post_type'] && !$this->wp_query->query['name']) return;
	// 	$post_type = $this->wp_query->query['post_type'];
	// 	$post_name = $this->wp_query->query['name'];
	// 	return [$post_type, $post_name];
		
	// }

	private function getTemplate(){
		$this->getType();
		var_dump($this->type);
		var_dump($this->post_type);
		if (($this->type == 'singular' || $this->type == 'single'  ) && 
			isset($this->wp_query->query['name']) &&
			file_exists(BASE_URL.'templates/'.$this->post_type.'/'.$this->wp_query->query['name'].'.php')) {
			echo " post_type / nom ";
			require BASE_URL.'templates/'.$this->post_type.'/'.$this->wp_query->query['name'].'.php';
		}elseif (file_exists(BASE_URL.'templates/'.$this->post_type.'/'.$this->type.'.php')) {
			echo " post_type / type ";
			require BASE_URL.'templates/'.$this->post_type.'/'.$this->type.'.php';
		}elseif (file_exists(BASE_URL.'templates/'.$this->type.'.php')) {
			echo "type only : ".$this->type;
			require BASE_URL.'templates/'.$this->type.'.php';
		}else {
			require BASE_URL.'templates/404.php';
		}
	}

	private function getType(){
		if($this->wp_query->is_single == true) $this->type = "single";
		if($this->wp_query->is_preview == true) $this->type = "preview";
		if($this->wp_query->is_page == true) $this->type = "page";
		if($this->wp_query->is_archive == true) $this->type = "archive";
		if($this->wp_query->is_date == true) $this->type = "date";
		if($this->wp_query->is_year == true) $this->type = "year";
		if($this->wp_query->is_month == true) $this->type = "month";
		if($this->wp_query->is_day == true) $this->type = "day";
		if($this->wp_query->is_time == true) $this->type = "time";
		if($this->wp_query->is_author == true) $this->type = "author";
		if($this->wp_query->is_category == true) $this->type = "category";
		if($this->wp_query->is_tag == true) $this->type = "tag";
		if($this->wp_query->is_tax == true) $this->type = "tax";
		if($this->wp_query->is_search == true) $this->type = "search";
		if($this->wp_query->is_feed == true) $this->type = "feed";
		if($this->wp_query->is_comment_feed == true) $this->type = "comment_feed";
		if($this->wp_query->is_trackback == true) $this->type = "trackback";
		if($this->wp_query->is_home == true) $this->type = "home";
		if($this->wp_query->is_404 == true) $this->type = "404";
		if($this->wp_query->is_embed == true) $this->type = "embed";
		if($this->wp_query->is_paged == true) $this->type = "paged";
		if($this->wp_query->is_admin == true) $this->type = "admin";
		if($this->wp_query->is_attachment == true) $this->type = "attachment";
		if($this->wp_query->is_singular == true) $this->type = "singular";
		if($this->wp_query->is_robots == true) $this->type = "robots";
		if($this->wp_query->is_posts_page == true) $this->type = "posts_page";
		if($this->wp_query->is_post_type_archive == true) $this->type = "post_type_archive";
		if(null !== get_post_type()) $this->post_type = get_post_type();
	}

	public function run(){
		// ob_start();
		get_header();
		$this->setGlobalsVariables();
		// $this->getController();
		$this->getTemplate();
		get_footer();
		// self::$content = ob_get_clean();
	}
}
?>