<div id="menu">
<?php foreach($storeys as $s){?>
     <div class="item">
     <h3><?=$s['build_name']?></h3> 
          <span><?=$s['build_type']?></span>
          <span><?=$s['storey']?>楼,共<?=$s['total_rooms']?>个房间,<?=$s['total_beds']?>个床位 </span>
     <input type="checkbox">
     </div>
<?php }?>     
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