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
    if (isset($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
      $role = Role::getById($id);
      $success = "Success";
      $failure = "Not found role {$id}";
      Functions::returnAPI($role, $success, $failure );
    } else {
      $failure = "Missing params";
      Functions::returnAPI([], "", $failure );
    }
  }
}