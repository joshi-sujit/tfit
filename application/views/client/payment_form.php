<html>
<body>


<form action="https://secure.bluepay.com/interfaces/shpf" method="POST">
<input type="hidden" name="SHPF_FORM_ID" value="mobileform01">
<input type="hidden" name="SHPF_ACCOUNT_ID" value="100184048880">
<input type="hidden" name="SHPF_TPS_DEF" value="SHPF_FORM_ID SHPF_ACCOUNT_ID DBA TAMPER_PROOF_SEAL AMEX_IMAGE DISCOVER_IMAGE TPS_DEF SHPF_TPS_DEF CUSTOM_HTML REBILLING REB_CYCLES REB_AMOUNT REB_EXPR REB_FIRST_DATE">
<input type="hidden" name="SHPF_TPS" value="efd18e97407fdb01aebc2db8abe9a179">
<input type="hidden" name="MODE" value="TEST">
<input type="hidden" name="TRANSACTION_TYPE" value="SALE">
<input type="hidden" name="DBA" value="test">
<input type="hidden" name="TAMPER_PROOF_SEAL" value="5d085ff26d2bd0861e556450da6aa9ad">
<input type="hidden" name="REBILLING" value="0">
<input type="hidden" name="REB_CYCLES" value="">
<input type="hidden" name="REB_AMOUNT" value="">
<input type="hidden" name="REB_EXPR" value="">
<input type="hidden" name="REB_FIRST_DATE" value="">
<input type="hidden" name="AMEX_IMAGE" value="spacer.gif">
<input type="hidden" name="DISCOVER_IMAGE" value="discvr.gif">
<input type="hidden" name="REDIRECT_URL" value="http://localhost/tfit/pay/getStatus">
<input type="hidden" name="TPS_DEF" value="MERCHANT APPROVED_URL DECLINED_URL MISSING_URL MODE TRANSACTION_TYPE TPS_DEF REBILLING REB_CYCLES REB_AMOUNT REB_EXPR REB_FIRST_DATE">
<input type="hidden" name="CUSTOM_HTML" value="">
<input type="hidden" name="CUSTOM_ID" value="">
<input type="hidden" name="CUSTOM_ID2" value="">
<input type="hidden" name="CARD_TYPES" value="vi-mc-di">
$<input type="text" name="AMOUNT" value="11" length="10"> Amount<br>
<input type="submit" value="Pay Now">
</form>


</body>
</html>