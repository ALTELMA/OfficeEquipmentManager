<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2007 PHPExcel
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
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2007 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/lgpl.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../Classes/');

/** PHPExcel */
include 'PHPExcel.php';

/** PHPExcel_Writer_Excel2007 */
include 'PHPExcel/Writer/Excel2007.php';

// Create new PHPExcel object
echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

// Set properties
echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
$objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");
$objPHPExcel->getProperties()->setCategory("Test result file");


// Create a first sheet, representing sales data
echo date('H:i:s') . " Add some data\n";
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Description');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Amount');

$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Paycheck received');
$objPHPExcel->getActiveSheet()->setCellValue('B2', 100);

$objPHPExcel->getActiveSheet()->setCellValue('A3', 'Cup of coffee bought');
$objPHPExcel->getActiveSheet()->setCellValue('B3', -1.5);

$objPHPExcel->getActiveSheet()->setCellValue('A4', 'Cup of coffee bought');
$objPHPExcel->getActiveSheet()->setCellValue('B4', -1.5);

$objPHPExcel->getActiveSheet()->setCellValue('A5', 'Cup of tea bought');
$objPHPExcel->getActiveSheet()->setCellValue('B5', -1.2);

$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Found some money');
$objPHPExcel->getActiveSheet()->setCellValue('B6', 8);

$objPHPExcel->getActiveSheet()->setCellValue('A7', 'Total:');
$objPHPExcel->getActiveSheet()->setCellValue('B7', '=SUM(B2:B6)');


// Set cell number formats
echo date('H:i:s') . " Set cell number formats\n";
$objPHPExcel->getActiveSheet()->getStyle('B2')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
$objPHPExcel->getActiveSheet()->duplicateStyle( $objPHPExcel->getActiveSheet()->getStyle('B2'), 'B3:B7' );


// Set column widths
echo date('H:i:s') . " Set column widths\n";
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);


// Add conditional formatting
echo date('H:i:s') . " Add conditional formatting\n";
$objConditional1 = new PHPExcel_Style_Conditional();
$objConditional1->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
$objConditional1->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
$objConditional1->setCondition('0');
$objConditional1->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
$objConditional1->getStyle()->getFont()->setBold(true);

$objConditional2 = new PHPExcel_Style_Conditional();
$objConditional2->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
$objConditional2->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHANOREQUAL);
$objConditional2->setCondition('0');
$objConditional2->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_GREEN);
$objConditional2->getStyle()->getFont()->setBold(true);

$conditionalStyles = $objPHPExcel->getActiveSheet()->getStyle('B2')->getConditionalStyles();
array_push($conditionalStyles, $objConditional1);
array_push($conditionalStyles, $objConditional2);
$objPHPExcel->getActiveSheet()->getStyle('B2')->setConditionalStyles($conditionalStyles);

$objPHPExcel->getActiveSheet()->duplicateStyle( $objPHPExcel->getActiveSheet()->getStyle('B2'), 'B3:B7' );


// Set fonts
echo date('H:i:s') . " Set fonts\n";
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A7')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B7')->getFont()->setBold(true);


// Set header and footer. When no different headers for odd/even are used, odd header is assumed.
echo date('H:i:s') . " Set header/footer\n";
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&BPersonal cash register&RPrinted on &D');
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');


// Set page orientation and size
echo date('H:i:s') . " Set page orientation and size\n";
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);


// Rename sheet
echo date('H:i:s') . " Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('Invoice');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

		
// Save Excel 2007 file
echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo done
echo date('H:i:s') . " Done writing file.\r\n";