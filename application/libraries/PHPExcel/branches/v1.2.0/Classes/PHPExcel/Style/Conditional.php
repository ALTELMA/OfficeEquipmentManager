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


/** PHPExcel_Style */
require_once 'PHPExcel/Style.php';

/** PHPExcel_IComparable */
require_once 'PHPExcel/IComparable.php';


/**
 * PHPExcel_Style_Conditional
 *
 * @category   PHPExcel
 * @package    PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2007 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style_Conditional implements PHPExcel_IComparable
{
	/* Condition types */
	const CONDITION_NONE					= 'none';
	const CONDITION_CELLIS					= 'cellIs';
	
	/* Operator types */
	const OPERATOR_NONE						= '';
	const OPERATOR_BEGINSWITH				= 'beginsWith';
	const OPERATOR_ENDSWITH					= 'endsWith';
	const OPERATOR_EQUAL					= 'equal';
	const OPERATOR_GREATERTHAN				= 'greaterThan';
	const OPERATOR_GREATERTHANOREQUAL		= 'greaterThanOrEqual';
	const OPERATOR_LESSTHAN					= 'lessThan';
	const OPERATOR_LESSTHANOREQUAL			= 'lessThanOrEqual';
	const OPERATOR_NOTEQUAL					= 'notEqual';
	const OPERATOR_CONTAINSTEXT				= 'containsText';
	const OPERATOR_NOTCONTAINS				= 'notContains';
	
	/**
	 * Condition type
	 *
	 * @var int
	 */
	private $_conditionType;
	
	/**
	 * Operator type
	 *
	 * @var int
	 */
	private $_operatorType;
	
	/**
	 * Condition
	 *
	 * @var string
	 */
	private $_condition;
	
	/**
	 * Style
	 * 
	 * @var PHPExcel_Style
	 */
	private $_style;
		
    /**
     * Create a new PHPExcel_Style_Conditional
     */
    public function __construct()
    {
    	// Initialise values
    	$this->_conditionType		= PHPExcel_Style_Conditional::CONDITION_NONE;
    	$this->_operatorType		= PHPExcel_Style_Conditional::OPERATOR_NONE;
    	$this->_condition			= '';
    	$this->_style				= new PHPExcel_Style();
    }
    
    /**
     * Get Condition type
     *
     * @return string
     */
    public function getConditionType() {
    	return $this->_conditionType;
    }
    
    /**
     * Set Condition type
     *
     * @param string $pValue	PHPExcel_Style_Conditional condition type
     */
    public function setConditionType($pValue = PHPExcel_Style_Conditional::CONDITION_NONE) {
    	$this->_conditionType = $pValue;
    }
    
    /**
     * Get Operator type
     *
     * @return string
     */
    public function getOperatorType() {
    	return $this->_operatorType;
    }
    
    /**
     * Set Operator type
     *
     * @param string $pValue	PHPExcel_Style_Conditional operator type
     */
    public function setOperatorType($pValue = PHPExcel_Style_Conditional::OPERATOR_NONE) {
    	$this->_operatorType = $pValue;
    }
    
    /**
     * Get Condition
     *
     * @return string
     */
    public function getCondition() {
    	return $this->_condition;
    }
    
    /**
     * Set Condition
     *
     * @param string $pValue	Condition
     */
    public function setCondition($pValue = '') {
    	$this->_condition = $pValue;
    }
    
    /**
     * Get Style
     *
     * @return PHPExcel_Style
     */
    public function getStyle() {
    	return $this->_style;
    }
    
    /**
     * Set Style
     *
     * @param 	PHPExcel_Style $pValue
     * @throws 	Exception
     */
    public function setStyle($pValue = null) {
    	if ($pValue instanceof PHPExcel_Style) {
    		$this->_style = $pValue;
    	} else {
    		throw new Exception("Invalid PHPExcel_Style passed.");
    	}
    }

	/**
	 * Get hash code
	 *
	 * @return string	Hash code
	 */	
	public function getHashCode() {
    	return md5(
    		  $this->_conditionType
    		. $this->_operatorType
    		. $this->_condition
    		. $this->_style->getHashCode()
    		. __CLASS__
    	);
    }
        
    /**
     * Duplicate object
     *
     * Duplicates the current object, also duplicating referenced objects (deep cloning).
     * Standard PHP clone does not copy referenced objects!
     *
     * @return PHPExcel_Style
     */
	public function duplicate() {
		return unserialize(serialize($this));
	}
}
