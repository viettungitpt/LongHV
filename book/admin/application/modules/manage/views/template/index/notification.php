
<script>
jAlert('<?php echo $data[1]?>', '<?php echo $data[0]?>', function(r) {
	if(r == true)
    {
        window.location = "<?php echo $data[2]?>";
    }
    return false;
});
</script>