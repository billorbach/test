<html>
<head>
</head>
<body>
<center>
<?php
initclass("geo");
$geo=new geo();
if(empty($_GET['dns'])){
    ?>
    <div class="titre"><?php echo(LOC_DNS_LOOKUP); ?></div>
<form action="index.php" method="GET">
    <input type="hidden" name="page" value="nslookup" />
    <label><?php echo(LOC_DOMAIN_TO_SCAN); ?> </label><input type="text" name="dns" value="geekzine.fr" /><input type="submit" value="Scan" />
</form>
    <br /><br /><br /><br /><br />

<?php
}
else {
    $dns=$_GET['dns'];

?>
    <div class="titre"><?php echo($dns); ?></div>
    <p>
        <b><?php echo(LOC_DNS_IPV4); ?></b><br /> <?php
        $data=gethostbynamel($dns);
        foreach($data as $ip){
            $country=$geo->get($ip);
            $country=$country['country'];
            echo($ip." (".$country.")<br />");
        }
        ?><br />

                
        <?php $cname=dns_get_record($dns,DNS_CNAME);
        if(!empty($cname[0]['host'])){
                ?>
        <b><?php echo(LOC_DNS_CNAME); ?></b><br />
        <?php echo($cname[0]['target']); ?><br /><br />
        <?php } ?>
        <b><?php echo(LOC_DNS_MX);?></b><br />
        <?php
        $data=array();
        getmxrr($dns,$data);
        foreach($data as $server){
            $mailip=gethostbyname($server);
            $country=$geo->get($mailip);
            $country=$country['country'];
            echo($server." (".$country.")<br />");
        }
        ?><br />
    <?php $soa=dns_get_record($dns,$type=DNS_SOA); ?>
        <b><?php echo(LOC_DNS_SOA);?></b><br />
        <?php echo(LOC_DNS_SOA_HOST); ?> <?php echo($soa[0]["mname"]); ?><br />
        <?php echo(LOC_DNS_SOA_HOSTMASTER); ?><?php echo($soa[0]["rname"]); ?><br />
        <?php echo(LOC_DNS_SOA_CLASS); ?><?php echo($soa[0]['class']); ?><br />
        Serial: <?php echo($soa[0]['serial']); ?><br />
        Time To Lift (TTL): <?php echo($soa[0]['ttl']); ?> <font color="red">Minimal: <?php echo($soa[0]['minimum-ttl']); ?></font><br />
        Retry: <?php echo($soa[0]['retry']); ?><br />
        Expire: <?php echo($soa[0]['expire']); ?><br />
        Refresh: <?php echo($soa[0]['refresh']); ?><br />

        <?php $ns=dns_get_record($dns, DNS_NS);
        if(!empty($ns[0]['target'])){
            ?>

        <b><?php echo(LOC_DNS_NS); ?></b><br />
        <?php foreach ($ns as $i){
            echo($i['target']."<br />");
        } }?><br />

        <?php $txt=dns_get_record($dns,DNS_TXT);
        if(!empty($txt[0][host])){
        ?>
        <b><?php echo(LOC_DNS_TXT); ?></b><br />
        <?php
        foreach($txt as $i){
            
            echo($i['txt']."<br />");
        }

}
?>
</body>
</html>
        
