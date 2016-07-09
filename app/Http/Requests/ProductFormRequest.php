<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"txtName" => "required|unique:products,name",
			"txtPrice" => "required|numeric",
			"fImages" => "required|image"
		];
	}
	public function messages()
	{
		return [
			"txtName.required" => "Fill name product",
			"txtName.unique" => "This name was exsited",
			"txtPrice.required" => "Fill price product",
			"txtPrice.numeric" => "You must fill a number",
			"fImages.required" => "Please upload an image",
			"fImages.image" => "This format is unacceptable"
		];
	}

}
