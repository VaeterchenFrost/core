<?php
 /*
 * Project:		EQdkp-Plus
 * License:		Creative Commons - Attribution-Noncommercial-Share Alike 3.0 Unported
 * Link:		http://creativecommons.org/licenses/by-nc-sa/3.0/
 * -----------------------------------------------------------------------
 * Began:		2013
 * Date:		$Date: 2013-04-24 10:23:19 +0200 (Mi, 24 Apr 2013) $
 * -----------------------------------------------------------------------
 * @author		$Author: godmod $
 * @copyright	2006-2013 EQdkp-Plus Developer Team
 * @link		http://eqdkp-plus.com
 * @package		eqdkp-plus
 * @version		$Rev: 13337 $
 * 
 * $Id: super_registry.class.php 13337 2013-04-24 08:23:19Z godmod $
 */

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}

include_once(registry::get_const('root_path').'core/html/html.aclass.php');

class hhidden extends html {

	protected static $type = 'hidden';
	
	public $name = '';
	
	public $imageuploader = false;
	public $imgup_type = 'admin';
	
	private $imgoptions = array('prevheight', 'deletelink', 'noimgfile');
	
	public function _toString() {
		$out = '<input type="'.self::$type.'" name="'.$this->name.'" ';
		if(empty($this->id)) $this->id = $this->cleanid($this->name);
		$out .= 'id="'.$this->id.'" ';
		if(!empty($this->value)) $out .= 'value="'.$this->value.'" ';
		if(!empty($this->class)) $out .= 'class="'.$this->class.'" ';
		if($this->readonly) $out .= 'readonly="readonly" ';
		if(!empty($this->js)) $out.= $this->js.' ';
		$imgup = '';
		if($this->imageuploader) {
			$imgopts = array();
			foreach($this->imgoptions as $opt) $imgopts[$opt] = $this->$opt;
			$imgup = $this->jquery->imageUploader($this->imgup_type, $this->id, $this->value, $this->imgpath, $imgopts);
		}
		return $out.' />'.$imgup;
	}
	
	public function inpval() {
		return $this->in->get($this->name, '');
	}
}
?>