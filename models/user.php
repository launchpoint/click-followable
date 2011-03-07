<?

function user_recently_followed_things__d($u, $thing_type, $thread_name)
{
  $params = array(
   'joins'=>"
    RIGHT JOIN (follower_threads FT LEFT JOIN followers F ON F.follower_thread_id = FT.id) ON FT.object_type = '{$thing_type}' AND FT.name = '{$thread_name}' AND FT.object_id=". tableize($thing_type) . ".id WHERE F.user_id = {$u->id}
    ",
   'limit'=>20,
   'order'=>'F.created_at desc'
  );
  $objs = eval("return $thing_type::find_all( \$params ); ");
  return $objs;
}
