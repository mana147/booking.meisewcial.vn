<!-- ***************************** Template **************************-->
<template>
  <li><input type="checkbox">{{todoProps.title}}<span class="close">×</span></li>
</template>

<!-- ***************************** Script *************************** -->
<script>
export default {
  name: 'TodoItem',
  props: ['todoProps']
}
</script>

<!-- ****************************** Style **************************** -->
<style>
/* Style the close button */
.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}

.checked {
  background: #888;
  color: #fff;
  text-decoration: line-through;
}
</style>