<?php
class HwdMenuItem {

	// fields
	public $id;
	public $parent_id;
	public $title;
	public $link;
	public $classes;
	public $children;

	function __construct( $wp_object ) {
		// set data
		$this->id    = isset($wp_object->object_id) ? (int)$wp_object->object_id : 0;
		$this->parent_id    = isset($wp_object->menu_item_parent) ? (int)$wp_object->menu_item_parent : 0;
		$this->title    = isset($wp_object->title) ? $wp_object->title : "Home";
		$this->link     = isset($wp_object->url) ? $wp_object->url : "/";
		$this->classes     = isset($wp_object->classes) ? $wp_object->classes : [];
		$this->children = [];
	}

    function hasParent(): bool {
        return ! empty( $this->parent_id );
    }

    function isParent($child): bool {
        return (int)$this->id === (int)$child->parent_id;
    }

    function hasLink(): bool {
        return ! empty( $this->link );
    }

	function hasChildren(): bool {
		return count( $this->children ) > 0;
	}

	function addChild( $child ) {
		if ( empty( $this->children ) ) {
			$this->children = [];
		}
		$this->children[] = $child;
	}
}

function hwdWpNavMenuItemsToHwdMenuItems($menu){

    // define array
    $items = [];

    // NOTE: THIS NAME MUST MATCH THE SAME IN THE WP ADMIN DASH
    $wpMenuItems = wp_get_nav_menu_items($menu);

    if(!is_array($wpMenuItems)){
        return $items;
    }


    // transform wp menu to custom class for easier menu building
    foreach($wpMenuItems AS $wpMenuItem){
        $menuItem = new HwdMenuItem( $wpMenuItem);
        if($menuItem->hasParent()){
            foreach($items AS $item){
                if($item->isParent($menuItem)){
                    $item->addChild($menuItem);
                    break;
                }
            }
        }else{
            $items[] = $menuItem;
        }

    }

    return $items;
}
