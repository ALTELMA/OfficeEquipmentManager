<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2007 PHPExcel, Maarten Balliauw
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2007 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/lgpl.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */


/** PHPExcel_Style_Color */
require_once 'PHPExcel/Style/Color.php';

/** PHPExcel_IComparable */
require_once 'PHPExcel/IComparable.php';


/**
 * PHPExcel_Style_Font
 *
 * @category   PHPExcel
 * @package    PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2007 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style_Font implements PHPExcel_IComparable
{
	/* Underline types */
	const UNDERLINE_NONE					= 'none';
	const UNDERLINE_DOUBLE					= 'double';
	const UNDERLINE_DOUBLEACCOUNTING		= 'doubleAccounting';
	const UNDERLINE_SINGLE					= 'single';
	const UNDERLINE_SINGLEACCOUNTING		= 'singleAccounting';
	
	/**
	 * Name
	 *
	 * @var string
	 */
	private $_name;
	
	/**
	 * Bold
	 *
	 * @var boolean
	 */
	private $_bold;
	
	/**
	 * Italic
	 *
	 * @var boolean
	 */
	private $_italic;
	
	/**
	 * Underline
	 *
	 * @var string
	 */
	private $_underline;
	
	/**
	 * Striketrough
	 *
	 * @var boolean
	 */
	private $_striketrough;
	
	/**
	 * Foreground color
	 * 
	 * @var PHPExcel_Style_Color
	 */
	private $_color;
		
    /**
     * Create a new PHPExcel_Style_Font
     */
    public function __construct()
    {
    	// Initialise values
    	$this->_name				= 'Calibri';
    	$this->_size				= 10;
		$this->_bold				= false;
		$this->_italic				= false;
		$this->_underline			= PHPExcel_Style_Font::UNDERLINE_NONE;
		$this->_striketrough		= false;
		$this->_color				= new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK);
    }
    
    /**
     * Get Name
     *
     * @return string
     */
    public function getName() {
    	return $this->_name;
    }
    
    /**
     * Set Name
     *
     * @param string $pValue
     */
    public function setName($pValue = 'Calibri') {
    	$this->_name = $pValue;
    }
    
    /**
     * Get Size
     *
     * @return double
     */
    public function getSize() {
    	return $this->_size;
    }
    
    /**
     * Set Size
     *
     * @param double $pValue
     */
    public function setSize($pValue = 10) {
    	$this->_size = $pValue;
    }
    
    /**
     * Get Bold
     *
     * @return boolean
     */
    public function getBold() {
    	return $this->_bold;
    }
    
    /**
     * Set Bold
     *
     * @param boolean $pValue
     */
    public function setBold($pValue) {
    	$this->_bold = $pValue;
    }
    
    /**
     * Get Italic
     *
     * @return boolean
     */
    public function getItalic() {
    	return $this->_italic;
    }
    
    /**
     * Set Italic
     *
     * @param boolean $pValue
     */
    public function setItalic($pValue) {
    	$this->_italic = $pValue;
    }
    
    /**
     * Get Underline
     *
     * @return string
     */
    public function getUnderline() {
    	return $this->_underline;
    }
    
    /**
     * Set Underline
     *
     * @param string $pValue	PHPExcel_Style_Font underline type
     */
    public function setUnderline($pValue = PHPExcel_Style_Font::UNDERLINE_NONE) {
    	$this->_underline = $pValue;
    }
    
    /**
     * Set Striketrough
     *
     * @param boolean $pValue
     */
    public function setStriketrough($pValue) {
    	$this->_striketrough = $pValue;
    }
    
    /**
     * Get Striketrough
     *
     * @return boolean
     */
    public function getStriketrough() {
    	return $this->_striketrough;
    }
    
    /**
     * Get Color
     *
     * @return PHPExcel_Style_Color
     */
    public function getColor() {
    	return $this->_color;
    }
    
    /**
     * Set Color
     *
     * @param 	PHPExcel_Style_Color $pValue
     * @throws 	Exception
     */
    public function setColor($pValue = null) {
    	if ($pValue instanceof PHPExcel_Style_Color) {
    		$this->_color = $pValue;
    	} else {
    		throw new Exception("Invalid PHPExcel_Style_Color passed.");
    	}
    }

	/**
	 * Get hash code
	 *
	 * @return string	Hash code
	 */	
	public function getHashCode() {
    	return md5(
    		  $this->_name
    		. $this->_size
    		. $this->_bold
    		. $this->_italic
    		. $this->_underline
    		. $this->_striketrough
    		. $this->_color->getHashCode()
    		. __CLASS__
    	);
    }
        
    /**
     * Duplicate object
     *
     * Duplicates the current object, also duplicating referenced objects (deep cloning).
     * Standard PHP clone does not copy referenced objects!
     *
     * @return PHPExcel_Style_Font
     */
	public function duplicate() {
		return unserialize(serialize($this));
	}
}
