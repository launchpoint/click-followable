<?

$type = strtolower(humanize($ft->object_type));
if (!isset($unique))
{
  $unique='default';
}
if (is_object($unique))
{
  $unique = $unique->id;
}