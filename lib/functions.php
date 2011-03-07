<?

function find_recent_followers($o, $thread_name)
{
  return find_followers($o, $thread_name, 20);
}


function find_followers($o, $thread_name, $limit=null)
{
  $klass = get_class($o);
  if (!$o->id) return array();
  $params = array(
   'joins'=>" join follower_threads ft on ft.object_type = '$klass' and ft.object_id = $o->id and name = '$thread_name' join followers f on f.follower_thread_id = ft.id and f.user_id = users.id",
   'order'=>'f.created_at desc'
  );
  if ($limit)
  {
    $params['limit'] = $limit;
  }
  $objs = User::find_all( $params );
  return $objs;
}

function find_follower_thread($o, $thread_name)
{
  $klass = get_class($o);
  $ft = FollowerThread::find_or_create_by_name($thread_name, array(
    'conditions'=>array("object_type = ? and object_id = ?", $klass, $o->id),
    'attributes'=>array(
      'name'=>$thread_name,
      'object_type'=>$klass,
      'object_id'=>$o->id
    )
  ));
  return $ft;
}