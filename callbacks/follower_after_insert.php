<?

$o = $follower->followed;
$ft = $follower->follower_thread;

if (isset($o->author_id))
{
  notify(
    $follower,
    "new_{$ft->name}_follower_for_{$o->tableized_klass}",
    array('follower'=>$follower)
  );
}