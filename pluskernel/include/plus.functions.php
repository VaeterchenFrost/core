<?php
/******************************
 * EQDKP PLUGIN: PLUSkernel
 * (c) 2006 - 2007 by EQDKP Plus Dev Team
 * http://www.kompsoft.de
 * ------------------
 * plus.functions.php
 * Changed: Mai 10, 2007 Corgan
 * $Id$
 ******************************/

/**
* This is for the addons to identify the PLUS as a PLUS
*
* if(function_exists(isEQDKPPLUS)){
*	 echo "ICH BIN DEUTSCHLAND";
* }
* ECHO ROFL Walle. :D
*
*/
function isEQDKPPLUS(){
	$iamplus = true;
	return $iamplus;
}

function runden($value){
	global $conf_plus, $eqdkp;

	$ret_val = $value;
	$precision = $conf_plus['pk_round_precision'];

	if (($precision < 0) or ($precision > 5) )
	{
		$precision = 2;
	}

	if ($conf_plus['pk_round_activate'] == "1")
	{
		$ret_val = round($value,$precision)	;
	}

	return $ret_val;
}

// return the Classname
function get_classnamebyID($classID)
{
	$_return = '' ;
    global $db, $eqdkp;
	$sql = "select class_name from ".CLASSES_TABLE ." where class_id = ".$classID ;
    $result = $db->query($sql);

 	while ( $row = $db->fetch_record($result) )
 	{
		$_return = $row[class_name];
	}
}

// return Classname if Membername is given
function get_classNamebyMemberName($Mname)
{

	$_return = '' ;
    global $db, $eqdkp;


	$sql = 'SELECT c.class_name
            FROM ( ' . MEMBERS_TABLE . ' m
            LEFT JOIN ' . CLASS_TABLE . " c
            ON m.member_class_id = c.class_id)
            WHERE m.member_name = '".$Mname."'";

    $result = $db->query($sql);

 	while ( $row = $db->fetch_record($result) )
 	{
		$_return = $row[class_name];
	}
return($_return) ;
}

// Return Class with link to Listmembers with Filter = class
function get_classNameImgListmembers($class)
{

	global $eqdkp;
	$_return = $class ;
	switch ($class)
	{
		case "Druid"        : $_return = "<a class=Druid  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Druid'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Druid.gif' alt=''>&nbsp;Druid</a>";break;
		case "Warlock"      : $_return = "<a class=Warlock href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Warlock'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warlock.gif' alt=''>&nbsp;Warlock</a>";break;
		case "Hunter"       : $_return = "<a class=Hunter  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Hunter'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Hunter.gif' alt=''>&nbsp;Hunter</a>";break;
		case "Warrior"      : $_return = "<a class=Warrior href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Warrior'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warrior.gif' alt=''>&nbsp;Warrior</a>";break;
		case "Mage"         : $_return = "<a class=Mage  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Mage'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Mage.gif' alt=''>&nbsp;Mage</a>";break;
		case "Paladin"      : $_return = "<a class=Paladin href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Paladin'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Paladin.gif' alt=''>&nbsp;Paladin</a>";break;
		case "Priest"       : $_return = "<a class=Priest  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Priest'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Priest.gif' alt=''>&nbsp;Priest</a>";break;
		case "Rogue"        : $_return = "<a class=Rogue  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Rogue'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Rogue.gif' alt=''>&nbsp;Rogue</a>";break;
		case "Shaman"       : $_return = "<a class=Shaman  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Shaman'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Shaman.gif' alt=''> Shaman</a>";break;
		case "Default"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Unknown.gif' alt=''>&nbsp;Unknown";break;

		case "Druide"       : $_return = "<a class=Druid  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Druide'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Druid.gif' alt=''>&nbsp;Druide</a>";break;
		case "Hexenmeister" : $_return = "<a class=Warlock href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Hexenmeister'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warlock.gif' alt=''>&nbsp;Hexenmeister</a>";break;
		case "J�ger"        : $_return = "<a class=Hunter  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=J�ger'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Hunter.gif' alt=''>&nbsp;J�ger</a>";break;
		case "Krieger"      : $_return = "<a class=Warrior href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Krieger'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warrior.gif' alt=''>&nbsp;Krieger</a>";break;
		case "Magier"       : $_return = "<a class=Mage  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Magier'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Mage.gif' alt=''>&nbsp;Magier</a>";break;
		case "Paladin"      : $_return = "<a class=Paladin href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Paladin'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Paladin.gif' alt=''>&nbsp;Paladin</a>";break;
		case "Priester"     : $_return = "<a class=Priest  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Priester'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Priest.gif' alt=''>&nbsp;Priester</a>";break;
		case "Schurke"      : $_return = "<a class=Rogue  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Schurke'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Rogue.gif' alt=''>&nbsp;Schurke</a>";break;
		case "Schamane"     : $_return = "<a class=Shaman  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Shaman'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Shaman.gif' alt=''> Schamane</a>";break;
		case "Unknown"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Unknown.gif' alt=''>&nbsp;Unknown";break;
	 }
return($_return) ;
}



// Return colored Name with link to viewmembers
function get_classNameImgViewmembers($name)
{
	global $eqdkp;

	$class = get_classNamebyMemberName($name);
	$_return = $name ;

	switch ($class)
	{
		case "Druid"        : $_return = "<a class=Druid   href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Druid.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Warlock"      : $_return = "<a class=Warlock href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warlock.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Hunter"       : $_return = "<a class=Hunter  href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Hunter.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Warrior"      : $_return = "<a class=Warrior href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warrior.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Mage"         : $_return = "<a class=Mage    href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Mage.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Paladin"      : $_return = "<a class=Paladin href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Paladin.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Priest"       : $_return = "<a class=Priest  href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Priest.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Rogue"        : $_return = "<a class=Rogue   href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Rogue.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Shaman"       : $_return = "<a class=Shaman  href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Shaman.gif' alt=''>&nbsp;".$name."</a>";break;

		case "Druide"       : $_return = "<a class=Druid 	href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Druid.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Hexenmeister" : $_return = "<a class=Warlock 	href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warlock.gif' alt=''>&nbsp;".$name."</a>";break;
		case "J�ger"        : $_return = "<a class=Hunter 	href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Hunter.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Krieger"      : $_return = "<a class=Warrior 	href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warrior.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Magier"       : $_return = "<a class=Mage 	href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Mage.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Paladin"      : $_return = "<a class=Paladin 	href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Paladin.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Priester"     : $_return = "<a class=Priest 	href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Priest.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Schurke"      : $_return = "<a class=Rogue 	href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Rogue.gif' alt=''>&nbsp;".$name."</a>";break;
		case "Schamane"     : $_return = "<a class=Shaman 	href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Shaman.gif' alt=''>&nbsp;".$name."</a>";break;

	 }
return($_return) ;
}

// return only name in class colur
function get_coloredLinkedName($name)
{
	global $eqdkp;

	$class = get_classNamebyMemberName($name);
	$_return = $name ;

	switch ($class)
	{
		case "Druid"    	: $_return = "<a class=Druid   href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Warlock"      : $_return = "<a class=Warlock href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Hunter"       : $_return = "<a class=Hunter  href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Warrior"      : $_return = "<a class=Warrior href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Mage"         : $_return = "<a class=Mage    href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Paladin"      : $_return = "<a class=Paladin href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Priest"       : $_return = "<a class=Priest  href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Rogue"        : $_return = "<a class=Rogue   href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Shaman"       : $_return = "<a class=Shaman  href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;

		case "Druide"       : $_return = "<a class=Druid   href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Hexenmeister" : $_return = "<a class=Warlock href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "J�ger"        : $_return = "<a class=Hunter  href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Krieger"      : $_return = "<a class=Warrior href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Magier"       : $_return = "<a class=Mage    href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Paladin"      : $_return = "<a class=Paladin href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Priester"     : $_return = "<a class=Priest  href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Schurke"      : $_return = "<a class=Rogue   href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
		case "Schamane"     : $_return = "<a class=Shaman  href='".$eqdkp->config['server_path']."viewmember.php?s=&name=".$name."'>".$name."</a>";break;
	 }
return($_return) ;
}

function get_classImgListmembers($class)
{

global $eqdkp;
	$_return = $class ;
	switch ($class)
	{
		case "Druid"        : $_return = "<a class=Druid  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Druid'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Druid.gif' alt=''></a>";break;
		case "Warlock"      : $_return = "<a class=Warlock href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Warlock'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warlock.gif' alt=''></a>";break;
		case "Hunter"       : $_return = "<a class=Hunter  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Hunter'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Hunter.gif' alt=''></a>";break;
		case "Warrior"      : $_return = "<a class=Warrior href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Warrior'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warrior.gif' alt=''></a>";break;
		case "Mage"         : $_return = "<a class=Mage  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Mage'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Mage.gif' alt=''></a>";break;
		case "Paladin"      : $_return = "<a class=Paladin href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Paladin'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Paladin.gif' alt=''></a>";break;
		case "Priest"       : $_return = "<a class=Priest  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Priest'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Priest.gif' alt=''></a>";break;
		case "Rogue"        : $_return = "<a class=Rogue  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Rogue'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Rogue.gif' alt=''></a>";break;
		case "Shaman"       : $_return = "<a class=Shaman  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Shaman'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Shaman.gif' alt=''></a>";break;
		case "Default"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Unknown.gif' alt=''>&nbsp;Unknown";break;

		case "Druide"       : $_return = "<a class=Druid  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Druide'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Druid.gif' alt=''></a>";break;
		case "Hexenmeister" : $_return = "<a class=Warlock href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Hexenmeister'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warlock.gif' alt=''></a>";break;
		case "J�ger"        : $_return = "<a class=Hunter  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=J�ger'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Hunter.gif' alt=''></a>";break;
		case "Krieger"      : $_return = "<a class=Warrior href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Krieger'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Warrior.gif' alt=''></a>";break;
		case "Magier"       : $_return = "<a class=Mage  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Magier'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Mage.gif' alt=''></a>";break;
		case "Paladin"      : $_return = "<a class=Paladin href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Paladin'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Paladin.gif' alt=''></a>";break;
		case "Priester"     : $_return = "<a class=Priest  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Priester'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Priest.gif' alt=''></a>";break;
		case "Schurke"      : $_return = "<a class=Rogue  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Schurke'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Rogue.gif' alt=''></a>";break;
		case "Schamane"     : $_return = "<a class=Shaman  href='".$eqdkp->config['server_path']."listmembers.php?s=&filter=Shaman'><img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Shaman.gif' alt=''></a>";break;
		case "Unknown"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."./images/class/Unknown.gif' alt=''>&nbsp;Unknown";break;
	 }
return($_return) ;
}

function renameClasstoenglish($class)
{
global $eqdkp;
	$_return = $class ;
	switch ($class)
	{
		case "Druide"       : $_return = "Druid";break;
		case "Hexenmeister" : $_return = "Warlock";break;
		case "J�ger"        : $_return = "Hunter";break;
		case "Krieger"      : $_return = "Warrior";break;
		case "Magier"       : $_return = "Mage";break;
		case "Paladin"      : $_return = "Paladin";break;
		case "Priester"     : $_return = "Priest";break;
		case "Schurke"      : $_return = "Rogue";break;
		case "Schamane"     : $_return = "Shaman";break;
		case "Unknown"      : $_return = "Default";break;

		case "Druid"        : $_return = "Druid";break;
		case "Warlock"    	: $_return = "Warlock";break;
		case "Hunter"       : $_return = "Hunter";break;
		case "Warrior"      : $_return = "Warrior";break;
		case "Mage"         : $_return = "Mage";break;
		case "Paladin"      : $_return = "Paladin";break;
		case "Priest"       : $_return = "Priest";break;
		case "Rogue"        : $_return = "Rogue";break;
		case "Shaman"       : $_return = "Shaman";break;
		case "Default"   	  : $_return = "Default";break;

	 }
return($_return) ;
}

// return the Class Color Code
function getClassHtmlColorLinkCode($classname)
{

	$_return = '';
	switch ($classname)
	{
		case "Druid"        : $_return = " class=Druid  '";break;
		case "Warlock"      : $_return = " class=Warlock '";break;
		case "Hunter"       : $_return = " class=Hunter  '";break;
		case "Warrior"      : $_return = " class=Warrior '";break;
		case "Mage"         : $_return = " class=Mage  '";break;
		case "Paladin"      : $_return = " class=Paladin '";break;
		case "Priest"       : $_return = " class=Priest  '";break;
		case "Rogue"        : $_return = " class=Rogue  '";break;
		case "Shaman"       : $_return = " class=Shaman  '";break;

		case "Druide"       : $_return = " class=Druid  '";break;
		case "Hexenmeister" : $_return = " class=Warlock '";break;
		case "J�ger"        : $_return = " class=Hunter  '";break;
		case "Krieger"      : $_return = " class=Warrior '";break;
		case "Magier"       : $_return = " class=Mage  '";break;
		case "Paladin"      : $_return = " class=Paladin '";break;
		case "Priester"     : $_return = " class=Priest  '";break;
		case "Schurke"      : $_return = " class=Rogue  '";break;
		case "Schamane"     : $_return = " class=Shaman  '";break;
	 }
return($_return) ;
}

// return only the Class image
function getClassImg($classname)
{
	global $eqdkp ;
	$_return = '' ;

	switch ($classname)
	{
		case "Druid"        : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Druid.gif' alt=''>";break;
		case "Warlock"    	: $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Warlock.gif' alt=''>";break;
		case "Hunter"       : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Hunter.gif' alt=''>";break;
		case "Warrior"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Warrior.gif' alt=''>";break;
		case "Mage"         : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Mage.gif' alt=''>";break;
		case "Paladin"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Paladin.gif' alt=''>";break;
		case "Priest"       : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Priest.gif' alt=''>";break;
		case "Rogue"        : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Rogue.gif' alt=''>";break;
		case "Shaman"       : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Shaman.gif' alt=''>";break;
		case "Default"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Unknown.gif' alt=''>";break;

		case "Druide"       : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Druid.gif' alt=''>";break;
		case "Hexenmeister" : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Warlock.gif' alt=''>";break;
		case "J�ger"        : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Hunter.gif' alt=''>";break;
		case "Krieger"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Warrior.gif' alt=''>";break;
		case "Magier"       : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Mage.gif' alt=''>";break;
		case "Paladin"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Paladin.gif' alt=''>";break;
		case "Priester"     : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Priest.gif' alt=''>";break;
		case "Schurke"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Rogue.gif' alt=''>";break;
		case "Schamane"     : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Shaman.gif' alt=''>";break;
		case "Unknown"      : $_return = "<img width=18 height=18 src='".$eqdkp->config['server_path']."/images/class/Unknown.gif' alt=''>";break;
	 }
return($_return) ;
}

function getDKPInfo()
{
	global $eqdkp , $user , $tpl;

		$sqlabfrage ="select count(*) as alle from ".RAIDS_TABLE.";";
		$result = mysql_query("$sqlabfrage");
		$data = mysql_fetch_object($result);
		$allraids = $data->alle;

		$member_results = mysql_query("SELECT * FROM ".MEMBERS_TABLE.";") or die(mysql_error());
		while($row = mysql_fetch_array($member_results, MYSQL_ASSOC))
		{
			$player_dkps = ($row['member_earned'] - $row['member_spent']) + $row['member_adjustment'];
			$total_points+=$player_dkps;
		}

		$total_pointsset = $total_points ;

		// Get total items
		$item_results = mysql_query("SELECT * FROM ".ITEMS_TABLE.";") or die(mysql_error());
		$total_items = mysql_num_rows($item_results);
		$setitems = $total_items ;

		// Get total players
		$member_results = mysql_query("SELECT * FROM ".MEMBERS_TABLE.";") or die(mysql_error());
		$total_players = mysql_num_rows($member_results);

		$DKPInfo = '<table width=100% class="borderless" cellspacing="0" cellpadding="2">
					<tr><th class="smalltitle" align="center">DKP Infos</th></tr>
					</table>'."\n";;

		$DKPInfo .= '<table width=100% class="borderless" cellspacing="0" cellpadding="2">'."\n";
		$DKPInfo .= '<tr><td class="row1">'.$user->lang['bosscount_raids'].'</td><td class="row1">'. $allraids. '</td></tr>'."\n";
		$DKPInfo .= '<tr><td class="row2">'.$user->lang['bosscount_player'].'</td><td class="row2">'. $total_players. '</td></tr>'."\n";
		$DKPInfo .= '<tr><td class="row1">'.$user->lang['bosscount_items'].'</td><td class="row1">'. $total_items. '</td></tr>'."\n";
		$DKPInfo .= '</table>'."\n";

		$tpl->assign_var('DKP_INFO',$DKPInfo);
}

if ( !function_exists('htmlspecialchars_decode') )
{
    function htmlspecialchars_decode($text)
    {
        return strtr($text, array_flip(get_html_translation_table(HTML_SPECIALCHARS)));
    }
}

 function da( $TheArray )
  { // Note: the function is recursive

  	if(!is_array($TheArray))
  	{return "no array";}

    echo "<table border=0>\n";

    $Keys = array_keys( $TheArray );
    foreach( $Keys as $OneKey )
    {
      echo "<tr>\n";

      echo "<td bgcolor='#727450'>";
      echo "<B>" . $OneKey . "</B>";
      echo "</td>\n";

      echo "<td bgcolor='#C4C2A6'>";
        if ( is_array($TheArray[$OneKey]) )
          da($TheArray[$OneKey]);
        else
          echo $TheArray[$OneKey];
      echo "</td>\n";

      echo "</tr>\n";
    }
    echo "</table>\n";
  }

   function d( $content )
  { // Note: the function is recursive

  	if(is_array($content))
  	{return da($content); }

    echo "<table border=0>\n";
    echo "<tr>\n";
    echo "<td bgcolor='#0080C0'>";
    echo "<B>" . $content . "</B>";
    echo "</td>\n";
    echo "</tr>\n";
    echo "</table>\n";
  }

?>