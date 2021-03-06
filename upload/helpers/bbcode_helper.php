<?php
// Function To Display BBCodes And Smilies
function textbbcode($form, $name, $content = "")
{
    //$form = form name
    //$name = textarea name
    //$content = textarea content (only for edit pages etc)
      global $site_config;
    ?>
<script type="text/javascript">
function BBTag(tag,s,text,form){
switch(tag)
    {
    case '[quote]':
	var start = document.forms[form].elements[text].selectionStart;
	var end = document.forms[form].elements[text].selectionEnd;
	if (start != end) {
		var body = document.forms[form].elements[text].value;
		var left = body.substr(body, start);
		var middle = "[quote]" + body.substring(start, end) + "[/quote]";
		var right = body.substr(end, body.length);
		document.forms[form].elements[text].value = left + middle + right;
	} else {
		document.forms[form].elements[text].value = document.forms[form].elements[text].value + "[quote][/quote]";
	}
        break;
    case '[img]':
	var start = document.forms[form].elements[text].selectionStart;
	var end = document.forms[form].elements[text].selectionEnd;
	if (start != end) {
		var body = document.forms[form].elements[text].value;
		var left = body.substr(body, start);
		var middle = "[img]" + body.substring(start, end) + "[/img]";
		var right = body.substr(end, body.length);
		document.forms[form].elements[text].value = left + middle + right;
	} else {
		document.forms[form].elements[text].value = document.forms[form].elements[text].value + "[img][/img]";
	}
        break;
    case '[url]':
	var start = document.forms[form].elements[text].selectionStart;
	var end = document.forms[form].elements[text].selectionEnd;
	if (start != end) {
		var body = document.forms[form].elements[text].value;
		var left = body.substr(body, start);
		var middle = "[url]" + body.substring(start, end) + "[/url]";
		var right = body.substr(end, body.length);
		document.forms[form].elements[text].value = left + middle + right;
	} else {
		document.forms[form].elements[text].value = document.forms[form].elements[text].value + "[url][/url]";
	}
        break;
    case '[*]':
        document.forms[form].elements[text].value = document.forms[form].elements[text].value+"[*]";
        break;
    case '[b]':
	var start = document.forms[form].elements[text].selectionStart;
	var end = document.forms[form].elements[text].selectionEnd;
	if (start != end) {
		var body = document.forms[form].elements[text].value;
		var left = body.substr(body, start);
		var middle = "[b]" + body.substring(start, end) + "[/b]";
		var right = body.substr(end, body.length);
		document.forms[form].elements[text].value = left + middle + right;
	} else {
		document.forms[form].elements[text].value = document.forms[form].elements[text].value + "[b][/b]";
	}
        break;
    case '[i]':
	var start = document.forms[form].elements[text].selectionStart;
	var end = document.forms[form].elements[text].selectionEnd;
	if (start != end) {
		var body = document.forms[form].elements[text].value;
		var left = body.substr(body, start);
		var middle = "[i]" + body.substring(start, end) + "[/i]";
		var right = body.substr(end, body.length);
		document.forms[form].elements[text].value = left + middle + right;
	} else {
		document.forms[form].elements[text].value = document.forms[form].elements[text].value + "[i][/i]";
	}
        break;
    case '[u]':
	var start = document.forms[form].elements[text].selectionStart;
	var end = document.forms[form].elements[text].selectionEnd;
	if (start != end) {
		var body = document.forms[form].elements[text].value;
		var left = body.substr(body, start);
		var middle = "[u]" + body.substring(start, end) + "[/u]";
		var right = body.substr(end, body.length);
		document.forms[form].elements[text].value = left + middle + right;
	} else {
		document.forms[form].elements[text].value = document.forms[form].elements[text].value + "[u][/u]";
	}
        break;
    }
    document.forms[form].elements[text].focus();
}
</script>

<center>
    <input style="font-weight: bold;" type="button" name="bold" value="B " onclick="javascript: BBTag('[b]','bold','<?php echo $name; ?>','<?php echo $form; ?>')" />
    <input style="font-style: italic;" type="button" name="italic" value="I " onclick="javascript: BBTag('[i]','italic','<?php echo $name; ?>','<?php echo $form; ?>')" />
    <input style="text-decoration: underline;" type="button" name="underline" value="U " onclick="javascript: BBTag('[u]','underline','<?php echo $name; ?>','<?php echo $form; ?>')" /></td>
    <input type="button" name="li" value="List " onclick="javascript: BBTag('[*]','li','<?php echo $name; ?>','<?php echo $form; ?>')" />
    <input type="button" name="quote" value="QUOTE " onclick="javascript: BBTag('[quote]','quote','<?php echo $name; ?>','<?php echo $form; ?>')" />
    <input type="button" name="url" value="URL " onclick="javascript: BBTag('[url]','url','<?php echo $name; ?>','<?php echo $form; ?>')" />
    <input type="button" name="img" value="IMG " onclick="javascript: BBTag('[img]','img','<?php echo $name; ?>','<?php echo $form; ?>')" />
</center>

<div class="container">
<div class="row justify-content-md-center">
<div class="col-md-auto">
    <textarea name="<?php echo $name; ?>" rows="10" cols="50"><?php echo $content; ?></textarea>
</div>
<div class="col col-lg-2">
    <a href="javascript:SmileIT(':)','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/smile.png" border="0" alt=':)' title=':)' /></a>
    <a href="javascript:SmileIT(':(','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/sad.png" border="0" alt=':(' title=':(' /></a>
    <a href="javascript:SmileIT(':D','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/grin.png" border="0" alt=':D' title=':D' /></a>
    <a href="javascript:SmileIT(':P','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/razz.png" border="0" alt=':P' title=':P' /></a>
    <a href="javascript:SmileIT(':-)','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/smile-big.png" border="0" alt=':-)' title=':-)' /></a>
    <a href="javascript:SmileIT('B)','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/cool.png" border="0" alt='B)' title='B)' /></a>
    <a href="javascript:SmileIT('8o','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/eek.png" border="0" alt='8o' title='8o' /></a>
    <a href="javascript:SmileIT(':?','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/confused.png" border="0" alt=':?' title=':?' /></a>
    <a href="javascript:SmileIT('8)','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/glasses.png" border="0" alt='8)' title='8)' /></a>
    <a href="javascript:SmileIT(';)','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/wink.png" border="0" alt=';)' title=';)' /></a>
    <a href="javascript:SmileIT(':-*','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/kiss.png" border="0" alt=':-*' title=':-*' /></a>
    <a href="javascript:SmileIT(':-(','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/crying.png" border="0" alt=':-(' title=':-(' /></a>
    <a href="javascript:SmileIT(':|','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/plain.png" border="0" alt=':|' title=':|' /></a>
    <a href="javascript:SmileIT('O:-D','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/angel.png" border="0" alt='O:-D' title='0:-D' /></a>
    <a href="javascript:SmileIT(':-@','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/devilish.png" border="0" alt=':-@' title=':-@' /></a>
    <a href="javascript:SmileIT(':o)','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/monkey.png" border="0" alt=':o)' title=':o)' /></a>
    <a href="javascript:SmileIT('brb','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/brb.png" border="0" alt='brb' title='brb' /></a>
    <a href="javascript:SmileIT(':warn','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/warn.png" border="0" alt=':warn' title=':warn' /></a>
    <a href="javascript:SmileIT(':help','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/help.png" border="0" alt=':help' title=':help' /></a>
    <a href="javascript:SmileIT(':bad','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/bad.png" border="0" alt=':bad' title=':bad' /></a>
    <a href="javascript:SmileIT(':love','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/love.png" border="0" alt=':love' title=':love' /></a>
    <a href="javascript:SmileIT(':idea','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/idea.png" border="0" alt=':idea' title=':idea' /></a>
    <a href="javascript:SmileIT(':bomb','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/bomb.png" border="0" alt=':bomb' title=':bomb' /></a>
    <a href="javascript:SmileIT(':!','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/important.png" border="0" alt=':!' title=':!' /></a>
    <a href="javascript:SmileIT(':gigg','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/giggle.png" border="0" alt=':|' title=':|' /></a>
    <a href="javascript:SmileIT(':rofl','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/roflmao.png" border="0" alt='O:-D' title='0:-D' /></a>
    <a href="javascript:SmileIT(':slep','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/sleep.png" border="0" alt=':-@' title=':-@' /></a>
    <a href="javascript:SmileIT(':thum','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/thumbsup.png" border="0" alt=':o)' title=':o)' /></a>
    <a href="javascript:SmileIT(':0_0','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/zpo.png" border="0" alt=':|' title=':|' /></a>
    <a href="javascript:SmileIT(':poop','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/poop.png" border="0" alt='O:-D' title='0:-D' /></a>
    <a href="javascript:SmileIT(':spechles','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/speechless.png" border="0" alt=':-@' title=':-@' /></a>
    <a href="javascript:SmileIT(':unsure','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/unsure.png" border="0" alt=':o)' title=':o)' /></a>
    <a href="javascript:SmileIT(':mad','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/mad.png" border="0" alt=':|' title=':|' /></a>
    <a href="javascript:SmileIT(':roll','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/rolleyes.png" border="0" alt='O:-D' title='0:-D' /></a>
    <a href="javascript:SmileIT(':sick','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/sick.png" border="0" alt=':-@' title=':-@' /></a>
    <a href="javascript:SmileIT(':crylol','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/crylaugh.png" border="0" alt=':|' title=':|' /></a>
    <a href="javascript:SmileIT(':confos','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/confound.png" border="0" alt='O:-D' title='0:-D' /></a>
    <a href="javascript:SmileIT(':fire','<?php echo $form; ?>','<?php echo $name; ?>')"><img src="<?php echo $site_config["SITEURL"]; ?>/images/smilies/fire.png" border="0" alt=':-@' title=':-@' /></a>
<br />
    <a href="javascript:PopMoreSmiles('<?php echo $form; ?>','<?php echo $name; ?>');"><?php echo "[" . T_("MORE_SMILIES") . "]"; ?></a>
<br />
    <a href="javascript:PopMoreTags();"><?php echo "[" . T_("MORE_TAGS") . "]"; ?></a>
<br />

</div>
</div>

</div>

<?php
}
?>