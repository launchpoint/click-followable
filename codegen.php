<?


foreach($models as $model_klass)
{
  $t = singularize(tableize($model_klass));
  if ( in($model_klass, 'Follower', 'FollowerThread')) continue;
  $fp = pluralize($t);
  $code = <<<PHP
function {$t}_recent_followers__d(\${$t}, \$name='default')
{
  return find_recent_followers(\${$t}, \$name);
}

function {$t}_get_recent_followers__d(\${$t})
{
  return \${$t}->recent_followers();
}

function {$t}_get_followers__d(\${$t})
{
  return \${$t}->followers();
}

function {$t}_followers__d(\${$t}, \$name='default')
{
  return find_followers(\${$t}, \$name);
}


function {$t}_has_follower__d(\$s, \$u)
{
  return \$s->follower_thread->has_follower(\$u);
  
}

function {$t}_follower_threads__d(\$s, \$name='default')
{
  return find_follower_thread(\$s, \$name);
}

function {$t}_get_follower_thread__d(\$s)
{
  return \$s->follower_threads();
}

function {$t}_get_follower_toggle_url__d(\$s)
{
  return \$s->follower_thread->follower_toggle_url;
}

function {$t}_get_follower_count__d(\$s)
{
  return \$s->follower_thread->follower_count;
}

function user_recently_followed_{$fp}__d(\$u, \$name='default')
{
  return \$u->recently_followed_things('$t', \$name);
}

function user_get_recently_followed_{$fp}__d(\$u)
{
  return \$u->recently_followed_{$fp}();
}
PHP;
  $codegen[] = $code;
}
