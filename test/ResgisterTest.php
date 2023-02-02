<?php
require 'Ijdb/Controllers/Author.php';
require 'CSY2028/DatabaseTable.php';
class RegisterUserTest extends \PHPUnit\Framework\TestCase {
 public function testInvalidEmail() {
 $pdo = new \PDO('mysql:host=v.je;dbname=ijdb', 'student', 'student');
 $authorsTable = new \CSY2028\DatabaseTable($pdo, 'author', 'id');
 $controller = new \Ijdb\Controllers\Author($authorsTable);
 $invalidEmail = [
 'firstname' => 'John',
'surname' => 'Smith',
'email' => '',
'password' => 'secret'
 ];
 $errors = $controller->validateRegistration($invalidEmail);
 $this->assertEquals(count($errors), 1);
 }
}