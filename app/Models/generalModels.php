<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class generalModels
{
  public static function insert($table, $data)
  {
    $insert = DB::table($table)->insert($data);
    return $insert;
  }

  public static function read($table)
  {
    $read = DB::table($table)
      ->select()
      ->get();
    return $read;
  }
  public static function readId($table, $id)
  {
    $read = DB::table($table)
      ->where('id', '=', $id)
      ->first();
    return $read;
  }
  public static function update($table, $id, $data)
  {
    $update = DB::table($table)
      ->where('id', $id)
      ->update($data);
    return $update;
  }
  public static function delete($table, $id)
  {
    $delete = DB::table($table)
      ->where('id', $id)
      ->delete();
    return $delete;
  }
}
