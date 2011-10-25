<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Menu {


	public $items = array();
	
	public $attrs = array();
	
	protected $current;
	
	
	public static function factory(array $items = NULL)
	{
		return new Menu($items);
	}
	
	public function __construct(array $items = NULL)
	{
		$this->items = empty($items) ? array() : $items;
		$this->current = trim(URL::site(Request::current()->uri()), '/');
	}
	
	public function add($title, $url, Menu $children = NULL)
	{
		$this->items[] = array
		(
			'title' => $title,
			'url' => $url,
			'children' => ($children instanceof Menu) ? $children->items : NULL,
		);
		
		return $this;
	}
	
	public function render(array $attrs = NULL, array $items = NULL)
	{
		static $i;
		
		$items = empty($items) ? $this->items : $items;
		$attrs = empty($attrs) ? $this->attrs : $attrs;
		
		$i++;
		
		if($i !== 1)
		{
			$attrs = array();
		}
		
		//$attrs['class'] = empty($attrs['class']) ? 'level-'.$i : $attrs['class'].' level-'.$i;
		
		$menu = '<ul'.HTML::attributes($attrs).'>'."\n";
		
		foreach($items as $key => $item)
		{
			$has_children = isset($item['children']);
			
			$classes = NULL;
			
			if ($has_children)
			{
				$classes[] = 'parent';
			}
			if($active = $this->active($item))
			{
				$classes[] = $active;
			}
			if(!empty($classes))
			{
				$classes = HTML::attributes(array('class' => implode(' ', $classes)));
			}
				
			$menu .= "\t".'<li'.$classes.'>'.HTML::anchor($item['url'], $item['title']);
			if($has_children)
			{
				$menu .= "\n".$this->render(NULL,$item['children']);
			}
			$menu .= '</li>'."\n";
		}
			
		$menu .= '</ul>'."\n";
		
		$i--;
			
		return $menu;
	}
	
	private function active(array $item)
	{
		$link = trim(URL::site($item['url']),'/');
		
		if($this->current === $link OR preg_replace('~/?index/?$~', '', $this->current) === $link)
		{
			return 'active current';
		}
		else
		{
			$current_pieces = explode('/',$this->current); array_shift($current_pieces);
			$link_pieces = explode('/',$link);
			
			for($i = 0, $l = count($link_pieces); $i < $l; $i++)
			{
				if((isset($current_pieces[$i]) AND $current_pieces[$i] !== $link_pieces[$i]) OR empty($current_pieces[$i]))
				{
					return;
				}
			}
			
			return 'active';
		}
	}
	
	public function insertBefore()
	{
	
	}
	
	public function insertAfter()
	{
	
	}
	
	public function replace()
	{
	
	}
	
	public function __toString()
	{
		return $this->render();
	}
	
	public function __set($key, $value)
	{
		$this->attrs[$key] = $value;
	}
	
	public function __get($key)
	{
		if(isset($this->attrs[$key]))
		{
			return $this->attrs[$key];
		}
	}
	
	public function debug()
	{
		return Kohana::debug($this->items);
	}
	
}
?>