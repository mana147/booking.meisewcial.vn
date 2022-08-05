<!-- ***************************** Template **************************-->
<template>
	<div id="appVue">

		<div class="navbar">
			<button v-on:click="showAppTodo()"> App Todo </button>
			<button v-on:click="showAppTableApp()"> App Table </button>
			<button v-on:click="showAppTest()"> App Test </button>
		</div>

		<HeaderApp v-show="showListTodo" ref="head" v-on:add-todo='addTodo' />
		<BodyApp v-show="showListTodo" v-bind:itemProps='item' />
		<TableApp v-show="showListTable" />
		<TestApp />

	</div>
</template>

<!-- ***************************** Script *************************** -->
<script>

import { ref } from 'vue';

import HeaderApp from './components/HeaderApp';
import BodyApp from './components/BodyApp.vue';
import TableApp from './components/TableApp.vue';
import TestApp  from './components/TestApp.vue';

export default {
	name: "App",
	components: {
		HeaderApp,
		BodyApp,
		TableApp,
		TestApp
	},
	data() {
		return {
			showListTodo: false,
			showListTable: false
		}
	},
	setup() {
		let item = ref([]);

		function addTodo(data) {
			item.value = data;
		}

		return {
			item,
			addTodo
		}
	},
	methods: {
		showAppTodo: function () {
			this.showListTodo = !this.showListTodo;
			this.showListTable = !this.showListTable;
		},

		showAppTableApp: function () {
			this.showListTodo = !this.showListTodo;
			this.showListTable = !this.showListTable;
		}, 
	},
}
</script>


<!-- ****************************** Style **************************** -->
<style scoped >
#app {
	font-family: verdana;
}

body {
	margin: 0;
}

</style>
<!-- *************************************************************** -->