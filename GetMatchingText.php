<?php

if (isset($_REQUEST['InputText']))
{
	$input = $_REQUEST['InputText'];
	$filter = $_REQUEST['FilterExp'];

	$formattedFilter = "/" . str_replace("/", "\\/", $filter) . "/i";

	$matchCount = preg_match_all($formattedFilter, $input, $matches);
	
	if ($matchCount > 0)
	{
		$output = implode("\n", $matches[0]);
	}
	else $output = "";
}
else
{
	$input = "";
	$filter = "";
	$output = "";
	
	$matchCount = 0;
}

?>

<html>
	<body>
		<center><p><b>Get Matching Text</b></p></center>
		<br>
		<br>
		<form name="formGetMatches" method="post" target="_self" action="GetMatchingText.php">
			<table>
				<tr>
					<td width="10%" align="right" style="padding: 5px,5px,5px,5px;">
						<p>Input Text:</p>
					</td> 
					<td width=90% align="left" style="padding: 5px,5px,5px,5px;">
						<textarea name="InputText" style="width:100%;height:200px"><?php echo $input ?></textarea>
					</td> 
				</tr>
				<tr>
					<td width="10%" align="right" style="padding: 5px,5px,5px,5px;">
						<p>Filter Expression:</p>
					</td> 
					<td width="90%" align="left" style="padding: 5px,5px,5px,5px;">
						<input type="text" name="FilterExp" style="width:100%;" value="<?php echo $filter ?>">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" style="padding: 5px,5px,5px,5px;">
						<input type="button" onclick="javascript:document.formGetMatches.submit();" value="Find Matches">
					</td> 
				</tr>
				<tr>
					<td width="10%" align="right" style="padding: 5px,5px,5px,5px;">&nbsp;</td>
					<td width="90%" align="left" style="padding: 5px,5px,5px,5px;">
						<p><b>(<?php echo $matchCount ?> matches found)</b></p>
					</td> 
				</tr>
				<tr>
					<td width="10%" align="right" style="padding: 5px,5px,5px,5px;">
						<p>Matches:</p>
					</td> 
					<td width="90%" align="left" style="padding: 5px,5px,5px,5px;">
						<textarea name="OutputText" style="width:100%;height:200px;" readonly="readonly"><?php echo $output ?></textarea>
					</td> 
				</tr>
			</table>
		</form>
	</body>
</html>