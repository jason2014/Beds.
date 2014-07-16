<div id="menu">
     <div class="item">
     <h3>10幢2层</h3>
     <span>男 共30个房间</span>
     </div>
     <div class="item">
     <h3>10幢3层</h3>
     <span>男 共30个房间</span>
     </div>
     <select id="college" name="college">
     <option selected="selected" value="#">分配给某学院</option>
<?php foreach($colleges as $college){?>
<option value="<?=$college['id']?>"><?=$college['name']?>-<?=$college['all_count']?>人-<?=$college['male_count']?>男-<?=$college['female_count']?>女</option>
<?php }?>
     </select>
     <a href="#" class="button">确定</a>
</div>
<div id="option">
</div>
<div id="show">

</div>