<!-- ***************************** Template **************************-->
<template>
	<div>
		<ul id="myUL">
			<TodoItem v-for="todo in todos" v-bind:key="todo.id" v-bind:todoProps="todo"
				v-on:item-completed="funcMarkCompleted" v-on:item-delete="funcDeleteItem" />
		</ul>
	</div>

</template>

<!-- ***************************** Script *************************** -->
<script>
// init
import { ref } from 'vue';
import TodoItem from './TodoItem';
// import {v4 as uuidv4} from 'uuid';

// main
export default {
	name: 'BodyApp',
	components: { TodoItem },
	props: ['itemProps'],
	setup() {
		// -------------------------------------
		let todos = ref([]);
		let bufferID = '123';

		// -------------------------------------

		function funcMarkCompleted(id) {
			todos.value.forEach(function (i) {
				if (i.id === id) {
					i.completed = !i.completed;
					return i;
				}
			});
		}

		// -------------------------------------

		function funcDeleteItem(id) {
			todos.value = todos.value.filter(function (i) {
				if (i.id !== id) {
					return true;
				}
				return false;
			});

		}

		// -------------------------------------
  
		async function getAllTodos() {
			try {
				const res = await fetch('https://jsonplaceholder.typicode.com/todos?_limit=10');
				todos.value = await res.json();
			} catch (error) {
				console.log('error :>> ', error);
			}
		}
	
		getAllTodos();

		return {
			todos, bufferID,
			funcMarkCompleted,
			funcDeleteItem 
		}
		// -------------------------------------
	},

	// methods: {
	// 	async getName() {
	// 		const res = await fetch('https://api.agify.io/?name=michael');
	// 		const data = await res.json();
	// 		this.data = data;
	// 	}
	// },

	beforeUpdate() {
		// console.log('this.itemProps.id  :>> ', this.itemProps.id );
		if (this.itemProps.id != this.bufferID) {
			this.todos.push(this.itemProps);
			this.bufferID = this.itemProps.id;
		}
	},
};
</script>

<!-- ****************************** Style **************************** -->
<style scoped>
/* Remove margins and padding from the list */
ul {
	margin: 0;
	padding: 0;
}

/* Style the list items */
ul li {
	cursor: pointer;
	position: relative;
	padding: 12px 8px 12px 40px;
	list-style-type: none;
	background: #eee;
	font-size: 18px;
	transition: 0.2s;

	/* make the list items unselectable */
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

/* Set all odd list items to a different color (zebra-stripes) */
ul li:nth-child(odd) {
	background: #f9f9f9;
}

/* Darker background-color on hover */
ul li:hover {
	background: #ddd;
}
</style>