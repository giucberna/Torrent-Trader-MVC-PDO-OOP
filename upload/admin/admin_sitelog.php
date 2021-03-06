<?php

if ($action == "sitelog") {
	if ($do == "del") {
		if ($_POST["delall"])
			DB::run("DELETE FROM `log`");
		else {
			if (!@count($_POST["del"])) show_error_msg(T_("ERROR"), T_("NOTHING_SELECTED"), 1);
			$ids = array_map("intval", $_POST["del"]);
			$ids = implode(", ", $ids);
			DB::run("DELETE FROM `log` WHERE `id` IN ($ids)");
		}
		autolink(TTURL."/admincp?action=sitelog", T_("CP_DELETED_ENTRIES"));
		stdhead();
		show_error_msg(T_("SUCCESS"), T_("CP_DELETED_ENTRIES"), 0);
		stdfoot();
		die;
	}

	stdhead("Site Log");
	adminnavmenu();

    $search = trim($_GET['search']);
	
	if ($search != '' ){
		$where = "WHERE txt LIKE " . sqlesc("%$search%") . "";
	}

	$res2 = DB::run("SELECT COUNT(*) FROM log $where");
	$row = $res2->fetch(PDO::FETCH_LAZY);
	$count = $row[0];

	$perpage = 50;

	list($pagertop, $pagerbottom, $limit) = pager($perpage, $count, "/admincp?action=sitelog&amp;");

	begin_frame("Site Log");

	print("<form method='get' action='?'><center>");
	print("<input type='hidden' name='action' value='sitelog' />\n");
	print(T_("SEARCH").": <input type='text' size='30' name='search' />\n");
	print("<input type='submit' value='Search' />\n");
	print("</center></form><br />\n");

	echo $pagertop;
	?>
                           
    <form id='sitelog' action='/admincp?action=sitelog&amp;do=del' method='post'>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" class="table_table">
    <tr>
        <th class="table_head"><input type="checkbox" name="checkall" onclick="checkAll(this.form.id)" /></th>
        <th class="table_head">Date</th>
        <th class="table_head">Time</th>
        <th class="table_head">Event</th>
    </tr>

	<?php
	
	$rqq = "SELECT id, added, txt FROM log $where ORDER BY id DESC $limit";
	$res = DB::run($rqq);

	 while ($arr = $res->fetch(PDO::FETCH_ASSOC)){
		$arr['added'] = utc_to_tz($arr['added']);
		$date = substr($arr['added'], 0, strpos($arr['added'], " "));
		$time = substr($arr['added'], strpos($arr['added'], " ") + 1);
		print("<tr><td class='table_col2' align='center'><input type='checkbox' name='del[]' value='$arr[id]' /></td><td class='table_col1' align='center'>$date</td><td class='table_col2' align='center'>$time</td><td class='table_col1' align='left'>".stripslashes($arr["txt"])."</td><!--<td class='table_col2'><a href='staffcp.php?act=view_log&amp;do=del_log&amp;lid=$arr[id]' title='delete this entry'>delete</a></td>--></tr>\n");
	 }
	echo "<tr><td class='table_head' align='center' colspan='4'>\n";
	echo "<input type='submit' value='Delete Checked' /> <input type='submit' value='Delete All' name='delall' /></td></tr></table></form>";

	print($pagerbottom);

	end_frame();
	stdfoot();
}