<div id="menu">
     <h2>可供分配宿舍列表</h2>
     <div id = "male">
     <h3>男</h3>
<?php foreach($male_rooms as $k => $room){?>
          <h4><?=$k?></h4>
               <div style="margin-bottom: 6px">
<?php foreach($room as $r){?>               
<?=$r?>,
<?php }?>
               </div>
<?php }?>
               </div>
     <div id = "female">
     <h3>女</h3>          
<?php foreach($female_rooms as $k => $room){?>
          <h4><?=$k?></h4>
               <div style="margin-bottom: 6px">
<?php foreach($room as $r){?>               
<?=$r?>,
<?php }?>
               </div>
<?php }?>
               </div>
</div>

<div id="option">
<h2>宿舍分配</h2>
<h3>使用方式:</h3>
<p>选择学院</p>
<p>使用5位码表示宿舍，例如02111表示02幢211房</p>
<p>使用_作为通配符表示任一数字，例如 012__可代表 01幢201 201等</p>
<p>逗号分隔</p>
<select id="college" name="college">
     <option selected="selected" value="#">选择学院</option>
     <?php foreach($colleges as $college){?>
     <option value="<?=$college['id']?>"><?=$college['name']?>-<?=$college['all_count']?>人-<?=$college['male_count']?>男-<?=$college['female_count']?>女</option>
     <?php }?>
</select>
<br>
     <textarea rows="4" cols="40" id="room_mark"></textarea>
<br>
     <button type="submit" id="submit" style="width:50px;">提交</button>     
</div>
<div id="show">
<h2>该学院已分配宿舍列表</h2>     
</div>