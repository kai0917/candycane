<div class="contextual">
  <?php echo $users->change_status_link($user); ?>
</div>

<h2><?php __('label_user'); ?>: <?php echo h($user['User']['login']); ?></h2>

<?php $selected_tab = 'general'; ?>

<div class="tabs">
<?php
// pr($settings_tabs);
?>
<ul>
<?php foreach($settings_tabs as $tab): ?>
<?php $selected = ($selected_tab == $tab['name']) ? "selected" : ""; ?>
<!-- <% administration_settings_tabs.each do |tab| -%> -->
    <li><?php echo $html->link($tab['label'],aa('tab',$tab['name']),
                                     aa('id', "tab-".$tab['name'],
                                     'class',$selected,
                                     'onclick', "showTab('{$tab['name']}'); this.blur(); return false;",
                                     'escape', false
                                     )) ?></li>
<!--    <li><%= link_to l(tab[:label]), { :tab => tab[:name] },
                                    :id => "tab-#{tab[:name]}",
                                    :class => (tab[:name] != selected_tab ? nil : 'selected'),
                                    :onclick => "showTab('#{tab[:name]}'); this.blur(); return false;" %></li> -->
<!-- <% end -%> -->
<?php endforeach; ?>
</ul>
</div>

<?php foreach($settings_tabs as $tab): ?>
<?php $disp = ($selected_tab != $tab['name']) ? 'display:none' : ''; ?>
<?php echo $html->tag('div', $this->renderElement($tab['partial']),
	aa('id','tab-content-'.$tab['name'],
	   'style', $disp,
	   'class', 'tab-content'
	)
); ?>
<?php endforeach; ?>

<?php $candy->html_title(__('label_user', true)); ?>
