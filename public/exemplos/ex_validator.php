<?php
//HEADER
require_once(dirname(__FILE__) . '/../header.php');

use Backfront\Application;

$app = Application::getInstance();
$app->ABSPATH = Application::dirname(__FILE__, 2);
//
//$validator = $app->validator();
//$validation = $validator->make([
//    'name' => 'Háá', 'email' => 'teste@teste.com', 'password' => 'sssxs', 'confirm_password' => 'sssxsx', 'avatar' => 'imagem.jpg', 'skills' => 'teste, 1',],
//    ['name' => 'required', 'email' => 'required|email', 'password' => 'required|min:6', 'confirm_password' => 'required|same:password', 'avatar' => 'required|uploaded_file:0,500K,png,jpg', 'skills' => 'array',]);
//// then validate
//$validation->validate();
//
//if($validation->fails()) {
//    // handling errors
//    $errors = $validation->errors();
//    echo "<pre>";
//    print_r($errors->firstOfAll());
//    echo "</pre>";
//    exit;
//} else {
//    // validation passes
//    echo "Success!";
//}


/**
 * With validation Class.
 * In sequence, you will see how to implements the validator in an application divided by layers
 */
// 1. Create a class responsible to Validate and extends Validator class from Backfront pack
class TesteValidator extends \Backfront\Validator\Validator
{
    // 2. Now, you needs create the attributes of the class, called $rules(it's an array) and set your rules.
    public $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password'
    ];
}

// 3. After, instantiating a class and run the validation.
try {
    $valid = (new TesteValidator())->with([
        'name' => '',
        'email' => 'emialdot.net',
        'password' => 'req23',
        'confirm_password' => 'req123'
    ])->passesOrFail();

    var_dump($valid);

    if(is_object($valid)) throw new Exception("Erro na validação");
} catch(Exception $e){
    echo $e->getMessage();
}

//FOOTER
require_once(dirname(__FILE__) . '/../footer.php');
