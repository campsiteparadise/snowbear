<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auto_form{
	
	private $form_fields= array();
	private $wrapper = "<li>[tag]</li>";
	
	public function __construct()
	{
		$this->CI = &get_instance();
	}
	
	public function set_fields($record,$hidden,$type_info)
	{

		foreach($type_info as $type)
		{
			$value = (isset($record[$type->name])) ? $record[$type->name] : '';
			
			if(in_array($type->name,$hidden))
			{
				$this->form_fields[count($this->form_fields)] = form_hidden($type->name,$value);
			}
			else
			{
				$label = form_label(humanize($type->name),$type->name);
				switch($type->type)
				{
					case 'varchar':
						$field_data = array(
							'name'=>$type->name,
							'id'=>$type->name,
							'maxlength'=>$type->max_length,
							'value'=>$value,
							'class'=>'text'
						);
						$this->form_fields[count($this->form_fields)] = $this->to_tag($label.form_input($field_data));
						break;
					case 'int':
						$field_data = array(
							'name'=>$type->name,
							'id'=>$type->name,
							'maxlength'=>$type->max_length,
							'value'=>$value,
							'class'=>'numeric'
						);
						$this->form_fields[count($this->form_fields)] = $this->to_tag($label.form_input($field_data));
						break;
					default:
						$this->form_fields[count($this->form_fields)]  = $this->to_tag('<p>Unsupported field type</p><pre>'.print_r($type).'</pre>');
				}
				
				
			}
		}
		
		return $this->form_fields;
	}
	
	private function to_tag($data)
	{
		return str_replace('[tag]',$data,$this->wrapper);
	}
}
