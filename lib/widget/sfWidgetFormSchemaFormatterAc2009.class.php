<?php

class sfWidgetFormSchemaFormatterAc2009 extends sfWidgetFormSchemaFormatter
{
	protected $rowFormat  = "<div class=\"form_row\">
	%label% \n %error% <br/> %field%
	%help% %hidden_fields%\n</div>\n";
	
	protected $errorRowFormat  = "<div>%errors%</div>";
	protected $helpFormat      = '<div class="form_help">%help%</div>';
	protected $decoratorFormat = "<div>\n  %content%</div>";
	
	public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
	{
		$row = parent::formatRow(
				$label,
				$field,
				$errors,
				$help,
				$hiddenFields
		);
	
		return strtr($row, array(
				'%row_class%' => (count($errors) > 0) ? ' form_row_error' : '',
		));
	}
	
}