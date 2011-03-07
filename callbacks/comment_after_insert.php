<?

$o = $comment->commented;
foreach($o->followers as $user)
{
  if (isset($comment->author_id) && $comment->author_id != $user->id)
  {
    notify(
      $user,
      'new_comment_on_followed_'.$o->tableized_klass,
      array('comment'=>$comment, 'follower'=>$user)
    );
  }
}
