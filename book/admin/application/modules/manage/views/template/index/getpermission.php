<?php if(!in_array($module, array(null, '', '0'))):?>
<span style="width: 150px;float: left">
    <label style="width: auto;float: left;margin: -2px -10px 0px 0px;" for="per_1">Truy cập</label>
    <input type="checkbox" name="per[]" id="per_1" <?php echo $module->read_pm == 1 ? 'checked="checked"' : '';?> value="1" />
</span>
<span style="width: 150px;float: left">
    <label style="width: auto;float: left;margin: -2px -10px 0px 0px;" for="per_2">Thêm</label>
    <input type="checkbox" name="per[]" id="per_2" <?php echo $module->save_pm == 2 ? 'checked="checked"' : '';?> value="2" />
</span>    
<span style="width: 150px;float: left">
    <label style="width: auto;float: left;margin: -2px -10px 0px 0px;" for="per_3">Sửa</label>
    <input type="checkbox" name="per[]" id="per_3" <?php echo $module->eidt_pm == 3 ? 'checked="checked"' : '';?> value="3" />
</span>  
<span style="width: 150px;float: left">
    <label style="width: auto;float: left;margin: -2px -10px 0px 0px;" for="per_4">Xóa</label>
    <input type="checkbox" name="per[]" id="per_4" <?php echo $module->del_pm == 4 ? 'checked="checked"' : '';?> value="4" />
</span>
<?php else:?>
<span style="width: 150px;float: left">
    <label style="width: auto;float: left;margin: -2px -10px 0px 0px;" for="per_1">Truy cập</label>
    <input type="checkbox" name="per[]" id="per_1"  value="1" />
</span>
<span style="width: 150px;float: left">
    <label style="width: auto;float: left;margin: -2px -10px 0px 0px;" for="per_2">Thêm</label>
    <input type="checkbox" name="per[]" id="per_2" value="2" />
</span>    
<span style="width: 150px;float: left">
    <label style="width: auto;float: left;margin: -2px -10px 0px 0px;" for="per_3">Sửa</label>
    <input type="checkbox" name="per[]" id="per_3" value="3" />
</span>  
<span style="width: 150px;float: left">
    <label style="width: auto;float: left;margin: -2px -10px 0px 0px;" for="per_4">Xóa</label>
    <input type="checkbox" name="per[]" id="per_4" value="4" />
</span>
<?php endif;?>