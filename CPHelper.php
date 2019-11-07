<?php

namespace App\Http\Library;

abstract class CPHelper
{

	protected $endpoint = 'https://www.coinpayments.net/index.php';

	// Can change the style of your payment button
	public function createButton()
	{
		return '<button type="submit" style="background:#008a8a;color:white" class="btn green btn-block">Deposit Now</button>';
	}


	public function createProperties($fields)
	{
		$field['cmd']         = '_pay_simple';
		$field['item_name']   = 'Payment';
		$field['custom']	  = '';
		$field['want_shipping'] = '0';


		foreach($field as $key=>$item)
		{
			if(!array_key_exists($key, $fields))
			{
				$fields[$key] = $item;
			}
		}


		return $fields;

	} 


	public function createForm($fields)
	{
		$data = $this->createProperties($fields);

		$text = "";

		foreach($data as $name => $value) {
			$text .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
		}
			$text .= '<input type="hidden" name="currency" value="'.$fields['currency'].'">';
		return $text.$this->createButton().'</form>';

	}


}