<!-- ***************************** Template **************************-->
<template>

    <ul id="myUL">
        <TodoItem 
            v-for="todo in todos" 
            v-bind:key="todo.id" 
            v-bind:todoProps="todo" />
    </ul>

</template>

<!-- ***************************** Script *************************** -->
<script>
// init
import { ref } from 'vue';
import TodoItem from './TodoItem';

// main
export default {
    name: 'BodyApp',
    components: { TodoItem },
    setup() {
        let todos = ref([
            {
                id: 1,
                title: "viec 1",
                completed: false
            },
            {
                id: 2,
                title: "viec 2",
                completed: false
            },
            {
                id: 3,
                title: "viec 3",
                completed: false
            },
            {
                id: 4,
                title: "viec 4",
                completed: false
            },
            {
                id: 5,
                title: "viec 5",
                completed: false
            }
        ]);

        return {
            'todos': todos,
        }
    }
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