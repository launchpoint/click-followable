<?

require_authenticated();


$ft = FollowerThread::find_by_id($params['id']);
switch($params['mode'])
{
  case 'follow':
    $ft->add_follower($current_user);
    switch($ft->followed->klass)
    {
      case 'Story':
        if ($ft->story->author && $current_user->id != $ft->story->author->id)
        {
          notify(
            $ft->story->author->email,
            'new_story_follower',
            array('story'=>$ft->story, 'follower'=>$current_user)
          );
        }
        break;
      case 'User':
        if ($current_user->id != $ft->user->id)
        {
          notify(
            $ft->user->email,
            'new_user_follower',
            array('user'=>$ft->user, 'follower'=>$current_user)
          );
        }
        break;
    }
    break;
  case 'unfollow':
    $ft->remove_follower($current_user);

    break;
}

