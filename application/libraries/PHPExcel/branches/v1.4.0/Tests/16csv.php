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

include "05featuredemo.inc.php";

include 'PHPExcel/Writer/CSV.php';
include 'PHPExcel/Reader/CSV.php';
include 'PHPExcel/Writer/Excel2007.php';

echo date('H:i:s') . " Write to CSV format\n";
$objWriter = new PHPExcel_Writer_CSV($objPHPExcel);
$objWriter->setDelimiter(';');
$objWriter->setEnclosure('');
$objWriter->setLineEnding("\r\n");
$objWriter->setSheetIndex(0);
$objWriter->save(str_replace('.php', '.csv', __FILE__));

echo date('H:i:s') . " Read from CSV format\n";
$objReader = new PHPExcel_Reader_CSV();
$objReader->setDelimiter(';');
$objReader->setEnclosure('');
$objReader->setLineEnding("\r\n");
$objReader->setSheetIndex(0);
$objPHPExcelFromCSV = $objReader->load(str_replace('.php', '.csv', __FILE__));

echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter2007 = new PHPExcel_Writer_Excel2007($objPHPExcelFromCSV);
$objWriter2007->save(str_replace('.php', '.xlsx', __FILE__));

echo date('H:i:s') . " Done writing files.\r\n";
