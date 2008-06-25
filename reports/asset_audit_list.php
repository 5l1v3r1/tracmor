<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc.
 *
 * This file is part of Tracmor.
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 	
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	QApplication::Authenticate(7);
	// SERGEI - this will generate an error until you add the tables to the data model and re-codegenerate (then codegen will create this file).
	require_once(__FORMBASE_CLASSES__ . '/AuditListFormBase.class.php');
	
	class AssetAuditListForm extends AuditListFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;
		
		// Audit Array
		protected $objAuditArray;
		
		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();
			
			// You will need to add the optional clauses here to join by CreatedBy so that you can use the full name of the user that created this report.
			$this->objAuditArray = Audit::LoadAll();
		}
		
		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}
		
		// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}
  	
  	
  	
	}
	
	// Go ahead and run this form object to generate the page
	AssetAuditListForm::Run('AssetAuditListForm', 'asset_audit_list.tpl.php');	
?>