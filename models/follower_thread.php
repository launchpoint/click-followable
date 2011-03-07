<?




function follower_thread_get_follow_url__d($ft)
{
  return follower_toggle_url($ft, 'follow');
}

function follower_thread_get_unfollow_url__d($ft)
{
  return follower_toggle_url($ft, 'unfollow');
}


function follower_thread_add_follower($ft, $u)
{
  $f = Follower::find_or_create_by( array(
    'conditions'=>array('follower_thread_id = ? and user_id = ?', $ft->id, $u->id),
    'attributes'=>array(
      'follower_thread_id'=>$ft->id,
      'user_id'=>$u->id
    )
  ));
  return $f;
}

function follower_thread_remove_follower($ft, $u)
{
  $f = $ft->add_follower($u);
  $f->delete();
}

function follower_thread_toggle_follower($ft, $u)
{
  if ($ft->has_follower($u))
  {
    $ft->remove_follower($u);
    return false;
  } else {
    $ft->add_follower($u);
    return true;
  }
}

function follower_thread_has_follower__d($ft, $u)
{
  return $ft->get_follower($u);
}

function follower_thread_get_follower__d($ft, $u)
{
  $f = Follower::find( array(
    'conditions'=>array('follower_thread_id = ? and user_id = ?', $ft->id, $u->id)
  ));
  return $f;  
}

function follower_thread_get_followed__d($ct)
{
  $klass = strtolower($ct->object_type);
  $id = $ct->object_id;
  $o = eval("return $klass::find_by_id(\$id);");
  return $o;
}
