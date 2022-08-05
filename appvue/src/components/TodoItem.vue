<!-- ***************************** Template **************************-->
<template>

	<li v-bind:class="[todoProps.completed ? 'checked' : '' ]" >   

		<input 
			v-bind:id="[todoProps.id]" 
			type="checkbox" 
			v-bind:checked="todoProps.completed " 
			v-on:change="checkBox" > 
			
		<label v-bind:for="[todoProps.id]"> {{ todoProps.title }}  </label>

		<span v-on:click="deleteItem" class="close">×</span>

	</li>

</template>

<!-- ***************************** Script *************************** -->
<script>

export default {
	name: 'TodoItem',
	props: ['todoProps'],
	setup(props,{ emit }) {

		function checkBox() {
			emit('item-completed', props.todoProps.id );
		}

		function deleteItem() {
			emit('item-delete', props.todoProps.id);
		}

		return {
			checkBox,
			deleteItem
		};
	}
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
	background: rgb(135, 135, 135);
	color: rgb(0, 0, 0);
	text-decoration: line-through;
}
</style>