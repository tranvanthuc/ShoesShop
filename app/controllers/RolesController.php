<?php 

namespace app\controllers;

use app\models\Role;
use utils\Functions;

class RolesController 
{
  // get all roles
  public function getAll()
  {
    $roles = Role::getAll();
    $success = "Success";
    $failure = "Failure";
    Functions::returnAPI($roles, $success, $failure );
  }

  // get role by id
  public function getById()
  {
    $data = Functions::getDataFromClient();
    if (isset($data['id'])) {
      $id = $data['id'];
      $role = Role::getById(Role::$table, $id);
      $success = "Success";
      $failure = "Not found role !";
      Functions::returnAPI($role, $success, $failure );
    } else {
      $failure = "Missing params";
      Functions::returnAPI([], "", $failure );
    }
  }
}