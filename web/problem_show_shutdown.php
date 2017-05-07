<?php
include_once('functions/problems.php');
$pid = intval(convert_str($_GET['pid']));
if ($pid=="") $pid="0";
$show_problem=new Problem;
$show_problem->set_problem($pid);
if ($show_problem->is_valid() && $show_problem->get_val("hide")==0) $pagetitle="JNUOJ ".$pid." - ".$show_problem->get_val("title");
else $pagetitle="Problem Unavailable";
$lastlang=$_COOKIE[$config["cookie_prefix"]."lastlang"];
if ($lastlang==null) $lastlang=1;
include_once("header.php");
?>
<?php
  if (in_array($show_problem->get_val('vname'),array('UESTC','HDU'))) {
?>
        <script src="js/Mathjax/MathJax.js?config=TeX-AMS_HTML"></script>
        <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
            tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
        });
        </script>
<?php
}
?>
        <div class="span12">
<?php
if (!$show_problem->is_valid()||($show_problem->get_val("hide")==1&&!$current_user->is_root())) {
?>
          <p class="alert alert-error">Problem Unavailable!</p>
<?php
} else {
?>
          <div id="showproblem">
<?php
}
?>
This page is shut down due to the running contest!
        </div>


<script type="text/javascript">
var ppid='<?= $pid ?>';
var pvid="<?= $show_problem->get_val("vid") ?>";
var pvname="<?= $show_problem->get_val("vname") ?>";
var support_lang=<?= json_encode($show_problem->get_val("support_lang")) ?>;
</script>
<script type="text/javascript" src="js/problem_show.js?<?= filemtime("js/problem_show.js") ?>"></script>
<?php
include("footer.php");
?>
